<?php
// ========================================
// PROJECT NAYS 2.0 - FRONT CONTROLLER
// ========================================

// Define access constant
define('NAYS_ACCESS', true);

// Load bootstrap
require_once __DIR__ . '/bootstrap/app.php';

// Now create router instance - use the fully qualified class name
$router = new \App\Core\Router();

// Load routes
require_once __DIR__ . '/routes/web.php';

// Get current URL and method
$url = $_GET['url'] ?? '';
$method = $_SERVER['REQUEST_METHOD'];

// Dispatch to router
$router->dispatch($url, $method);