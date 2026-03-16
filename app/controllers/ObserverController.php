<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Auth;

class ObserverController extends Controller {

    public function dashboard() {
        $user = Auth::user();

        $data = [
            'title' => 'Election Observer Dashboard - ' . APP_NAME,
            'user' => $user,
            'stats' => [
                'elections_monitored' => 8,
                'reports_filed' => 3,
                'voters_observed' => 1250,
                'integrity_score' => 98
            ]
        ];

        $this->viewWithSidebarOnly('dashboard.election-observer', $data);
    }

    public function elections() {
        $user = Auth::user();

        $data = [
            'title' => 'Monitor Elections - ' . APP_NAME,
            'user' => $user,
            'elections' => [] // Would fetch from database
        ];

        $this->viewWithSidebarOnly('observer.elections', $data);
    }

    public function reports() {
        $user = Auth::user();

        $data = [
            'title' => 'My Reports - ' . APP_NAME,
            'user' => $user,
            'reports' => [] // Would fetch from database
        ];

        $this->viewWithSidebarOnly('observer.reports', $data);
    }

    public function submitReport() {
        $user = Auth::user();

        // Handle report submission logic here
        // For now, just redirect back
        $this->redirect('observer/reports');
    }
}