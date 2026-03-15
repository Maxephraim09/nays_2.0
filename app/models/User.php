<?php
namespace App\Models;

use App\Core\Model;
use App\Core\Database;
use PDO;

class User extends Model {
    protected $table = 'users';
    protected $primaryKey = 'id';
    
    /**
     * Get database instance for transactions
     */
    public function getDb() {
        return $this->db;
    }
    
    /**
     * Begin transaction
     */
    public function beginTransaction() {
        return $this->db->beginTransaction();
    }
    
    /**
     * Commit transaction
     */
    public function commit() {
        return $this->db->commit();
    }
    
    /**
     * Rollback transaction
     */
    public function rollback() {
        return $this->db->rollback();
    }
    
    /**
     * Find user by email
     */
    public function findByEmail($email) {
        return $this->db->query("SELECT * FROM {$this->table} WHERE email = :email")
                        ->bind(':email', $email)
                        ->single();
    }
    
    /**
     * Find user by verification token
     */
    public function findByVerificationToken($token) {
        return $this->db->query("SELECT * FROM {$this->table} WHERE verification_token = :token")
                        ->bind(':token', $token)
                        ->single();
    }
    
    /**
     * Find user by reset token
     */
    public function findByResetToken($token) {
        return $this->db->query("SELECT * FROM {$this->table} WHERE reset_password_token = :token AND reset_password_expires > NOW()")
                        ->bind(':token', $token)
                        ->single();
    }
    
    /**
     * Create new user with multi-step registration
     */
    public function createUser($data, $step = 'basic') {
        // Generate UUID
        $data['id'] = $this->generateUUID();
        
        if ($step == 'basic') {
            // Hash password
            $data['password_hash'] = password_hash($data['password'], PASSWORD_BCRYPT);
            
            // Generate verification token
            $data['verification_token'] = bin2hex(random_bytes(32));
            
            // Set default values
            $data['registration_date'] = date('Y-m-d H:i:s');
            $data['status'] = 'pending';
            $data['email_verified'] = false;
            $data['login_attempts'] = 0;
            
            // Remove plain password from data
            unset($data['password']);
            unset($data['confirm_password']);
            unset($data['agree_terms']);
            
            // Insert basic info
            $sql = "INSERT INTO users (
                id, email, password_hash, first_name, last_name, phone, 
                date_of_birth, gender, member_type, verification_token, 
                registration_date, status, email_verified, login_attempts
            ) VALUES (
                :id, :email, :password_hash, :first_name, :last_name, :phone,
                :date_of_birth, :gender, :member_type, :verification_token,
                :registration_date, :status, :email_verified, :login_attempts
            )";
            
            $query = $this->db->query($sql);
            
            // Bind only the fields that are in the SQL
            $bindFields = [
                ':id', ':email', ':password_hash', ':first_name', ':last_name', ':phone',
                ':date_of_birth', ':gender', ':member_type', ':verification_token',
                ':registration_date', ':status', ':email_verified', ':login_attempts'
            ];
            
            foreach ($bindFields as $field) {
                $key = ltrim($field, ':');
                if (isset($data[$key])) {
                    $query->bind($field, $data[$key]);
                }
            }
            
            if ($query->execute()) {
                return $data['id'];
            }
            
            error_log("Failed to create user: " . print_r($this->db->errorInfo(), true));
            return false;
        }
        
