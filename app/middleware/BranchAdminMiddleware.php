<?php
namespace App\Middleware;

use App\Core\Auth;
use App\Core\Session;

class BranchAdminMiddleware {
    
    public function handle($branchId = null) {
        if (!Auth::check()) {
            Session::flash('error', 'Please login to access this page');
            header('Location: ' . APP_URL . '/login');
            exit;
        }
        
        if (!Auth::isBranchAdmin($branchId)) {
            Session::flash('error', 'You must be a branch admin to access this page');
            header('Location: ' . APP_URL . '/dashboard');
            exit;
        }
        
        return true;
    }
}