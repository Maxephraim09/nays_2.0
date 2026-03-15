<?php
namespace App\Core;

use App\Models\User;

class Auth {
    
    /**
     * Attempt to login user
     */
    public static function attempt($email, $password, $remember = false) {
        $db = Database::getInstance();
        $userModel = new User();
        
        // Find user by email
        $user = $db->query("SELECT * FROM users WHERE email = :email")
                   ->bind(':email', $email)
                   ->single();
        
        if ($user && password_verify($password, $user->password_hash)) {
            // Check if account is locked
            if ($user->lock_until && strtotime($user->lock_until) > time()) {
                return ['error' => 'Account is locked. Try again later.'];
            }
            
            // Check if email is verified
            if (!$user->email_verified) {
                return ['error' => 'Please verify your email address first'];
            }
            
            // Check if account is active
            if ($user->status !== 'active') {
                return ['error' => 'Your account is not active. Please contact support.'];
            }
            
            // Reset login attempts
            $userModel->resetLoginAttempts($email);
            
            // Set session
            Session::set('user_id', $user->id);
            Session::set('user_email', $user->email);
            Session::set('user_name', $user->first_name . ' ' . $user->last_name);
            Session::set('logged_in', true);
            
            // Set remember me token
            if ($remember) {
                $token = bin2hex(random_bytes(32));
                $db->query("UPDATE users SET remember_token = :token WHERE id = :id")
                   ->bind(':token', $token)
                   ->bind(':id', $user->id)
                   ->execute();
                
                // Set cookie for 30 days
                setcookie('remember_token', $token, time() + (86400 * 30), '/');
            }
            
            // Update last login
            $userModel->updateLastLogin($user->id);
            
            return true;
        } else {
            // Increment login attempts
            $userModel->incrementLoginAttempts($email);
            
            return ['error' => 'Invalid email or password'];
        }
    }
    
    /**
     * Login with remember token
     */
    public static function loginWithRememberToken() {
        if (isset($_COOKIE['remember_token'])) {
            $token = $_COOKIE['remember_token'];
            
            $db = Database::getInstance();
            $user = $db->query("SELECT * FROM users WHERE remember_token = :token")
                       ->bind(':token', $token)
                       ->single();
            
            if ($user) {
                Session::set('user_id', $user->id);
                Session::set('user_email', $user->email);
                Session::set('user_name', $user->first_name . ' ' . $user->last_name);
                Session::set('logged_in', true);
                return true;
            }
        }
        return false;
    }
    
    /**
     * Get current user
     */
    public static function user() {
        if (!self::check()) {
            return null;
        }
        
        $db = Database::getInstance();
        return $db->query("SELECT * FROM users WHERE id = :id")
                  ->bind(':id', Session::get('user_id'))
                  ->single();
    }
    
    /**
     * Check if user is logged in
     */
    public static function check() {
        return Session::get('logged_in') === true;
    }
    
    /**
     * Logout user
     */
    public static function logout() {
        // Clear remember token from database
        if (self::check()) {
            $db = Database::getInstance();
            $db->query("UPDATE users SET remember_token = NULL WHERE id = :id")
               ->bind(':id', Session::get('user_id'))
               ->execute();
        }

        // Clear cookie
        setcookie('remember_token', '', time() - 3600, '/');

        // Clear session cookie and destroy session
        if (session_status() != PHP_SESSION_NONE) {
            // Clear the session cookie
            if (isset($_COOKIE[session_name()])) {
                setcookie(session_name(), '', time() - 3600, '/');
            }
            session_destroy();
        }

        // Clear session array
        $_SESSION = [];
    }
    
    /**
     * Get user ID
     */
    public static function id() {
        return Session::get('user_id');
    }
    
    /**
     * Check if user has role
     */
    public static function hasRole($role) {
        $user = self::user();
        if (!$user) return false;
        
        $db = Database::getInstance();
        $userRole = $db->query("SELECT r.name FROM roles r 
                                JOIN branch_members bm ON r.id = bm.role_id 
                                WHERE bm.user_id = :user_id AND bm.is_primary_branch = 1")
                       ->bind(':user_id', $user->id)
                       ->single();
        
        return $userRole && ($userRole->name === $role || $userRole->name === 'super_admin');
    }
    
    /**
     * Get current user role
     */
    public static function getCurrentRole() {
        $user = self::user();
        if (!$user) return 'guest';
        
        $db = Database::getInstance();
        $userRole = $db->query("SELECT r.name FROM roles r 
                                JOIN branch_members bm ON r.id = bm.role_id 
                                WHERE bm.user_id = :user_id AND bm.is_primary_branch = 1")
                       ->bind(':user_id', $user->id)
                       ->single();
        
        return $userRole ? $userRole->name : 'member';
    }
}