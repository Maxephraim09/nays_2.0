<?php
namespace App\Core;

class Controller {
    
    protected function model($model) {
        $modelClass = 'App\\Models\\' . $model;
        return new $modelClass();
    }
    
    protected function view($view, $data = []) {
        extract($data);
        
        $viewFile = APP_PATH . '/views/' . str_replace('.', '/', $view) . '.php';
        
        if (file_exists($viewFile)) {
            require_once APP_PATH . '/views/layouts/header.php';
            require_once $viewFile;
            require_once APP_PATH . '/views/layouts/footer.php';
        } else {
            die("View {$view} not found");
        }
    }
    
    protected function viewWithNav($view, $data = []) {
        extract($data);
        
        $viewFile = APP_PATH . '/views/' . str_replace('.', '/', $view) . '.php';
        
        if (file_exists($viewFile)) {
            require_once APP_PATH . '/views/layouts/header.php';
            require_once APP_PATH . '/views/layouts/navbar.php';
            require_once $viewFile;
            require_once APP_PATH . '/views/layouts/footer.php';
        } else {
            die("View {$view} not found");
        }
    }
    
    protected function viewWithSidebar($view, $data = []) {
        extract($data);
        
        $viewFile = APP_PATH . '/views/' . str_replace('.', '/', $view) . '.php';
        
        if (file_exists($viewFile)) {
            require_once APP_PATH . '/views/layouts/header.php';
            require_once APP_PATH . '/views/layouts/navbar.php';
            echo '<div class="container-fluid"><div class="row">';
            require_once APP_PATH . '/views/layouts/sidebar.php';
            echo '<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">';
            require_once $viewFile;
            echo '</main></div></div>';
            require_once APP_PATH . '/views/layouts/footer.php';
        } else {
            die("View {$view} not found");
        }
    }
    
    protected function viewWithSidebarOnly($view, $data = []) {
        extract($data);

        $viewFile = APP_PATH . '/views/' . str_replace('.', '/', $view) . '.php';

        if (file_exists($viewFile)) {
            require_once APP_PATH . '/views/layouts/header.php';
            echo '<div class="dashboard-container">';
            require_once APP_PATH . '/views/layouts/dashboard-sidebar.php';
            echo '<div class="main-content">';
            require_once APP_PATH . '/views/layouts/dashboard-header.php';
            echo '<div class="content-area">';
            require_once $viewFile;
            echo '</div></div></div>';
            require_once APP_PATH . '/views/layouts/footer.php';
        } else {
            die("View {$view} not found");
        }
    }
    
    protected function json($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
    
    protected function redirect($url) {
        header('Location: ' . APP_URL . '/' . $url);
        exit;
    }
    
    protected function back() {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    
    protected function validate($rules) {
        return Validator::validate($_POST, $rules);
    }
    
    protected function csrf() {
        return CsrfMiddleware::generateToken();
    }
}