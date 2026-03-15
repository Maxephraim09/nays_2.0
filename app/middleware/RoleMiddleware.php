<?php
namespace App\Middleware;

use App\Core\Auth;
use App\Core\Session;

class RoleMiddleware {
    protected $role;
    
    public function handle($role = null) {
        $this->role = $role;
        
        if (!Auth::check()) {
            Session::flash('error', 'Please login to access this page');
            header('Location: ' . APP_URL . '/login');
            exit;
        }
        
        if ($role && !Auth::hasRole($role)) {
            Session::flash('error', 'You do not have permission to access this page');
            header('Location: ' . APP_URL . '/dashboard');
            exit;
        }
        
        return true;
    }
}