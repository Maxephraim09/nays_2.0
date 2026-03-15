<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Auth;

class DashboardController extends Controller {

    public function index() {
        $user = Auth::user();

        // Determine dashboard based on user role
        $role = $this->getUserRole($user);

        $data = [
            'title' => 'Dashboard - ' . APP_NAME,
            'user' => $user,
            'scripts' => ['dashboard.js']
        ];

        // Add role-specific data
        switch($role) {
            case 'super_admin':
            case 'national_admin':
                $data = array_merge($data, $this->getAdminData());
                $view = 'dashboard.admin';
                break;
            case 'branch_admin':
                $data = array_merge($data, $this->getBranchAdminData($user));
                $view = 'dashboard.branch-admin';
                break;
            case 'election_observer':
                $data = array_merge($data, $this->getElectionObserverData());
                $view = 'dashboard.election-observer';
                break;
            case 'finance_admin':
                $data = array_merge($data, $this->getFinanceAdminData());
                $view = 'dashboard.finance-admin';
                break;
            case 'alumni_admin':
                $data = array_merge($data, $this->getAlumniAdminData());
                $view = 'dashboard.alumni-admin';
                break;
            case 'member':
            default:
                $data = array_merge($data, $this->getMemberData($user));
                $view = 'dashboard.member';
                break;
        }

        $this->viewWithSidebarOnly($view, $data);
    }

    private function getUserRole($user) {
        // Query the database to get the user's actual role
        $db = \App\Core\Database::getInstance();
        $userRole = $db->query("SELECT r.name FROM roles r
                                JOIN branch_members bm ON r.id = bm.role_id
                                WHERE bm.user_id = :user_id AND bm.is_primary_branch = 1")
                       ->bind(':user_id', $user->id)
                       ->single();

        if ($userRole) {
            return $userRole->name;
        }

        // Fallback to member if no role found
        return 'member';
    }

    private function getAdminData() {
        return [
            'stats' => [
                'total_users' => 1250,
                'total_branches' => 45,
                'active_elections' => 2,
                'total_donations' => 250000
            ],
            'recent_activities' => [
                [
                    'user' => 'John Doe',
                    'action' => 'registered as a new member',
                    'target' => 'Lagos Branch',
                    'time' => '2 hours ago',
                    'icon' => 'user-plus'
                ],
                [
                    'user' => 'Election System',
                    'action' => 'started for Student Council',
                    'target' => 'Abuja Branch',
                    'time' => '5 hours ago',
                    'icon' => 'vote-yea'
                ]
            ]
        ];
    }

    private function getBranchAdminData($user) {
        return [
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
    }

    private function getElectionObserverData() {
        return [
            'stats' => [
                'elections_monitored' => 8,
                'reports_filed' => 3,
                'voters_observed' => 1250,
                'integrity_score' => 98
            ]
        ];
    }

    private function getFinanceAdminData() {
        return [
            'stats' => [
                'total_donations' => 250000,
                'monthly_revenue' => 45000,
                'pending_payments' => 12,
                'budget_utilization' => 78
            ],
            'recent_transactions' => [
                [
                    'user' => 'John Doe',
                    'amount' => 5000,
                    'type' => 'donation',
                    'status' => 'completed',
                    'date' => '2024-01-15'
                ],
                [
                    'user' => 'Jane Smith',
                    'amount' => 2500,
                    'type' => 'membership_fee',
                    'status' => 'pending',
                    'date' => '2024-01-14'
                ]
            ]
        ];
    }

    private function getAlumniAdminData() {
        return [
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
    }

    private function getMemberData($user) {
        return [
            'stats' => [
                'academy_progress' => 75,
                'votes_cast' => 3,
                'forum_posts' => 12,
                'leaderboard_rank' => 24
            ]
        ];
    }
}