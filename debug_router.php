<?php
echo "<h1>Router Debug</h1>";

define('ROOT_PATH', __DIR__);
define('APP_PATH', ROOT_PATH . '/app');

echo "<h2>Checking Router file:</h2>";
$routerFile = APP_PATH . '/core/Router.php';
if (file_exists($routerFile)) {
    echo "✅ Router file exists at: " . $routerFile . "<br>";
    
    // Show first few lines
    echo "<h3>First 10 lines of Router.php:</h3>";
    echo "<pre>";
    $lines = file($routerFile);
    for ($i = 0; $i < min(10, count($lines)); $i++) {
        echo htmlspecialchars($lines[$i]);
    }
    echo "</pre>";
} else {
    echo "❌ Router file does NOT exist at: " . $routerFile . "<br>";
}

echo "<h2>Checking core directory:</h2>";
$coreDir = APP_PATH . '/core';
if (is_dir($coreDir)) {
    echo "✅ Core directory exists<br>";
    echo "Files in core directory:<br>";
    $files = scandir($coreDir);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            echo " - " . $file . "<br>";
        }
    }
} else {
    echo "❌ Core directory does NOT exist at: " . $coreDir . "<br>";
}