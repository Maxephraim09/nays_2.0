<?php
// ========================================
// APPLICATION CONFIGURATION
// ========================================

defined('NAYS_ACCESS') or define('NAYS_ACCESS', true);

// Application settings
define('APP_NAME', getenv('APP_NAME') ?: 'NAYS 2.0');

// Fix APP_URL - remove trailing slash if present
$appUrl = getenv('APP_URL') ?: 'http://localhost/nays-project';
define('APP_URL', rtrim($appUrl, '/'));

define('APP_ENV', getenv('APP_ENV') ?: 'development');
define('APP_DEBUG', getenv('APP_DEBUG') ?: true);
define('APP_TIMEZONE', 'Africa/Lagos');
define('APP_VERSION', '2.0.0');

// Security
define('SESSION_NAME', 'nays_session');
define('SESSION_LIFETIME', 7200);
define('PASSWORD_ALGO', PASSWORD_BCRYPT);
define('BCRYPT_COST', 12);

// Paths
define('BASE_PATH', dirname(dirname(__DIR__)));
define('UPLOAD_PATH', BASE_PATH . '/public/uploads');
