<?php
// ========================================
// AUTHENTICATION HELPER FUNCTIONS
// ========================================

// Import the Auth class with full namespace
use App\Core\Auth;

if (!function_exists('auth')) {
    function auth() {
        return new class {
            public function user() {
                return Auth::user();
            }
            
            public function check() {
                return Auth::check();
            }
            
            public function id() {
                return Auth::id();
            }
            
            public function hasRole($role) {
                return Auth::hasRole($role);
            }
        };
    }
}

if (!function_exists('is_logged_in')) {
    function is_logged_in() {
        return Auth::check();
    }
}

if (!function_exists('current_user')) {
    function current_user() {
        return Auth::user();
    }
}