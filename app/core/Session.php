<?php
namespace App\Core;

class Session {
    
    public static function init() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }
    
    public static function get($key) {
        return $_SESSION[$key] ?? null;
    }
    
    public static function delete($key) {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }
    
    public static function destroy() {
        if (session_status() != PHP_SESSION_NONE) {
            session_destroy();
        }
        $_SESSION = [];
    }
    
    public static function flash($name, $message = null) {
        if ($message !== null) {
            $_SESSION['flash_' . $name] = $message;
        } else {
            $message = $_SESSION['flash_' . $name] ?? null;
            unset($_SESSION['flash_' . $name]);
            return $message;
        }
    }
    
    public static function has($key) {
        return isset($_SESSION[$key]);
    }
}