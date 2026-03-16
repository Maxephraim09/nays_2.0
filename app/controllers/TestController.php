<?php
namespace App\Controllers;

use App\Core\Controller;

class TestController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Test Page',
            'message' => 'If you can see this, the MVC is working!',
            'layout' => 'main'
        ];
        
        $this->view('test/index', $data);
    }
    
    public function json()
    {
        $this->json([
            'status' => 'success',
            'message' => 'API is working',
            'timestamp' => date('Y-m-d H:i:s')
        ]);
    }
}