<?php
namespace App\Models;

use App\Core\Model;

class MemberDoc extends Model {
    protected $table = 'member_docs';
    
    /**
     * Get documents by user
     */
    public function getUserDocs($userId) {
        return $this->db->query("SELECT * FROM {$this->table} WHERE user_id = :user_id ORDER BY uploaded_at DESC")
                        ->bind(':user_id', $userId)
                        ->resultSet();
    }
    
    /**
     * Get verified documents
     */
    public function getVerifiedDocs($userId) {
        return $this->db->query("SELECT * FROM {$this->table} WHERE user_id = :user_id AND verified = 1")
                        ->bind(':user_id', $userId)
                        ->resultSet();
    }
    
    /**
     * Verify document
     */
    public function verify($docId, $verifierId) {
        return $this->db->query("UPDATE {$this->table} SET verified = 1, verified_by = :verifier_id, verified_at = NOW() WHERE id = :id")
                        ->bind(':verifier_id', $verifierId)
                        ->bind(':id', $docId)
                        ->execute();
    }
}