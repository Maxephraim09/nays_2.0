<?php
namespace App\Core;

class View
{
    protected $layout = 'main';

    public function render($view, $data = [])
    {
        extract($data);
        
        $viewFile = __DIR__ . '/../views/' . str_replace('.', '/', $view) . '.php';
        
        if (file_exists($viewFile)) {
            ob_start();
            include $viewFile;
            $content = ob_get_clean();
            
            $layoutFile = __DIR__ . '/../views/layouts/' . $this->layout . '.php';
            if (file_exists($layoutFile)) {
                include $layoutFile;
            } else {
                echo $content;
            }
        } else {
            echo "View not found: $view";
        }
    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function asset($path)
    {
        return '/nays-project/public/assets/' . ltrim($path, '/');
    }

    public function url($path = '')
    {
        return '/nays-project/' . ltrim($path, '/');
    }
}