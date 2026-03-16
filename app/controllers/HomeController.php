<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Core\Validator;

class HomeController extends Controller {
    
    public function index() {
        $data = [
            'title' => 'Welcome to ' . APP_NAME,
            'description' => 'National Association of Yungur Students - Integrated Digital Governance Platform',
            'isLoggedIn' => auth()->check(),  // Using helper instead of Auth::check()
            'user' => auth()->user(),          // Using helper instead of Auth::user()
            'features' => [
                [
                    'icon' => 'users',
                    'title' => 'Member Management',
                    'description' => 'Register, verify, and manage your membership with digital ID cards.'
                ],
                [
                    'icon' => 'vote-yea',
                    'title' => 'Elections',
                    'description' => 'Secure online voting with blockchain-ready verification.'
                ],
                [
                    'icon' => 'graduation-cap',
                    'title' => 'NAYS Academy',
                    'description' => 'CBT practice, JAMB/WAEC preparation, and leaderboards.'
                ],
                [
                    'icon' => 'star',
                    'title' => 'Talent Hub',
                    'description' => 'Showcase your talents in our Yungur Excellence Gallery.'
                ],
                [
                    'icon' => 'project-diagram',
                    'title' => 'Projects',
                    'description' => 'Community projects, crowdfunding, and impact tracking.'
                ],
                [
                    'icon' => 'comments',
                    'title' => 'Forum',
                    'description' => 'Connect with Yungur students worldwide.'
                ]
            ],
            'stats' => [
                ['value' => '5,000+', 'label' => 'Active Members'],
                ['value' => '50+', 'label' => 'Branches'],
                ['value' => '100+', 'label' => 'Projects'],
                ['value' => '20+', 'label' => 'Countries']
            ]
        ];
        
        $this->viewWithNav('home.index', $data);
    }
    
    public function about() {
        $data = [
            'title' => 'About Us - ' . APP_NAME,
            'isLoggedIn' => auth()->check()
        ];
        
        $this->viewWithNav('home.about', $data);
    }
    
    public function contact() {
        $data = [
            'title' => 'Contact Us - ' . APP_NAME,
            'isLoggedIn' => auth()->check()
        ];
        
        // Handle contact form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleContact();
        }
        
        $this->viewWithNav('home.contact', $data);
    }
    
    private function handleContact() {
        // Validate CSRF
        if (!$this->verifyCsrfToken()) {
            Session::flash('error', 'Invalid security token');
            $this->redirect('contact');
            return;
        }
        
        // Validate input
        $validator = Validator::validate($_POST, [
            'name' => 'required|min:2',
            'email' => 'required|email',
            'subject' => 'required|min:3',
            'message' => 'required|min:10'
        ]);
        
        if ($validator->fails()) {
            Session::set('old', $_POST);
            Session::flash('errors', $validator->getErrors());
            $this->redirect('contact');
            return;
        }
        
        // Send email (implement your email logic here)
        // For now, just show success message
        
        Session::flash('success', 'Thank you for contacting us. We will get back to you soon!');
        $this->redirect('contact');
    }
    
    private function verifyCsrfToken() {
        return isset($_POST['csrf_token']) && $_POST['csrf_token'] === Session::get('csrf_token');
    }
}