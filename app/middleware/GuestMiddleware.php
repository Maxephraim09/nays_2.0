<?php
namespace App\Middleware;

use App\Core\Auth;
use App\Core\Session;

class GuestMiddleware {
    
    public function handle() {
        // Check if user is already logged in
        if (Auth::check()) {
            Session::flash('info', 'You are already logged in');
            header('Location: ' . APP_URL . '/dashboard');
            exit;
        }
        
        // Check for remember me token
        if (isset($_COOKIE['remember_token'])) {
            Auth::loginWithRememberToken();
            if (Auth::check()) {
                header('Location: ' . APP_URL . '/dashboard');
                exit;
            }
        }
        
        return true;
    }
}