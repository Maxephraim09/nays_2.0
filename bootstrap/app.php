<?php
// ========================================
// PROJECT NAYS 2.0 - APPLICATION BOOTSTRAP
// ========================================

// Define root path
define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . '/app');
define('PUBLIC_PATH', ROOT_PATH . '/public');
define('STORAGE_PATH', ROOT_PATH . '/storage');
define('VENDOR_PATH', ROOT_PATH . '/vendor');

// ========================================
// LOAD COMPOSER AUTOLOADER FIRST
// ========================================
if (file_exists(VENDOR_PATH . '/autoload.php')) {
    require_once VENDOR_PATH . '/autoload.php';
} else {
    die('Composer autoloader not found. Please run: composer install');
}

// ========================================
// LOAD ENVIRONMENT VARIABLES
// ========================================
if (file_exists(ROOT_PATH . '/.env')) {
    $lines = file(ROOT_PATH . '/.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);
        putenv(sprintf('%s=%s', $name, $value));
        $_ENV[$name] = $value;
        $_SERVER[$name] = $value;
    }
}

// ========================================
// LOAD CONFIGURATION FILES
// ========================================
require_once APP_PATH . '/config/database.php';
require_once APP_PATH . '/config/app.php';
require_once APP_PATH . '/config/mail.php';
require_once APP_PATH . '/config/constants.php';

// ========================================
// ERROR REPORTING
// ========================================
if (APP_DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    ini_set('error_log', STORAGE_PATH . '/logs/error.log');
}

// ========================================
// TIMEZONE
// ========================================
date_default_timezone_set(APP_TIMEZONE);

// ========================================
// SESSION
// ========================================
if (session_status() == PHP_SESSION_NONE) {
    session_name(SESSION_NAME);
    session_start();
}

// ========================================
// LOAD CORE CLASSES - IN CORRECT ORDER
// ========================================
$coreClasses = [
    'Database.php',
    'Session.php',
    'Auth.php',
    'Validator.php',
    'Uploader.php',
    'Model.php',
    'Controller.php',
    'Router.php'  // Router loaded after Controller
];

foreach ($coreClasses as $class) {
    $file = APP_PATH . '/core/' . $class;
    if (file_exists($file)) {
        require_once $file;
    } else {
        die("Core class not found: " . $file);
    }
}

// ========================================
// LOAD HELPERS
// ========================================
$helperFiles = [
    'functions.php',
    'auth_helper.php',
    'form_helper.php'
];

foreach ($helperFiles as $helper) {
    $file = APP_PATH . '/helpers/' . $helper;
    if (file_exists($file)) {
        require_once $file;
    }
}

// ========================================
// CUSTOM AUTOLOADER FOR APP NAMESPACE
// ========================================
spl_autoload_register(function ($className) {
    $prefix = 'App\\';
    $base_dir = APP_PATH . '/';
    
    $len = strlen($prefix);
    if (strncmp($prefix, $className, $len) === 0) {
        $relative_class = substr($className, $len);
        $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
        
        if (file_exists($file)) {
            require_once $file;
            return true;
        }
    }
    return false;
}, true, true);

// ========================================
// INITIALIZE DATABASE
// ========================================
use App\Core\Database;

try {
    $db = Database::getInstance();
} catch (Exception $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Debug: Confirm Router is loaded
if (APP_DEBUG) {
    if (class_exists('App\Core\Router')) {
        error_log("✅ Router class loaded successfully");
    } else {
        error_log("❌ Router class NOT loaded");
    }
}