        elseif ($step == 'educational') {
            // Store educational data in metadata JSON field
            $user = $this->find($data['user_id']);
            if (!$user) {
                error_log("Educational step: User not found with ID: " . $data['user_id']);
                return false;
            }
            
            // Get existing metadata
            $metadata = [];
            if ($user->metadata) {
                $metadata = json_decode($user->metadata, true) ?: [];
            }
            
            // Add educational data to metadata based on member type
            $memberType = $data['member_type'];
            
            switch($memberType) {
                case 'secondary':
                    $educationalFields = [
                        'current_school' => $data['current_school'] ?? null,
                        'school_type' => $data['school_type'] ?? null,
                        'current_class' => $data['current_class'] ?? null,
                        'student_id' => $data['student_id'] ?? null,
                        'expected_graduation' => $data['expected_graduation'] ?? null,
                        'subjects' => $data['subjects'] ?? null
                    ];
                    break;
                    
                case 'tertiary':
                    $educationalFields = [
                        'institution_name' => $data['institution_name'] ?? null,
                        'institution_type' => $data['institution_type'] ?? null,
                        'faculty' => $data['faculty'] ?? null,
                        'course_of_study' => $data['course_of_study'] ?? null,
                        'current_level' => $data['current_level'] ?? null,
                        'matric_number' => $data['matric_number'] ?? null,
                        'admission_year' => $data['admission_year'] ?? null,
                        'expected_graduation' => $data['expected_graduation'] ?? null,
                        'cgpa_range' => $data['cgpa_range'] ?? null
                    ];
                    break;
                    
                case 'alumni':
                    $educationalFields = [
                        'grad_institution' => $data['grad_institution'] ?? null,
                        'graduation_year' => $data['graduation_year'] ?? null,
                        'degree_obtained' => $data['degree_obtained'] ?? null,
                        'class_of_degree' => $data['class_of_degree'] ?? null,
                        'employment_status' => $data['employment_status'] ?? null,
                        'employer' => $data['employer'] ?? null,
                        'job_title' => $data['job_title'] ?? null,
                        'industry' => $data['industry'] ?? null,
                        'expertise' => $data['expertise'] ?? null
                    ];
                    break;
                    
                case 'diaspora':
                    $educationalFields = [
                        'country' => $data['country'] ?? null,
                        'city' => $data['city'] ?? null,
                        'immigration_status' => $data['immigration_status'] ?? null,
                        'current_status' => $data['current_status'] ?? null,
                        'institution_company' => $data['institution_company'] ?? null,
                        'how_heard' => $data['how_heard'] ?? null,
                        'emergency_contact' => $data['emergency_contact'] ?? null
                    ];
                    break;
                    
                default:
                    $educationalFields = [];
            }
            
            // Filter out null values
            $educationalFields = array_filter($educationalFields, function($value) {
                return $value !== null && $value !== '';
            });
            
            // Add to metadata under 'education' key
            if (!empty($educationalFields)) {
                $metadata['education'] = $educationalFields;
            }
            
            // Update the metadata field
            $sql = "UPDATE users SET metadata = :metadata WHERE id = :id";
            
            $result = $this->db->query($sql)
                            ->bind(':metadata', json_encode($metadata))
                            ->bind(':id', $data['user_id'])
                            ->execute();
            
            if (!$result) {
                error_log("Failed to update educational metadata: " . print_r($this->db->errorInfo(), true));
            }
            
            return $result;
        }
        
        elseif ($step == 'documents') {
            // Documents are handled in member_docs table
            return true;
        }
        
        elseif ($step == 'payment') {
            // Update payment status in metadata
            $user = $this->find($data['user_id']);
            if (!$user) {
                error_log("Payment step: User not found with ID: " . $data['user_id']);
                return false;
            }
            
            $metadata = json_decode($user->metadata ?? '{}', true);
            
            // Add payment information to metadata
            $metadata['payment'] = [
                'status' => $data['payment_status'] ?? 'pending',
                'method' => $data['payment_method'] ?? 'unknown',
                'date' => date('Y-m-d H:i:s'),
                'reference' => $data['payment_reference'] ?? null
            ];
            
            // Set membership expiry if payment is completed
            if ($data['payment_status'] == 'completed') {
                $metadata['membership'] = [
                    'expiry_date' => date('Y-m-d', strtotime('+1 year')),
                    'status' => 'active'
                ];
                $status = 'active';
            } elseif ($data['payment_status'] == 'pending_verification') {
                $status = 'pending_verification';
            } else {
                $status = 'pending';
            }
            
            $sql = "UPDATE users SET metadata = :metadata, status = :status WHERE id = :id";
            
            $result = $this->db->query($sql)
                            ->bind(':metadata', json_encode($metadata))
                            ->bind(':status', $status)
                            ->bind(':id', $data['user_id'])
                            ->execute();
            
            if (!$result) {
                error_log("Failed to update payment metadata: " . print_r($this->db->errorInfo(), true));
            }
            
            return $result;
        }
        
