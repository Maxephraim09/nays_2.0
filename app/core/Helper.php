<?php
namespace App\Core;

class Helper
{
    public static function sanitize($input)
    {
        return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
    }

    public static function escape($output)
    {
        return htmlspecialchars($output, ENT_QUOTES, 'UTF-8');
    }

    public static function truncate($text, $length = 100, $suffix = '...')
    {
        if (strlen($text) <= $length) {
            return $text;
        }
        
        return substr($text, 0, $length) . $suffix;
    }

    public static function slugify($text)
    {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text);
        
        return empty($text) ? 'n-a' : $text;
    }

    public static function formatDate($date, $format = 'M d, Y')
    {
        return date($format, strtotime($date));
    }

    public static function formatDateTime($date, $format = 'M d, Y h:i A')
    {
        return date($format, strtotime($date));
    }

    public static function timeAgo($datetime)
    {
        $time = strtotime($datetime);
        $now = time();
        $diff = $now - $time;
        
        if ($diff < 60) {
            return $diff . ' seconds ago';
        } elseif ($diff < 3600) {
            return round($diff / 60) . ' minutes ago';
        } elseif ($diff < 86400) {
            return round($diff / 3600) . ' hours ago';
        } elseif ($diff < 604800) {
            return round($diff / 86400) . ' days ago';
        } elseif ($diff < 2592000) {
            return round($diff / 604800) . ' weeks ago';
        } elseif ($diff < 31536000) {
            return round($diff / 2592000) . ' months ago';
        } else {
            return round($diff / 31536000) . ' years ago';
        }
    }

    public static function moneyFormat($amount, $currency = '₦')
    {
        return $currency . number_format($amount, 2);
    }

    public static function generateToken($length = 32)
    {
        return bin2hex(random_bytes($length / 2));
    }

    public static function isValidEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function isValidPhone($phone)
    {
        return preg_match('/^[0-9]{11}$/', $phone);
    }

    public static function getInitials($name)
    {
        $words = explode(' ', $name);
        $initials = '';
        
        foreach ($words as $word) {
            $initials .= strtoupper(substr($word, 0, 1));
        }
        
        return substr($initials, 0, 2);
    }

    public static function randomColor()
    {
        $colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'dark'];
        return $colors[array_rand($colors)];
    }
}