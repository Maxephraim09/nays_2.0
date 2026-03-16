<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Auth;

class FinanceController extends Controller {

    public function dashboard() {
        $user = Auth::user();

        $data = [
            'title' => 'Finance Dashboard - ' . APP_NAME,
            'user' => $user,
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

        $this->viewWithSidebarOnly('dashboard.finance-admin', $data);
    }

    public function donations() {
        $user = Auth::user();

        $data = [
            'title' => 'Donations Management - ' . APP_NAME,
            'user' => $user,
            'donations' => [] // Would fetch from database
        ];

        $this->viewWithSidebarOnly('finance.donations', $data);
    }

    public function payments() {
        $user = Auth::user();

        $data = [
            'title' => 'Payment Processing - ' . APP_NAME,
            'user' => $user,
            'payments' => [] // Would fetch from database
        ];

        $this->viewWithSidebarOnly('finance.payments', $data);
    }

    public function reports() {
        $user = Auth::user();

        $data = [
            'title' => 'Financial Reports - ' . APP_NAME,
            'user' => $user,
            'reports' => [] // Would generate reports
        ];

        $this->viewWithSidebarOnly('finance.reports', $data);
    }

    public function budget() {
        $user = Auth::user();

        $data = [
            'title' => 'Budget Management - ' . APP_NAME,
            'user' => $user,
            'budget' => [] // Would fetch budget data
        ];

        $this->viewWithSidebarOnly('finance.budget', $data);
    }
}