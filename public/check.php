<?php
// System checker - run this first
echo "<h1>NAYS 2.0 System Check</h1>";

// Check PHP version
echo "<h2>PHP Version: " . phpversion() . "</h2>";

// Check required extensions
$required = ['pdo_mysql', 'json', 'session'];
foreach ($required as $ext) {
    echo "<p>" . ($ext) . ": " . (extension_loaded($ext) ? '✅' : '❌') . "</p>";
}

// Check directories
$dirs = [
    '../app',
    '../app/controllers',
    '../app/models',
    '../app/views',
    '../app/core',
    '../vendor'
];

foreach ($dirs as $dir) {
    $fullPath = __DIR__ . '/' . $dir;
    echo "<p>Checking $dir: " . (is_dir($fullPath) ? '✅' : '❌') . "</p>";
}

// Check .env file
echo "<p>.env file: " . (file_exists('../.env') ? '✅' : '❌') . "</p>";
if (file_exists('../.env')) {
    $env = parse_ini_file('../.env');
    echo "<pre>";
    print_r($env);
    echo "</pre>";
}

// Test database connection
try {
    if (file_exists('../.env')) {
        $env = parse_ini_file('../.env');
        $pdo = new PDO(
            "mysql:host={$env['DB_HOST']};dbname={$env['DB_NAME']}",
            $env['DB_USER'],
            $env['DB_PASS']
        );
        echo "<p>Database connection: ✅</p>";
    }
} catch (Exception $e) {
    echo "<p>Database connection: ❌ - " . $e->getMessage() . "</p>";
}