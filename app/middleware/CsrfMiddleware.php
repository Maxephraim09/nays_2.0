<?php
namespace App\Middleware;

use App\Core\Session;

class CsrfMiddleware {
    
    public function handle() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST[CSRF_TOKEN_NAME] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? null;
            
            if (!$token || !$this->validateToken($token)) {
                die('Invalid CSRF token');
            }
        }
        return true;
    }
    
    public static function generateToken() {
        if (!Session::has('csrf_token')) {
            $token = bin2hex(random_bytes(32));
            Session::set('csrf_token', $token);
        }
        return Session::get('csrf_token');
    }
    
    protected function validateToken($token) {
        return hash_equals(Session::get('csrf_token') ?? '', $token);
    }
}