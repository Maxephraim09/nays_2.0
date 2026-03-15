<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Auth;

class BranchController extends Controller {

    public function dashboard() {
        $user = Auth::user();

        $data = [
            'title' => 'Branch Admin Dashboard - ' . APP_NAME,
            'user' => $user,
            'branch' => [
                'name' => 'Lagos Branch',
                'location' => 'Lagos, Nigeria'
            ],
            'stats' => [
                'branch_members' => 156,
                'active_elections' => 1,
                'active_projects' => 3,
                'forum_topics' => 24
            ]
        ];

        $this->viewWithSidebarOnly('dashboard.branch-admin', $data);
    }

    public function members() {
        $user = Auth::user();

        $data = [
            'title' => 'Branch Members - ' . APP_NAME,
            'user' => $user,
            'members' => [] // Would fetch from database
        ];

        $this->viewWithSidebarOnly('branch.members', $data);
    }

    public function elections() {
        $user = Auth::user();

        $data = [
            'title' => 'Branch Elections - ' . APP_NAME,
            'user' => $user,
            'elections' => [] // Would fetch from database
        ];

        $this->viewWithSidebarOnly('branch.elections', $data);
    }

    public function projects() {
        $user = Auth::user();

        $data = [
            'title' => 'Branch Projects - ' . APP_NAME,
            'user' => $user,
            'projects' => [] // Would fetch from database
        ];

        $this->viewWithSidebarOnly('branch.projects', $data);
    }

    public function reports() {
        $user = Auth::user();

        $data = [
            'title' => 'Branch Reports - ' . APP_NAME,
            'user' => $user,
            'reports' => [] // Would generate reports
        ];

        $this->viewWithSidebarOnly('branch.reports', $data);
    }
}