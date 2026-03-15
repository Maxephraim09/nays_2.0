<?php
// ========================================
// GLOBAL HELPER FUNCTIONS
// ========================================

use App\Core\Session;

if (!function_exists('dd')) {
    function dd($data) {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        die();
    }
}

if (!function_exists('dump')) {
    function dump($data) {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
    }
}

if (!function_exists('asset')) {
    function asset($path) {
        return APP_URL . '/public/assets/' . ltrim($path, '/');
    }
}

if (!function_exists('url')) {
    function url($path = '') {
        return APP_URL . '/' . ltrim($path, '/');
    }
}

if (!function_exists('redirect')) {
    function redirect($path) {
        header('Location: ' . url($path));
        exit;
    }
}

if (!function_exists('csrf_field')) {
    function csrf_field() {
        $token = $_SESSION['csrf_token'] ?? bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $token;
        return '<input type="hidden" name="csrf_token" value="' . $token . '">';
    }
}

if (!function_exists('old')) {
    function old($field, $default = '') {
        return $_POST[$field] ?? $_SESSION['old'][$field] ?? $default;
    }
}

if (!function_exists('flash')) {
    function flash($key) {
        return Session::flash($key);
    }
}

if (!function_exists('str_limit')) {
    function str_limit($string, $limit = 100) {
        if (strlen($string) <= $limit) {
            return $string;
        }
        return substr($string, 0, $limit) . '...';
    }
}

if (!function_exists('time_ago')) {
    function time_ago($datetime) {
        $time = strtotime($datetime);
        $now = time();
        $diff = $now - $time;
        
        if ($diff < 60) {
            return 'just now';
        } elseif ($diff < 3600) {
            $mins = floor($diff / 60);
            return $mins . ' minute' . ($mins > 1 ? 's' : '') . ' ago';
        } elseif ($diff < 86400) {
            $hours = floor($diff / 3600);
            return $hours . ' hour' . ($hours > 1 ? 's' : '') . ' ago';
        } elseif ($diff < 604800) {
            $days = floor($diff / 86400);
            return $days . ' day' . ($days > 1 ? 's' : '') . ' ago';
        } else {
            return date('M j, Y', $time);
        }
    }
}

if (!function_exists('format_money')) {
    function format_money($amount) {
        return '₦' . number_format($amount, 2);
    }
}

if (!function_exists('generate_uuid')) {
    function generate_uuid() {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }
}