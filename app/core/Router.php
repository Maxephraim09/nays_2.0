<?php
namespace App\Core;

class Router {
    protected $routes = [];
    protected $params = [];
    
    /**
     * Add a route to the routing table
     */
    public function add($route, $controller, $method = 'GET', $middleware = []) {
        $this->routes[] = [
            'url' => $route,
            'controller' => $controller,
            'method' => strtoupper($method),
            'middleware' => $middleware
        ];
    }
    
    /**
     * Add a GET route
     */
    public function get($route, $controller, $middleware = []) {
        $this->add($route, $controller, 'GET', $middleware);
    }
    
    /**
     * Add a POST route
     */
    public function post($route, $controller, $middleware = []) {
        $this->add($route, $controller, 'POST', $middleware);
    }
    
    /**
     * Add a PUT route
     */
    public function put($route, $controller, $middleware = []) {
        $this->add($route, $controller, 'PUT', $middleware);
    }
    
    /**
     * Add a DELETE route
     */
    public function delete($route, $controller, $middleware = []) {
        $this->add($route, $controller, 'DELETE', $middleware);
    }
    
    /**
     * Get all registered routes
     */
    public function getRoutes() {
        return $this->routes;
    }
    
    /**
     * Dispatch the request to the appropriate controller
     */
    public function dispatch($url, $method) {
        // Clean the URL
        $url = $this->removeQueryString($url);
        
        // Handle empty URL (root) - CRITICAL FIX
        if ($url === '' || $url === '/') {
            $url = '/';
        } else {
            // Ensure URL starts with / for consistent matching
            $url = '/' . ltrim($url, '/');
        }
        
        // Clear any output buffers to prevent header issues
        if (ob_get_level()) {
            ob_clean();
        }
        
        error_log("Dispatching URL: '" . $url . "' Method: " . $method);
        
        // First, try exact matching (faster)
        foreach ($this->routes as $route) {
            if ($route['url'] === $url && $route['method'] === $method) {
                return $this->executeRoute($route);
            }
        }
        
        // If no exact match, try pattern matching with parameters
        foreach ($this->routes as $route) {
            $pattern = $this->buildPattern($route['url']);
            
            if (preg_match($pattern, $url, $matches) && $route['method'] === $method) {
                // Remove the full match
                array_shift($matches);
                
                return $this->executeRoute($route, $matches);
            }
        }
        
        // No route found
        $this->notFound();
    }
    
    /**
     * Execute a route with optional parameters
     */
    private function executeRoute($route, $params = []) {
        // Run middleware
        foreach ($route['middleware'] as $middleware) {
            $result = $this->runMiddleware($middleware);
            if ($result === false) {
                return; // Middleware stopped execution
            }
        }
        
        // Handle closure routes
        if ($route['controller'] instanceof \Closure) {
            call_user_func_array($route['controller'], $params);
            return;
        }
        
        // Handle controller@method format
        $parts = explode('@', $route['controller']);
        $controllerName = 'App\\Controllers\\' . $parts[0];
        $methodName = $parts[1] ?? 'index';
        
        // Check if controller exists
        if (!class_exists($controllerName)) {
            $this->notFound("Controller not found: " . $controllerName);
            return;
        }
        
        $controller = new $controllerName();
        
        // Check if method exists
        if (!method_exists($controller, $methodName)) {
            $this->notFound("Method not found: " . $controllerName . "::" . $methodName);
            return;
        }
        
        // Call the controller method with parameters
        call_user_func_array([$controller, $methodName], $params);
    }
    
    /**
     * Build regex pattern from route URL
     */
    private function buildPattern($route) {
        // Handle root route
        if ($route === '/') {
            return '/^\\/$/';
        }
        
        // Escape forward slashes
        $route = str_replace('/', '\\/', $route);
        
        // Replace {param} with regex capture group
        $route = preg_replace('/\{([a-z]+)\}/', '([a-zA-Z0-9-]+)', $route);
        
        return '/^' . $route . '$/';
    }
    
    /**
     * Remove query string from URL
     */
    protected function removeQueryString($url) {
        if ($url != '') {
            $parts = explode('?', $url, 2);
            $url = $parts[0];
        }
        return $url;
    }
    
    /**
     * Run middleware
     */
    protected function runMiddleware($middleware) {
        // Parse middleware with parameters (e.g., Role:admin)
        if (strpos($middleware, ':') !== false) {
            list($name, $params) = explode(':', $middleware, 2);
            $params = explode(',', $params);
        } else {
            $name = $middleware;
            $params = [];
        }
        
        $middlewareClass = 'App\\Middleware\\' . $name . 'Middleware';
        
        if (class_exists($middlewareClass)) {
            $instance = new $middlewareClass();
            if (method_exists($instance, 'handle')) {
                return call_user_func_array([$instance, 'handle'], $params);
            }
        }
        
        return true; // Continue if middleware doesn't exist
    }
    
    /**
     * Show 404 page
     */
    protected function notFound($message = null) {
        // Set 404 header if not already sent
        if (!headers_sent()) {
            header("HTTP/1.0 404 Not Found");
        }
        
        // Check if it's an AJAX request
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            header('Content-Type: application/json');
            echo json_encode(['error' => '404 - Page Not Found', 'message' => $message]);
            exit;
        }
        
        // Try to load custom 404 view
        $viewFile = APP_PATH . '/views/errors/404.php';
        
        if (file_exists($viewFile)) {
            // Try to load with layout
            $headerFile = APP_PATH . '/views/layouts/header.php';
            $navbarFile = APP_PATH . '/views/layouts/navbar.php';
            $footerFile = APP_PATH . '/views/layouts/footer.php';
            
            // Start output buffering to prevent header issues
            ob_start();
            
            if (file_exists($headerFile)) require_once $headerFile;
            if (file_exists($navbarFile)) require_once $navbarFile;
            
            // Pass message to view
            $error_message = $message;
            require_once $viewFile;
            
            if (file_exists($footerFile)) require_once $footerFile;
            
            ob_end_flush();
        } else {
            // Fallback 404 page
            echo "<!DOCTYPE html>";
            echo "<html><head><title>404 Not Found</title>";
            echo "<style>";
            echo "body { font-family: Arial, sans-serif; text-align: center; padding: 50px; }";
            echo "h1 { font-size: 48px; color: #333; }";
            echo "p { color: #666; }";
            echo "a { color: #0d6efd; text-decoration: none; }";
            echo "a:hover { text-decoration: underline; }";
            echo "</style>";
            echo "</head><body>";
            echo "<h1>404</h1>";
            echo "<h2>Page Not Found</h2>";
            echo "<p>" . ($message ?? "The page you are looking for could not be found.") . "</p>";
            echo "<p><a href='" . APP_URL . "'>Go to Homepage</a></p>";
            echo "</body></html>";
        }
        
        exit;
    }
    
    /**
     * Test if a pattern matches (for debugging)
     */
    public function testPattern($route) {
        return $this->buildPattern($route);
    }
}