        return false;
    }
    
    /**
     * Update user branch assignment
     */
    public function assignBranch($userId, $branchId, $isPrimary = true) {
        // First, check if branch exists
        $branch = $this->db->query("SELECT * FROM branches WHERE id = :id")
                           ->bind(':id', $branchId)
                           ->single();
        
        if (!$branch) {
            return false;
        }
        
        // Update user's primary branch
        if ($isPrimary) {
            $this->db->query("UPDATE users SET branch_id = :branch_id WHERE id = :id")
                     ->bind(':branch_id', $branchId)
                     ->bind(':id', $userId)
                     ->execute();
        }
        
        // Check if branch_members table exists
        try {
            $branchMemberId = $this->generateUUID();
            $sql = "INSERT INTO branch_members (id, user_id, branch_id, joined_date, is_primary_branch, role_id) 
                    VALUES (:id, :user_id, :branch_id, :joined_date, :is_primary, 
                    (SELECT id FROM roles WHERE name = 'member'))";
            
            return $this->db->query($sql)
                            ->bind(':id', $branchMemberId)
                            ->bind(':user_id', $userId)
                            ->bind(':branch_id', $branchId)
                            ->bind(':joined_date', date('Y-m-d'))
                            ->bind(':is_primary', $isPrimary ? 1 : 0)
                            ->execute();
        } catch (\Exception $e) {
            // If branch_members table doesn't exist, just update the user's branch_id
            error_log("Branch members table error: " . $e->getMessage());
            return true; // Return true since we already updated the user's branch_id
        }
    }
    
    /**
     * Determine branch based on member data
     */
    public function determineBranch($userData) {
        $memberType = $userData['member_type'];
        $branchId = null;
        
        try {
            switch($memberType) {
                case 'secondary':
                    if (isset($userData['current_school'])) {
                        $branch = $this->db->query("SELECT id FROM branches WHERE name LIKE :name AND type = 'secondary' LIMIT 1")
                                           ->bind(':name', '%' . $userData['current_school'] . '%')
                                           ->single();
                        if ($branch) {
                            $branchId = $branch->id;
                        }
                    }
                    break;
                    
                case 'tertiary':
                    if (isset($userData['institution_name'])) {
                        $branch = $this->db->query("SELECT id FROM branches WHERE name LIKE :name AND type = 'tertiary' LIMIT 1")
                                           ->bind(':name', '%' . $userData['institution_name'] . '%')
                                           ->single();
                        if ($branch) {
                            $branchId = $branch->id;
                        }
                    }
                    break;
                    
                case 'alumni':
                    if (isset($userData['grad_institution'])) {
                        $branch = $this->db->query("SELECT id FROM branches WHERE name LIKE :name AND type = 'alumni' LIMIT 1")
                                           ->bind(':name', '%' . $userData['grad_institution'] . '%')
                                           ->single();
                        if ($branch) {
                            $branchId = $branch->id;
                        }
                    }
                    break;
                    
                case 'diaspora':
                    if (isset($userData['country'])) {
                        $branch = $this->db->query("SELECT id FROM branches WHERE name LIKE :name AND type = 'diaspora' LIMIT 1")
                                           ->bind(':name', '%' . $userData['country'] . '%')
                                           ->single();
                        if ($branch) {
                            $branchId = $branch->id;
                        }
                    }
                    break;
            }
        } catch (\Exception $e) {
            error_log("Branch determination error: " . $e->getMessage());
        }
        
        // If no branch found, assign to default branch of that type
        if (!$branchId) {
            try {
                $branch = $this->db->query("SELECT id FROM branches WHERE type = :type LIMIT 1")
                                   ->bind(':type', $memberType)
                                   ->single();
                if ($branch) {
                    $branchId = $branch->id;
                }
            } catch (\Exception $e) {
                error_log("Default branch lookup error: " . $e->getMessage());
            }
        }
        
        return $branchId;
    }
    
    /**
     * Upload member document
     */
    public function uploadDocument($userId, $documentType, $fileUrl, $documentNumber = null) {
        // Check if member_docs table exists
        try {
            $docId = $this->generateUUID();
            
            $sql = "INSERT INTO member_docs (id, user_id, document_type, document_url, document_number, uploaded_at) 
                    VALUES (:id, :user_id, :document_type, :document_url, :document_number, NOW())";
            
            return $this->db->query($sql)
                            ->bind(':id', $docId)
                            ->bind(':user_id', $userId)
                            ->bind(':document_type', $documentType)
                            ->bind(':document_url', $fileUrl)
                            ->bind(':document_number', $documentNumber)
                            ->execute();
        } catch (\Exception $e) {
            // If member_docs table doesn't exist, store in user metadata
            error_log("Member_docs table error: " . $e->getMessage() . " - Storing in user metadata");
            
            $user = $this->find($userId);
            $metadata = json_decode($user->metadata ?? '{}', true);
            
            if (!isset($metadata['documents'])) {
                $metadata['documents'] = [];
            }
            
            $metadata['documents'][$documentType] = [
                'url' => $fileUrl,
                'number' => $documentNumber,
                'uploaded_at' => date('Y-m-d H:i:s')
            ];
            
            return $this->db->query("UPDATE users SET metadata = :metadata WHERE id = :id")
                            ->bind(':metadata', json_encode($metadata))
                            ->bind(':id', $userId)
                            ->execute();
        }
    }
    
    /**
     * Get user documents
     */
    public function getUserDocuments($userId) {
        try {
            return $this->db->query("SELECT * FROM member_docs WHERE user_id = :user_id ORDER BY uploaded_at DESC")
                            ->bind(':user_id', $userId)
                            ->resultSet();
        } catch (\Exception $e) {
            // If member_docs table doesn't exist, get from metadata
            error_log("Member_docs table error: " . $e->getMessage() . " - Getting from metadata");
            
            $user = $this->find($userId);
            $metadata = json_decode($user->metadata ?? '{}', true);
            
            return $metadata['documents'] ?? [];
        }
    }
    
    /**
     * Verify email
     */
    public function verifyEmail($userId) {
        return $this->db->query("UPDATE users SET email_verified = TRUE, verification_token = NULL, status = 'active' WHERE id = :id")
                        ->bind(':id', $userId)
                        ->execute();
    }
    
    /**
     * Update last login
     */
    public function updateLastLogin($userId) {
        return $this->db->query("UPDATE users SET last_login = NOW(), login_attempts = 0, lock_until = NULL WHERE id = :id")
                        ->bind(':id', $userId)
                        ->execute();
    }
    
    /**
     * Increment login attempts
     */
    public function incrementLoginAttempts($email) {
        $user = $this->findByEmail($email);
        if ($user) {
            $attempts = $user->login_attempts + 1;
            $lockUntil = null;
            
            // Lock account after 5 failed attempts
            if ($attempts >= 5) {
                $lockUntil = date('Y-m-d H:i:s', strtotime('+15 minutes'));
            }
            
            return $this->db->query("UPDATE users SET login_attempts = :attempts, lock_until = :lock_until WHERE email = :email")
                            ->bind(':attempts', $attempts)
                            ->bind(':lock_until', $lockUntil)
                            ->bind(':email', $email)
                            ->execute();
        }
        return false;
    }
    
    /**
     * Reset login attempts
     */
    public function resetLoginAttempts($email) {
        return $this->db->query("UPDATE users SET login_attempts = 0, lock_until = NULL WHERE email = :email")
                        ->bind(':email', $email)
                        ->execute();
    }
    
    /**
     * Check if account is locked
     */
    public function isLocked($email) {
        $user = $this->findByEmail($email);
        if ($user && $user->lock_until) {
            return strtotime($user->lock_until) > time();
        }
        return false;
    }
    
    /**
     * Set password reset token
     */
    public function setResetToken($email) {
        $token = bin2hex(random_bytes(32));
        $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));
        
        $result = $this->db->query("UPDATE users SET reset_password_token = :token, reset_password_expires = :expires WHERE email = :email")
                           ->bind(':token', $token)
                           ->bind(':expires', $expires)
                           ->bind(':email', $email)
                           ->execute();
        
        return $result ? $token : false;
    }
    
    /**
     * Reset password
     */
    public function resetPassword($token, $newPassword) {
        $user = $this->findByResetToken($token);
        if ($user) {
            $hash = password_hash($newPassword, PASSWORD_BCRYPT);
            return $this->db->query("UPDATE users SET password_hash = :password, reset_password_token = NULL, reset_password_expires = NULL WHERE id = :id")
                            ->bind(':password', $hash)
                            ->bind(':id', $user->id)
                            ->execute();
        }
        return false;
    }
    
    /**
     * Generate NAYS ID
     */
    public function generateNAYSID($userId) {
        $user = $this->find($userId);
        if (!$user) return false;
        
        // Format: NAYS-[TYPE]-[YEAR]-[SEQUENCE]
        $typeMap = [
            'secondary' => 'S',
            'tertiary' => 'T',
            'alumni' => 'A',
            'diaspora' => 'D',
            'honorary' => 'H'
        ];
        
        $typeCode = $typeMap[$user->member_type] ?? 'M';
        $year = date('Y');
        
        // Get sequence number (last 5 digits of UUID or counter)
        $sequence = substr(str_replace('-', '', $user->id), -5);
        
        $naysId = "NAYS-{$typeCode}-{$year}-{$sequence}";
        
        // Store in metadata
        $metadata = json_decode($user->metadata ?? '{}', true);
        $metadata['nays_id'] = $naysId;
        
        $this->db->query("UPDATE users SET metadata = :metadata WHERE id = :id")
                 ->bind(':metadata', json_encode($metadata))
                 ->bind(':id', $userId)
                 ->execute();
        
        return $naysId;
    }
    
    /**
     * Generate UUID
     */
    private function generateUUID() {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }
}