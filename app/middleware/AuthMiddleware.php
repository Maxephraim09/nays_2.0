<?php
namespace App\Middleware;

use App\Core\Auth;
use App\Core\Session;

class AuthMiddleware {
    
    public function handle() {
        // Check if user is logged in
        if (!Auth::check()) {
            // Check for remember me token
            if (isset($_COOKIE['remember_token'])) {
                Auth::loginWithRememberToken();
            }
            
            if (!Auth::check()) {
                Session::flash('error', 'Please login to access this page');
                header('Location: ' . APP_URL . '/login');
                exit;
            }
        }
        
        return true;
    }
}