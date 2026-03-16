<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Auth;

class AlumniController extends Controller {

    public function dashboard() {
        $user = Auth::user();

        $data = [
            'title' => 'Alumni Dashboard - ' . APP_NAME,
            'user' => $user,
            'stats' => [
                'total_alumni' => 1250,
                'active_mentors' => 45,
                'job_postings' => 23,
                'mentorship_sessions' => 156
            ],
            'recent_activities' => [
                [
                    'user' => 'Dr. Adebayo',
                    'action' => 'posted new job opportunity',
                    'target' => 'Software Engineer at TechCorp',
                    'time' => '2 hours ago'
                ],
                [
                    'user' => 'Prof. Johnson',
                    'action' => 'completed mentorship session',
                    'target' => 'with 3 students',
                    'time' => '5 hours ago'
                ]
            ]
        ];

        $this->viewWithSidebarOnly('dashboard.alumni-admin', $data);
    }

    public function directory() {
        $user = Auth::user();

        $data = [
            'title' => 'Alumni Directory - ' . APP_NAME,
            'user' => $user,
            'alumni' => [] // Would fetch from database
        ];

        $this->viewWithSidebarOnly('alumni.directory', $data);
    }

    public function jobs() {
        $user = Auth::user();

        $data = [
            'title' => 'Job Postings - ' . APP_NAME,
            'user' => $user,
            'jobs' => [] // Would fetch from database
        ];

        $this->viewWithSidebarOnly('alumni.jobs', $data);
    }

    public function createJob() {
        $user = Auth::user();

        // Handle job creation logic here
        // For now, just redirect back
        $this->redirect('alumni/jobs');
    }

    public function mentorship() {
        $user = Auth::user();

        $data = [
            'title' => 'Mentorship Program - ' . APP_NAME,
            'user' => $user,
            'mentorship' => [] // Would fetch from database
        ];

        $this->viewWithSidebarOnly('alumni.mentorship', $data);
    }

    public function events() {
        $user = Auth::user();

        $data = [
            'title' => 'Alumni Events - ' . APP_NAME,
            'user' => $user,
            'events' => [] // Would fetch from database
        ];

        $this->viewWithSidebarOnly('alumni.events', $data);
    }
}