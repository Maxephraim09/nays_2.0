<?php
namespace App\Models;

use App\Core\Model;

class PasswordReset extends Model {
    protected $table = 'password_resets';
    
    /**
     * Create reset token
     */
    public function createToken($email) {
        // Delete old tokens
        $this->db->query("DELETE FROM {$this->table} WHERE email = :email")
                 ->bind(':email', $email)
                 ->execute();
        
        // Create new token
        $token = bin2hex(random_bytes(32));
        $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));
        
        $this->create([
            'email' => $email,
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