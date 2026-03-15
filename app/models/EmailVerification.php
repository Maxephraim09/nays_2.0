<?php
namespace App\Models;

use App\Core\Model;

class EmailVerification extends Model {
    protected $table = 'email_verifications';
    
    /**
     * Create verification token
     */
    public function createToken($userId) {
        // Delete old tokens
        $this->db->query("DELETE FROM {$this->table} WHERE user_id = :user_id")
                 ->bind(':user_id', $userId)
                 ->execute();
        
        // Create new token
        $token = bin2hex(random_bytes(32));
        $expires = date('Y-m-d H:i:s', strtotime('+24 hours'));
        
        $this->create([
            'user_id' => $userId,
            'token' => $token,
            'expires_at' => $expires
        ]);
        
        return $token;
    }
    
    /**
     * Verify token
     */
    public function verifyToken($token) {
        return $this->db->query("SELECT * FROM {$this->table} WHERE token = :token AND expires_at > NOW() AND used = 0")
                        ->bind(':token', $token)
                        ->single();
    }
    
    /**
     * Mark token as used
     */
    public function markAsUsed($token) {
        return $this->db->query("UPDATE {$this->table} SET used = 1 WHERE token = :token")
                        ->bind(':token', $token)
                        ->execute();
    }
}