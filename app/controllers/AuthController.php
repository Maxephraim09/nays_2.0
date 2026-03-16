<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Auth;
use App\Core\Session;
use App\Core\Validator;
use App\Models\User;
use App\Models\Branch;
use App\Models\MemberDoc;
use App\Libraries\Mailer;
use App\Libraries\Uploader;

class AuthController extends Controller {
    
    private $userModel;
    private $branchModel;
    private $docModel;
    private $mailer;
    private $uploader;
    
    public function __construct() {
        $this->userModel = new User();
        $this->branchModel = new Branch();
        $this->docModel = new MemberDoc();
        $this->mailer = new Mailer();
        $this->uploader = new Uploader();
    }
    
    /**
     * Show login form
     */
    public function loginForm() {
        if (Auth::check()) {
            $this->redirect('dashboard');
        }
        
        // Check for remember me token
        if (isset($_COOKIE['remember_token'])) {
            Auth::loginWithRememberToken();
            if (Auth::check()) {
                $this->redirect('dashboard');
            }
        }
        
        $data = [
            'title' => 'Login - ' . APP_NAME
        ];
        
        $this->viewWithNav('auth.login', $data);
    }
    
    /**
     * Process login
     */
    public function login() {
        if (!$this->verifyCsrfToken()) {
            Session::flash('error', 'Invalid security token');
            $this->redirect('login');
            return;
        }
        
        $validator = Validator::validate($_POST, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        
        if ($validator->fails()) {
            Session::set('old', $_POST);
            Session::flash('errors', $validator->getErrors());
            $this->redirect('login');
            return;
        }
        
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $remember = isset($_POST['remember']);
        
        // Check if account is locked
        if ($this->userModel->isLocked($email)) {
            Session::flash('error', 'Account is locked. Please try again after 15 minutes.');
            $this->redirect('login');
            return;
        }
        
        // Attempt login
        $result = Auth::attempt($email, $password, $remember);
        
        if ($result === true) {
            $user = $this->userModel->findByEmail($email);
            
            // Generate NAYS ID if not exists
            $metadata = json_decode($user->metadata ?? '{}', true);
            if (!isset($metadata['nays_id'])) {
                $this->userModel->generateNAYSID($user->id);
            }
            
            // Regenerate session ID for security
            session_regenerate_id(true);
            
            Session::flash('success', 'Welcome back, ' . $user->first_name . '!');
            $this->redirect('dashboard');
        } else {
            Session::flash('error', $result['error']);
            $this->redirect('login');
        }
    }
    
    /**
     * Show registration step 1 - Member Type Selection
     */
    public function registerStep1() {
        if (Auth::check()) {
            $this->redirect('dashboard');
        }
        
        $data = [
            'title' => 'Join NAYS - Step 1',
            'member_types' => [
                'secondary' => 'Secondary School Student',
                'tertiary' => 'Tertiary Student',
                'alumni' => 'Alumni / Graduate',
                'diaspora' => 'Diaspora Member',
                'honorary' => 'Honorary / Partner'
            ],
            'descriptions' => [
                'secondary' => 'Currently enrolled in secondary school (JSS1-SSS3)',
                'tertiary' => 'Currently enrolled in university, polytechnic, or college',
                'alumni' => 'Graduated from tertiary institution',
                'diaspora' => 'Yungur student living outside Nigeria',
                'honorary' => 'Non-Yungur supporters/partners'
            ]
        ];
        
        $this->viewWithNav('auth.register-step1', $data);
    }
    
    /**
     * Process registration step 1
     */
    public function registerStep1Post() {
        if (!$this->verifyCsrfToken()) {
            Session::flash('error', 'Invalid security token');
            $this->redirect('register/step1');
            return;
        }
        
        $validator = Validator::validate($_POST, [
            'member_type' => 'required|in:secondary,tertiary,alumni,diaspora,honorary'
        ]);
        
        if ($validator->fails()) {
            Session::flash('errors', $validator->getErrors());
            $this->redirect('register/step1');
            return;
        }
        
        // Store member type in session
        Session::set('registration', ['member_type' => $_POST['member_type']]);
        
        $this->redirect('register/step2');
    }
    
    /**
     * Show registration step 2 - Basic Information
     */
    public function registerStep2() {
        if (Auth::check()) {
            $this->redirect('dashboard');
        }
        
        $regData = Session::get('registration');
        if (!$regData || !isset($regData['member_type'])) {
            Session::flash('error', 'Please start registration from the beginning');
            $this->redirect('register/step1');
            return;
        }
        
        $data = [
            'title' => 'Join NAYS - Step 2: Basic Information',
            'member_type' => $regData['member_type'],
            'states' => $this->getStates(),
            'lgas' => $this->getLGAs()
        ];
        
        $this->viewWithNav('auth.register-step2', $data);
    }
    
    /**
     * Process registration step 2
     */
    public function registerStep2Post() {
        if (!$this->verifyCsrfToken()) {
            Session::flash('error', 'Invalid security token');
            $this->redirect('register/step2');
            return;
        }
        
        $regData = Session::get('registration');
        if (!$regData) {
            $this->redirect('register/step1');
            return;
        }
        
        $validator = Validator::validate($_POST, [
            'first_name' => 'required|min:2|max:50',
            'last_name' => 'required|min:2|max:50',
            'email' => 'required|email',
            'phone' => 'required|min:10|max:20',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'state_of_origin' => 'required',
            'lga' => 'required',
            'hometown' => 'required|min:2|max:100',
            'password' => 'required|min:8|confirmed'
        ]);
        
        if ($validator->fails()) {
            Session::set('old', $_POST);
            Session::flash('errors', $validator->getErrors());
            $this->redirect('register/step2');
            return;
        }
        
        // Validate age based on member type
        $dob = new \DateTime($_POST['date_of_birth']);
        $now = new \DateTime();
        $age = $now->diff($dob)->y;
        
        if ($regData['member_type'] == 'secondary' && $age > 20) {
            Session::set('old', $_POST);
            Session::flash('error', 'Secondary school members must typically be under 20 years old');
            $this->redirect('register/step2');
            return;
        }
        
        // Check if email already exists
        $existingUser = $this->userModel->findByEmail($_POST['email']);
        if ($existingUser) {
            Session::set('old', $_POST);
            Session::flash('error', 'Email already registered. Please login or use a different email.');
            $this->redirect('register/step2');
            return;
        }
        
        // Merge with registration data
        $regData = array_merge($regData, $_POST);
        Session::set('registration', $regData);
        
        $this->redirect('register/step3');
    }
    
    /**
     * Redirect to registration step 1
     */
    public function redirectToStep1() {
        $this->redirect('register/step1');
    }
    
    /**
     * Show registration step 3 - Educational Information (type-specific)
     */
    public function registerStep3() {
        if (Auth::check()) {
            $this->redirect('dashboard');
        }
        
        $regData = Session::get('registration');
        if (!$regData || !isset($regData['member_type'])) {
            Session::flash('error', 'Please start registration from the beginning');
            $this->redirect('register/step1');
            return;
        }
        
        $data = [
            'title' => 'Join NAYS - Step 3: Educational Information',
            'member_type' => $regData['member_type']
        ];
        
        // Add type-specific data
        switch($regData['member_type']) {
            case 'secondary':
                $data['classes'] = ['JSS1', 'JSS2', 'JSS3', 'SS1', 'SS2', 'SS3'];
                $data['subjects'] = ['English', 'Mathematics', 'Physics', 'Chemistry', 'Biology', 'Economics', 'Government', 'Literature', 'CRK', 'IRK', 'Geography'];
                break;
            case 'tertiary':
                $data['institution_types'] = ['University', 'Polytechnic', 'College of Education', 'Other'];
                $data['levels'] = ['100', '200', '300', '400', '500', '600'];
                break;
            case 'alumni':
                $data['degree_classes'] = ['First Class', 'Second Class Upper', 'Second Class Lower', 'Third Class', 'Pass'];
                $data['employment_status'] = ['Employed', 'Self-Employed', 'Unemployed', 'Retired'];
                break;
            case 'diaspora':
                $data['countries'] = $this->getCountries();
                $data['status_options'] = ['Student', 'Working Professional', 'Both', 'Other'];
                break;
        }
        
        $this->viewWithNav('auth.register-step3', $data);
    }
    
    /**
     * Process registration step 3
     */
    public function registerStep3Post() {
        if (!$this->verifyCsrfToken()) {
            Session::flash('error', 'Invalid security token');
            $this->redirect('register/step3');
            return;
        }
        
        $regData = Session::get('registration');
        if (!$regData) {
            $this->redirect('register/step1');
            return;
        }
        
        // Define validation rules based on member type
        $rules = [];
        $messages = [];
        
        switch($regData['member_type']) {
            case 'secondary':
                $rules = [
                    'current_school' => 'required|min:2|max:255',
                    'school_type' => 'required|in:public,private',
                    'current_class' => 'required|in:JSS1,JSS2,JSS3,SS1,SS2,SS3',
                    'student_id' => 'required|min:3|max:50',
                    'expected_graduation' => 'required|numeric|min:' . date('Y') . '|max:' . (date('Y') + 6)
                ];
                $messages = [
                    'expected_graduation.numeric' => 'Expected graduation year must be a number',
                    'expected_graduation.min' => 'Expected graduation year must be at least ' . date('Y'),
                    'expected_graduation.max' => 'Expected graduation year must not exceed ' . (date('Y') + 6)
                ];
                break;
                
            case 'tertiary':
                $rules = [
                    'institution_name' => 'required|min:2|max:255',
                    'institution_type' => 'required',
                    'faculty' => 'required|min:2|max:255',
                    'course_of_study' => 'required|min:2|max:255',
                    'current_level' => 'required',
                    'matric_number' => 'required|min:3|max:50',
                    'admission_year' => 'required|numeric|min:2000|max:' . date('Y'),
                    'expected_graduation' => 'required|numeric|min:' . date('Y') . '|max:' . (date('Y') + 10)
                ];
                $messages = [
                    'admission_year.numeric' => 'Admission year must be a number',
                    'admission_year.min' => 'Admission year must be at least 2000',
                    'admission_year.max' => 'Admission year cannot be in the future',
                    'expected_graduation.numeric' => 'Expected graduation year must be a number',
                    'expected_graduation.min' => 'Expected graduation year must be at least ' . date('Y'),
                    'expected_graduation.max' => 'Expected graduation year must not exceed ' . (date('Y') + 10)
                ];
                break;
                
            case 'alumni':
                $rules = [
                    'grad_institution' => 'required|min:2|max:255',
                    'graduation_year' => 'required|numeric|min:1950|max:' . date('Y'),
                    'degree_obtained' => 'required|min:2|max:255',
                    'class_of_degree' => 'required',
                    'employment_status' => 'required'
                ];
                $messages = [
                    'graduation_year.numeric' => 'Graduation year must be a number',
                    'graduation_year.min' => 'Graduation year must be at least 1950',
                    'graduation_year.max' => 'Graduation year cannot be in the future'
                ];
                
                if (isset($_POST['employment_status']) && $_POST['employment_status'] != 'Unemployed' && $_POST['employment_status'] != 'Retired') {
                    $rules['employer'] = 'required|min:2|max:255';
                    $rules['job_title'] = 'required|min:2|max:255';
                    $rules['industry'] = 'required|min:2|max:255';
                }
                break;
                
            case 'diaspora':
                $rules = [
                    'country' => 'required',
                    'city' => 'required|min:2|max:255',
                    'immigration_status' => 'required|min:2|max:255',
                    'current_status' => 'required',
                    'how_heard' => 'required|min:2|max:255',
                    'emergency_contact' => 'required|min:5|max:255'
                ];
                
                if (isset($_POST['current_status']) && $_POST['current_status'] != 'Other') {
                    $rules['institution_company'] = 'required|min:2|max:255';
                }
                break;
        }
        
        // Create validator instance
        $validator = Validator::validate($_POST, $rules, $messages);
        
        if ($validator->fails()) {
            Session::set('old', $_POST);
            Session::flash('errors', $validator->getErrors());
            $this->redirect('register/step3');
            return;
        }
        
        // Merge with registration data
        $regData = array_merge($regData, $_POST);
        Session::set('registration', $regData);
        
        $this->redirect('register/step4');
    }
    
    /**
     * Show registration step 4 - Document Upload
     */
    public function registerStep4() {
        if (Auth::check()) {
            $this->redirect('dashboard');
        }
        
        $regData = Session::get('registration');
        if (!$regData) {
            Session::flash('error', 'Please start registration from the beginning');
            $this->redirect('register/step1');
            return;
        }
        
        $data = [
            'title' => 'Join NAYS - Step 4: Document Upload',
            'member_type' => $regData['member_type'],
            'required_docs' => $this->getRequiredDocuments($regData['member_type'])
        ];
        
        $this->viewWithNav('auth.register-step4', $data);
    }
    
    /**
     * Process registration step 4 - Document Upload
     */
    public function registerStep4Post() {
        if (!$this->verifyCsrfToken()) {
            Session::flash('error', 'Invalid security token');
            $this->redirect('register/step4');
            return;
        }
        
        $regData = Session::get('registration');
        if (!$regData) {
            $this->redirect('register/step1');
            return;
        }
        
        // Check if files were uploaded
        if (empty($_FILES)) {
            Session::flash('error', 'No files uploaded');
            $this->redirect('register/step4');
            return;
        }
        
        // Handle file uploads
        $requiredDocs = $this->getRequiredDocuments($regData['member_type']);
        $uploadedFiles = [];
        $errors = [];
        
        foreach ($requiredDocs as $key => $label) {
            if (isset($_FILES[$key]) && $_FILES[$key]['error'] == UPLOAD_ERR_OK) {
                $result = $this->uploader->upload($_FILES[$key], 'documents', [
                    'allowedTypes' => ['jpg', 'jpeg', 'png', 'pdf'],
                    'maxSize' => 5 * 1024 * 1024 // 5MB
                ]);
                
                if ($result) {
                    $uploadedFiles[$key] = $result;
                } else {
                    $errors[$key] = $this->uploader->getErrors();
                }
            } elseif (!isset($_FILES[$key]) || $_FILES[$key]['error'] == UPLOAD_ERR_NO_FILE) {
                $errors[$key] = ['This document is required'];
            } elseif ($_FILES[$key]['error'] != UPLOAD_ERR_OK) {
                $errors[$key] = ['Upload error: ' . $this->getUploadErrorMessage($_FILES[$key]['error'])];
            }
        }
        
        if (!empty($errors)) {
            Session::flash('upload_errors', $errors);
            $this->redirect('register/step4');
            return;
        }
        
        // Store uploaded files in session
        $regData['documents'] = $uploadedFiles;
        Session::set('registration', $regData);
        
        $this->redirect('register/step5');
    }
    
    /**
     * Show registration step 5 - Payment
     */
    public function registerStep5() {
        if (Auth::check()) {
            $this->redirect('dashboard');
        }
        
        $regData = Session::get('registration');
        if (!$regData) {
            Session::flash('error', 'Please start registration from the beginning');
            $this->redirect('register/step1');
            return;
        }
        
        $fee = $this->getMembershipFee($regData['member_type']);
        
        $data = [
            'title' => 'Join NAYS - Step 5: Membership Fee',
            'member_type' => $regData['member_type'],
            'fee' => $fee,
            'fee_formatted' => $this->formatMoney($fee),
            'fee_usd' => ($regData['member_type'] == 'diaspora') ? '$' . number_format($fee, 2) : null
        ];
        
        $this->viewWithNav('auth.register-step5', $data);
    }
    
    /**
     * Process registration step 5 - Payment
     */
    /**
 * Process registration step 5 - Payment
 */
public function registerStep5Post() {
    if (!$this->verifyCsrfToken()) {
        Session::flash('error', 'Invalid security token');
        $this->redirect('register/step5');
        return;
    }
    
    $regData = Session::get('registration');
    if (!$regData) {
        $this->redirect('register/step1');
        return;
    }
    
    $validator = Validator::validate($_POST, [
        'payment_method' => 'required|in:card,transfer,ussd,cash,waiver'
    ]);
    
    if ($validator->fails()) {
        Session::flash('errors', $validator->getErrors());
        $this->redirect('register/step5');
        return;
    }
    
    $paymentMethod = $_POST['payment_method'];
    $waiverCode = $_POST['waiver_code'] ?? null;
    
    // Handle payment (simplified for now)
    $paymentStatus = 'pending';
    $paymentReference = null;
    
    if ($paymentMethod == 'waiver' && $waiverCode) {
        // Validate waiver code
        if ($this->validateWaiverCode($waiverCode)) {
            $paymentStatus = 'completed';
            $paymentReference = $waiverCode;
        } else {
            Session::flash('error', 'Invalid waiver code');
            $this->redirect('register/step5');
            return;
        }
    } elseif ($paymentMethod == 'cash') {
        // Cash payment - will be verified manually
        $paymentStatus = 'pending_verification';
        $paymentReference = 'CASH-' . strtoupper(uniqid());
    } elseif ($paymentMethod == 'transfer') {
        $paymentStatus = 'pending_verification';
        $paymentReference = 'TRF-' . strtoupper(uniqid());
    } else {
        // Card or USSD payment - simulate success
        $paymentStatus = 'completed';
        $paymentReference = strtoupper($paymentMethod) . '-' . strtoupper(uniqid());
    }
    
    // Start transaction using the User model's method
    $this->userModel->beginTransaction();
    
    try {
        // Create user account
        $userId = $this->userModel->createUser($regData, 'basic');
        
        if (!$userId) {
            throw new \Exception('Failed to create user account');
        }
        
        // Update with educational info
        $regData['user_id'] = $userId;
        $eduResult = $this->userModel->createUser($regData, 'educational');
        
        if (!$eduResult) {
            throw new \Exception('Failed to save educational information');
        }
        
        // Upload documents
        if (isset($regData['documents']) && is_array($regData['documents'])) {
            foreach ($regData['documents'] as $docType => $fileUrl) {
                $docResult = $this->userModel->uploadDocument($userId, $docType, $fileUrl);
                if (!$docResult) {
                    throw new \Exception('Failed to save document: ' . $docType);
                }
            }
        }
        
        // Determine and assign branch
        $branchId = $this->userModel->determineBranch($regData);
        if ($branchId) {
            $branchResult = $this->userModel->assignBranch($userId, $branchId);
            if (!$branchResult) {
                throw new \Exception('Failed to assign branch');
            }
        }
        
        // Update payment status
        $paymentData = [
            'user_id' => $userId,
            'payment_status' => $paymentStatus,
            'payment_method' => $paymentMethod,
            'payment_reference' => $paymentReference
        ];
        $paymentResult = $this->userModel->createUser($paymentData, 'payment');
        
        if (!$paymentResult) {
            throw new \Exception('Failed to update payment status');
        }
        
        // Generate NAYS ID
        $naysId = $this->userModel->generateNAYSID($userId);
        
        // Commit transaction
        $this->userModel->commit();
        
        // Send verification email
        $user = $this->userModel->find($userId);
        $verificationToken = $user->verification_token;
        $name = $user->first_name . ' ' . $user->last_name;
        $emailSent = $this->mailer->sendVerificationEmail($user->email, $name, $verificationToken);
        
        if (!$emailSent) {
            // Log but don't fail registration
            error_log("Failed to send verification email to: " . $user->email);
        }
        
        // Clear registration session
        Session::delete('registration');
        
        // Store user ID for completion page
        Session::set('temp_user_id', $userId);
        
        Session::flash('success', 'Registration completed successfully! ' . 
                     ($paymentStatus == 'completed' ? 'Your account is active.' : 'Please complete your payment verification.'));
        
        $this->redirect('register/complete');
        
    } catch (\Exception $e) {
        // Rollback transaction on error
        $this->userModel->rollback();
        
        // Log detailed error information
        error_log("=== Registration Error ===");
        error_log("Message: " . $e->getMessage());
        error_log("File: " . $e->getFile());
        error_log("Line: " . $e->getLine());
        error_log("Trace: " . $e->getTraceAsString());
        
        Session::flash('error', 'Registration failed: ' . $e->getMessage());
        $this->redirect('register/step5');
    }
}
    /**
     * Show registration complete page
     */
    public function registerComplete() {
        $userId = Session::get('temp_user_id');
        if (!$userId) {
            $this->redirect('register/step1');
            return;
        }
        
        $user = $this->userModel->find($userId);
        if (!$user) {
            Session::delete('temp_user_id');
            $this->redirect('register/step1');
            return;
        }
        
        $metadata = json_decode($user->metadata ?? '{}', true);
        $naysId = $metadata['nays_id'] ?? 'Pending';
        $paymentStatus = $metadata['payment_status'] ?? 'pending';
        
        $data = [
            'title' => 'Registration Complete - ' . APP_NAME,
            'user' => $user,
            'nays_id' => $naysId,
            'payment_status' => $paymentStatus,
            'email' => $user->email
        ];
        
        $this->viewWithNav('auth.register-complete', $data);
    }
    
    /**
     * Verify email
     */
    public function verifyEmail() {
        $token = $_GET['token'] ?? null;
        
        if (!$token) {
            Session::flash('error', 'Invalid verification link');
            $this->redirect('login');
            return;
        }
        
        $user = $this->userModel->findByVerificationToken($token);
        
        if ($user) {
            $this->userModel->verifyEmail($user->id);
            
            // Send welcome email
            $name = $user->first_name . ' ' . $user->last_name;
            $this->mailer->sendWelcomeEmail($user->email, $name);
            
            Session::flash('success', 'Email verified successfully! You can now log in.');
        } else {
            Session::flash('error', 'Invalid or expired verification link. Please request a new one.');
        }
        
        $this->redirect('login');
    }
    
    /**
     * Resend verification email
     */
    public function resendVerification() {
        $email = $_POST['email'] ?? null;
        
        if (!$email) {
            Session::flash('error', 'Email is required');
            $this->redirect('login');
            return;
        }
        
        $user = $this->userModel->findByEmail($email);
        
        if ($user && !$user->email_verified) {
            // Generate new token
            $token = bin2hex(random_bytes(32));
            
            // Update user with new token
            $this->userModel->db->query("UPDATE users SET verification_token = :token WHERE id = :id")
                               ->bind(':token', $token)
                               ->bind(':id', $user->id)
                               ->execute();
            
            // Send email
            $name = $user->first_name . ' ' . $user->last_name;
            $this->mailer->sendVerificationEmail($email, $name, $token);
            
            Session::flash('success', 'Verification email resent. Please check your inbox.');
        } else {
            Session::flash('error', 'Email not found or already verified');
        }
        
        $this->redirect('login');
    }
    
    /**
     * Show forgot password form
     */
    public function forgotPasswordForm() {
        if (Auth::check()) {
            $this->redirect('dashboard');
        }
        
        $data = [
            'title' => 'Forgot Password - ' . APP_NAME
        ];
        
        $this->viewWithNav('auth.forgot-password', $data);
    }
    
    /**
     * Process forgot password
     */
    public function forgotPassword() {
        if (!$this->verifyCsrfToken()) {
            Session::flash('error', 'Invalid security token');
            $this->redirect('forgot-password');
            return;
        }
        
        $validator = Validator::validate($_POST, [
            'email' => 'required|email'
        ]);
        
        if ($validator->fails()) {
            Session::flash('errors', $validator->getErrors());
            $this->redirect('forgot-password');
            return;
        }
        
        $email = trim($_POST['email']);
        $user = $this->userModel->findByEmail($email);
        
        if ($user) {
            $token = $this->userModel->setResetToken($email);
            $name = $user->first_name . ' ' . $user->last_name;
            $this->mailer->sendPasswordResetEmail($email, $name, $token);
        }
        
        // Always show same message for security
        Session::flash('success', 'If your email exists in our system, you will receive a password reset link.');
        $this->redirect('login');
    }
    
    /**
     * Show reset password form
     */
    public function resetPasswordForm() {
        if (Auth::check()) {
            $this->redirect('dashboard');
        }
        
        $token = $_GET['token'] ?? null;
        
        if (!$token) {
            Session::flash('error', 'Invalid password reset link');
            $this->redirect('login');
            return;
        }
        
        $user = $this->userModel->findByResetToken($token);
        
        if (!$user) {
            Session::flash('error', 'Invalid or expired password reset link');
            $this->redirect('forgot-password');
            return;
        }
        
        $data = [
            'title' => 'Reset Password - ' . APP_NAME,
            'token' => $token,
            'email' => $user->email
        ];
        
        $this->viewWithNav('auth.reset-password', $data);
    }
    
    /**
     * Process reset password
     */
    public function resetPassword() {
        if (!$this->verifyCsrfToken()) {
            Session::flash('error', 'Invalid security token');
            $this->redirect('reset-password?token=' . $_POST['token']);
            return;
        }
        
        $validator = Validator::validate($_POST, [
            'token' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);
        
        if ($validator->fails()) {
            Session::flash('errors', $validator->getErrors());
            $this->redirect('reset-password?token=' . $_POST['token']);
            return;
        }
        
        $token = $_POST['token'];
        $password = $_POST['password'];
        
        $result = $this->userModel->resetPassword($token, $password);
        
        if ($result) {
            Session::flash('success', 'Password reset successful! You can now log in with your new password.');
            $this->redirect('login');
        } else {
            Session::flash('error', 'Password reset failed. Please try again.');
            $this->redirect('forgot-password');
        }
    }
    
    /**
     * Logout
     */
    public function logout() {
        // Set flash message before destroying session
        Session::flash('success', 'You have been logged out successfully');
        
        Auth::logout();
        $this->redirect('login');
    }
    
    /**
     * Verify CSRF token
     */
    private function verifyCsrfToken() {
        return isset($_POST['csrf_token']) && $_POST['csrf_token'] === Session::get('csrf_token');
    }
    
    /**
     * Get upload error message
     */
    private function getUploadErrorMessage($errorCode) {
        switch ($errorCode) {
            case UPLOAD_ERR_INI_SIZE:
                return 'File exceeds upload_max_filesize';
            case UPLOAD_ERR_FORM_SIZE:
                return 'File exceeds MAX_FILE_SIZE';
            case UPLOAD_ERR_PARTIAL:
                return 'File was only partially uploaded';
            case UPLOAD_ERR_NO_FILE:
                return 'No file was uploaded';
            case UPLOAD_ERR_NO_TMP_DIR:
                return 'Missing temporary folder';
            case UPLOAD_ERR_CANT_WRITE:
                return 'Failed to write file to disk';
            case UPLOAD_ERR_EXTENSION:
                return 'File upload stopped by extension';
            default:
                return 'Unknown upload error';
        }
    }
    
    /**
     * Get required documents based on member type
     */
    private function getRequiredDocuments($memberType) {
        $docs = [
            'secondary' => [
                'school_id' => 'School ID Card',
                'passport' => 'Passport Photograph',
                'birth_cert' => 'Birth Certificate',
                'consent_form' => 'Parent/Guardian Consent Form'
            ],
            'tertiary' => [
                'student_id' => 'Student ID Card',
                'admission_letter' => 'Admission Letter',
                'passport' => 'Passport Photograph'
            ],
            'alumni' => [
                'certificate' => 'Degree Certificate',
                'nysc' => 'NYSC Discharge/Exemption Letter',
                'passport' => 'Passport Photograph'
            ],
            'diaspora' => [
                'passport' => 'Passport Photograph',
                'id_document' => 'ID Document',
                'proof_address' => 'Proof of Address'
            ],
            'honorary' => [
                'passport' => 'Passport Photograph',
                'id_document' => 'ID Document'
            ]
        ];
        
        return $docs[$memberType] ?? [];
    }
    
    /**
     * Get membership fee
     */
    private function getMembershipFee($memberType) {
        $fees = [
            'secondary' => 1000,
            'tertiary' => 2000,
            'alumni' => 5000,
            'diaspora' => 20, // USD
            'honorary' => 0
        ];
        
        return $fees[$memberType] ?? 0;
    }
    
    /**
     * Format money
     */
    private function formatMoney($amount) {
        return '₦' . number_format($amount, 2);
    }
    
    /**
     * Validate waiver code
     */
    private function validateWaiverCode($code) {
        // In production, this should check against a database of valid codes
        return preg_match('/^NAYS-[A-Z0-9]{8}$/', $code) === 1;
    }
    
    /**
     * Get Nigerian states
     */
    private function getStates() {
        return [
            'Abia', 'Adamawa', 'Akwa Ibom', 'Anambra', 'Bauchi', 'Bayelsa', 'Benue',
            'Borno', 'Cross River', 'Delta', 'Ebonyi', 'Edo', 'Ekiti', 'Enugu',
            'FCT - Abuja', 'Gombe', 'Imo', 'Jigawa', 'Kaduna', 'Kano', 'Katsina',
            'Kebbi', 'Kogi', 'Kwara', 'Lagos', 'Nasarawa', 'Niger', 'Ogun', 'Ondo',
            'Osun', 'Oyo', 'Plateau', 'Rivers', 'Sokoto', 'Taraba', 'Yobe', 'Zamfara'
        ];
    }
    
    /**
     * Get LGAs (simplified - in production, this would come from database)
     */
    private function getLGAs() {
        return [
            'Adamawa' => ['Yola North', 'Yola South', 'Girei', 'Jimeta', 'Mubi North', 'Mubi South', 'Michika', 'Madagali', 'Hong', 'Gombi', 'Song', 'Fufore', 'Demsa', 'Numan', 'Lamurde', 'Guyuk', 'Shelleng', 'Toungo', 'Mayo Belwa', 'Jada', 'Ganye'],
            'Lagos' => ['Agege', 'Ajeromi-Ifelodun', 'Alimosho', 'Amuwo-Odofin', 'Apapa', 'Badagry', 'Epe', 'Eti-Osa', 'Ibeju-Lekki', 'Ifako-Ijaiye', 'Ikeja', 'Ikorodu', 'Kosofe', 'Lagos Island', 'Lagos Mainland', 'Mushin', 'Ojo', 'Oshodi-Isolo', 'Shomolu', 'Surulere'],
            // Add more LGAs for other states
        ];
    }
    
    /**
     * Get countries list
     */
    private function getCountries() {
        return [
            'Nigeria', 'United Kingdom', 'United States', 'Canada', 'Germany',
            'France', 'Italy', 'Spain', 'Netherlands', 'Belgium', 'Sweden',
            'Norway', 'Denmark', 'Finland', 'Ireland', 'Switzerland', 'Austria',
            'Australia', 'New Zealand', 'Japan', 'China', 'India', 'South Africa',
            'Ghana', 'Kenya', 'Uganda', 'Tanzania', 'Egypt', 'Morocco',
            'United Arab Emirates', 'Saudi Arabia', 'Qatar', 'Kuwait', 'Malaysia'
        ];
    }
}