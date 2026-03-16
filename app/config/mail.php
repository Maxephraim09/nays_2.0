<?php
// ========================================
// MAIL CONFIGURATION
// ========================================

defined('NAYS_ACCESS') or define('NAYS_ACCESS', true);

// SMTP settings
define('MAIL_DRIVER', 'smtp');
define('MAIL_HOST', getenv('MAIL_HOST') ?: 'smtp.gmail.com');
define('MAIL_PORT', getenv('MAIL_PORT') ?: 587);
define('MAIL_USERNAME', getenv('MAIL_USERNAME') ?: 'your-email@gmail.com');
define('MAIL_PASSWORD', getenv('MAIL_PASSWORD') ?: 'your-app-password');
define('MAIL_ENCRYPTION', getenv('MAIL_ENCRYPTION') ?: 'tls');
define('MAIL_FROM_ADDRESS', getenv('MAIL_FROM_ADDRESS') ?: 'noreply@nays.ng');
define('MAIL_FROM_NAME', getenv('MAIL_FROM_NAME') ?: 'NAYS 2.0');