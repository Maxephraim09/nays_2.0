<!-- Dashboard Content - TailAdmin Style -->
<div class="dashboard-content">
    <!-- Page Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Financial Dashboard</h1>
        <p class="text-gray-600">Monitor donations, payments, and financial performance</p>
    </div>

    <!-- Stats Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Donations -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Donations</p>
                    <p class="text-2xl font-bold text-gray-900">₦<?php echo number_format(($stats['total_donations'] ?? 250000) / 1000); ?>K</p>
                    <div class="flex items-center mt-2">
                        <span class="text-green-600 text-sm font-medium flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i> +15.3%
                        </span>
                        <span class="text-gray-500 text-sm ml-2">vs last month</span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center">
                    <i class="fas fa-money-bill-wave text-green-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Monthly Revenue -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Monthly Revenue</p>
                    <p class="text-2xl font-bold text-gray-900">₦<?php echo number_format(($stats['monthly_revenue'] ?? 45000) / 1000); ?>K</p>
                    <div class="flex items-center mt-2">
                        <span class="text-green-600 text-sm font-medium flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i> +8.7%
                        </span>
                        <span class="text-gray-500 text-sm ml-2">vs last month</span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center">
                    <i class="fas fa-calendar-alt text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>
                <div class="stat-text">
                    <div class="stat-value">₦<?php echo number_format(($stats['monthly_revenue'] ?? 45000) / 1000); ?>K</div>
                    <div class="stat-label">Monthly Revenue</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i> +8.7%
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Payments -->
        <div class="stat-card activity-card">
            <div class="stat-content">
                <div class="stat-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-text">
                    <div class="stat-value"><?php echo $stats['pending_payments'] ?? 12; ?></div>
                    <div class="stat-label">Pending Payments</div>
                    <div class="stat-change neutral">
                        <i class="fas fa-minus"></i> 0.0%
                    </div>
                </div>
            </div>
        </div>

        <!-- Budget Utilization -->
        <div class="stat-card projects-card">
            <div class="stat-content">
                <div class="stat-icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <div class="stat-text">
                    <div class="stat-value"><?php echo $stats['budget_utilization'] ?? 78; ?>%</div>
                    <div class="stat-label">Budget Utilization</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i> +5.2%
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions Section -->
<div class="dashboard-section">
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-900">Financial Operations</h2>
                <p class="text-gray-600 mt-1">Manage donations, payments, and financial reporting</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Manage Donations -->
            <div class="bg-white border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow cursor-pointer">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center">
                        <i class="fas fa-hand-holding-heart text-green-600"></i>
                    </div>
                    <span class="text-xs font-medium text-gray-500 bg-gray-100 px-2 py-1 rounded-full">₦<?php echo number_format(($stats['total_donations'] ?? 250000) / 1000); ?>K total</span>
                </div>
                <h3 class="font-medium text-gray-900 mb-1">Manage Donations</h3>
                <p class="text-sm text-gray-600 mb-3">Track donation records</p>
                <a href="<?php echo url('finance/donations'); ?>" class="text-green-600 text-sm font-medium hover:text-green-700">
                    View Donations →
                </a>
            </div>

            <!-- Payment Processing -->
            <div class="bg-white border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow cursor-pointer">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center">
                        <i class="fas fa-credit-card text-blue-600"></i>
                    </div>
                    <span class="text-xs font-medium text-gray-500 bg-gray-100 px-2 py-1 rounded-full"><?php echo $stats['pending_payments'] ?? 12; ?> pending</span>
                </div>
                <h3 class="font-medium text-gray-900 mb-1">Payment Processing</h3>
                <p class="text-sm text-gray-600 mb-3">Process transactions</p>
                <a href="<?php echo url('finance/payments'); ?>" class="text-blue-600 text-sm font-medium hover:text-blue-700">
                    Process Payments →
                </a>
            </div>

            <!-- Budget Management -->
            <div class="bg-white border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow cursor-pointer">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-10 h-10 bg-purple-50 rounded-lg flex items-center justify-center">
                        <i class="fas fa-chart-pie text-purple-600"></i>
                    </div>
                    <span class="text-xs font-medium text-gray-500 bg-gray-100 px-2 py-1 rounded-full"><?php echo $stats['budget_utilization'] ?? 78; ?>% used</span>
                </div>
                <h3 class="font-medium text-gray-900 mb-1">Budget Management</h3>
                <p class="text-sm text-gray-600 mb-3">Monitor allocation</p>
                <a href="<?php echo url('finance/budget'); ?>" class="text-purple-600 text-sm font-medium hover:text-purple-700">
                    Manage Budget →
                </a>
            </div>

            <!-- Financial Reports -->
            <div class="bg-white border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow cursor-pointer">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-10 h-10 bg-yellow-50 rounded-lg flex items-center justify-center">
                        <i class="fas fa-file-alt text-yellow-600"></i>
                    </div>
                    <span class="text-xs font-medium text-gray-500 bg-gray-100 px-2 py-1 rounded-full">Monthly reports</span>
                </div>
                <h3 class="font-medium text-gray-900 mb-1">Financial Reports</h3>
                <p class="text-sm text-gray-600 mb-3">Generate reports</p>
                <a href="<?php echo url('finance/reports'); ?>" class="text-yellow-600 text-sm font-medium hover:text-yellow-700">
                    View Reports →
                </a>
            </div>
        </div>
    </div>
</div>
                </div>
            </div>
            <a href="<?php echo url('finance/payments'); ?>" class="action-button secondary">
                <i class="fas fa-credit-card"></i>
                Process Payments
            </a>
        </div>

        <!-- Budget Management -->
        <div class="quick-action-card">
            <div class="action-icon">
                <i class="fas fa-chart-pie"></i>
            </div>
            <div class="action-content">
                <h3>Budget Management</h3>
                <p>Monitor budget allocation and utilization</p>
                <div class="action-meta">
                    <span class="funding-progress"><?php echo $stats['budget_utilization'] ?? 78; ?>% utilized</span>
                </div>
            </div>
            <a href="<?php echo url('finance/budget'); ?>" class="action-button info">
                <i class="fas fa-chart-pie"></i>
                Manage Budget
            </a>
        </div>

        <!-- Financial Reports -->
        <div class="quick-action-card featured">
            <div class="action-icon">
                <i class="fas fa-file-invoice-dollar"></i>
            </div>
            <div class="action-content">
                <h3>Financial Reports</h3>
                <p>Generate and view comprehensive financial reports</p>
                <div class="action-meta">
                    <span class="visibility-text">Monthly reports</span>
                </div>
            </div>
            <a href="<?php echo url('finance/reports'); ?>" class="action-button accent">
                <i class="fas fa-file-invoice-dollar"></i>
                View Reports
            </a>
        </div>
    </div>
</div>

<!-- Content Tabs -->
<div class="dashboard-section">
    <div class="content-tabs">
        <div class="tabs-header">
            <button class="tab-button active" data-tab="transactions">Recent Transactions</button>
            <button class="tab-button" data-tab="analytics">Financial Analytics</button>
            <button class="tab-button" data-tab="campaigns">Donation Campaigns</button>
        </div>

        <div class="tabs-content">
            <!-- Recent Transactions Tab -->
            <div class="tab-pane active" id="transactions">
                <div class="activity-feed">
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-hand-holding-heart"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-text">
                                <strong>₦25,000</strong> donation received from John Doe
                                <span class="activity-target">Education Fund</span>
                            </div>
                            <div class="activity-time">2 hours ago</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-text">
                                <strong>Payment processed</strong> for Lagos Branch Event
                                <span class="activity-target">₦15,000</span>
                            </div>
                            <div class="activity-time">4 hours ago</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-text">
                                <strong>Monthly report</strong> generated for February 2026
                                <span class="activity-target">Finance Department</span>
                            </div>
                            <div class="activity-time">1 day ago</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-text">
                                <strong>Budget allocation</strong> updated for Q1 projects
                                <span class="activity-target">₦500,000 allocated</span>
                            </div>
                            <div class="activity-time">2 days ago</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Financial Analytics Tab -->
            <div class="tab-pane" id="analytics">
                <div class="charts-grid">
                    <div class="chart-card">
                        <div class="chart-header">
                            <h4>Revenue Trends</h4>
                            <span class="chart-period">Last 6 months</span>
                        </div>
                        <div class="chart-container">
                            <canvas id="revenueChart"></canvas>
                        </div>
                    </div>

                    <div class="chart-card">
                        <div class="chart-header">
                            <h4>Donation Sources</h4>
                            <span class="chart-period">This year</span>
                        </div>
                        <div class="chart-container">
                            <canvas id="donationSourcesChart"></canvas>
                        </div>
                    </div>

                    <div class="chart-card">
                        <div class="chart-header">
                            <h4>Budget vs Actual</h4>
                            <span class="chart-period">Current month</span>
                        </div>
                        <div class="chart-container">
                            <canvas id="budgetChart"></canvas>
                        </div>
                    </div>

                    <div class="chart-card">
                        <div class="chart-header">
                            <h4>Payment Methods</h4>
                            <span class="chart-period">Last 30 days</span>
                        </div>
                        <div class="chart-container">
                            <canvas id="paymentMethodsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Donation Campaigns Tab -->
            <div class="tab-pane" id="campaigns">
                <div class="quick-actions-grid">
                    <div class="quick-action-card">
                        <div class="action-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="action-content">
                            <h3>Education Fund</h3>
                            <p>Support student scholarships and educational materials</p>
                            <div class="action-meta">
                                <span class="funding-progress">75% funded</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 75%"></div>
                            </div>
                        </div>
                        <a href="<?php echo url('finance/campaigns/education'); ?>" class="action-button primary">
                            <i class="fas fa-eye"></i>
                            View Campaign
                        </a>
                    </div>

                    <div class="quick-action-card">
                        <div class="action-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="action-content">
                            <h3>Branch Development</h3>
                            <p>Fund branch infrastructure and community projects</p>
                            <div class="action-meta">
                                <span class="funding-progress">60% funded</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 60%"></div>
                            </div>
                        </div>
                        <a href="<?php echo url('finance/campaigns/development'); ?>" class="action-button secondary">
                            <i class="fas fa-eye"></i>
                            View Campaign
                        </a>
                    </div>

                    <div class="quick-action-card">
                        <div class="action-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="action-content">
                            <h3>Emergency Relief</h3>
                            <p>Support members in times of need</p>
                            <div class="action-meta">
                                <span class="funding-progress">90% funded</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 90%"></div>
                            </div>
                        </div>
                        <a href="<?php echo url('finance/campaigns/relief'); ?>" class="action-button accent">
                            <i class="fas fa-eye"></i>
                            View Campaign
                        </a>
                    </div>

                    <div class="quick-action-card featured">
                        <div class="action-icon">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="action-content">
                            <h3>Create New Campaign</h3>
                            <p>Start a new donation campaign for your cause</p>
                            <div class="action-meta">
                                <span class="visibility-text">Quick setup</span>
                            </div>
                        </div>
                        <a href="<?php echo url('finance/campaigns/create'); ?>" class="action-button warning">
                            <i class="fas fa-plus"></i>
                            Create Campaign
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <p>View and process all donation transactions</p>
        <a href="<?php echo url('finance/donations'); ?>" class="btn btn-primary">
            <i class="fas fa-hand-holding-heart me-2"></i>View Donations
        </a>
    </div>

    <div class="quick-access-card">
        <div class="quick-access-icon">
            <i class="fas fa-credit-card"></i>
        </div>
        <h5>Payment Processing</h5>
        <p>Handle payment transactions and verifications</p>
        <a href="<?php echo url('finance/payments'); ?>" class="btn btn-success">
            <i class="fas fa-credit-card me-2"></i>Process Payments
        </a>
    </div>

    <div class="quick-access-card">
        <div class="quick-access-icon">
            <i class="fas fa-chart-bar"></i>
        </div>
        <h5>Financial Reports</h5>
        <p>Generate and view detailed financial reports</p>
        <a href="<?php echo url('finance/reports'); ?>" class="btn btn-info">
            <i class="fas fa-chart-bar me-2"></i>View Reports
        </a>
    </div>

    <div class="quick-access-card">
        <div class="quick-access-icon">
            <i class="fas fa-wallet"></i>
        </div>
        <h5>Budget Management</h5>
        <p>Plan and monitor budget allocations</p>
        <a href="<?php echo url('finance/budget'); ?>" class="btn btn-warning">
            <i class="fas fa-wallet me-2"></i>Manage Budget
        </a>
    </div>
</div>

<!-- Recent Financial Activities -->
<div class="dashboard-card">
    <div class="card-header">
        <h5 class="card-title">
            <i class="fas fa-history me-2"></i>Recent Financial Activities
        </h5>
    </div>
    <div class="card-body">
        <div class="activity-list">
            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-hand-holding-heart"></i>
                </div>
                <div class="activity-content">
                    <p class="activity-text">
                        <strong>Donation received</strong> from Lagos Branch
                        <span class="activity-target">₦25,000 - Education Fund</span>
                    </p>
                    <small class="activity-time">2 hours ago</small>
                </div>
            </div>

            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-credit-card"></i>
                </div>
                <div class="activity-content">
                    <p class="activity-text">
                        <strong>Payment processed</strong> for Abuja Branch
                        <span class="activity-target">₦15,000 - Project Funding</span>
                    </p>
                    <small class="activity-time">4 hours ago</small>
                </div>
            </div>

            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <div class="activity-content">
                    <p class="activity-text">
                        <strong>Monthly report</strong> generated
                        <span class="activity-target">Revenue: ₦180,000 | Expenses: ₦145,000</span>
                    </p>
                    <small class="activity-time">1 day ago</small>
                </div>
            </div>

            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-wallet"></i>
                </div>
                <div class="activity-content">
                    <p class="activity-text">
                        <strong>Budget allocation</strong> approved
                        <span class="activity-target">₦50,000 for Kano Branch Development</span>
                    </p>
                    <small class="activity-time">2 days ago</small>
                </div>
            </div>
        </div>
    </div>
</div>
            </span>
        </div>
    </div>
</div>

<!-- Recent Transactions -->
<div class="row mt-4">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Recent Transactions</h5>
            </div>
            <div class="card-body">
                <div class="transaction-list">
                    <?php foreach ($recent_transactions ?? [] as $transaction): ?>
                    <div class="transaction-item">
                        <div class="transaction-icon">
                            <i class="fas fa-<?php echo $transaction['type'] === 'donation' ? 'heart' : 'credit-card'; ?> text-<?php echo $transaction['status'] === 'completed' ? 'success' : 'warning'; ?>"></i>
                        </div>
                        <div class="transaction-details">
                            <h6><?php echo htmlspecialchars($transaction['user']); ?></h6>
                            <p class="mb-0"><?php echo ucfirst($transaction['type']); ?> - ₦<?php echo number_format($transaction['amount']); ?></p>
                            <small class="text-muted"><?php echo $transaction['date']; ?></small>
                        </div>
                        <div class="transaction-status">
                            <span class="badge bg-<?php echo $transaction['status'] === 'completed' ? 'success' : 'warning'; ?>">
                                <?php echo ucfirst($transaction['status']); ?>
                            </span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="<?php echo url('finance/donations'); ?>" class="btn btn-primary">
                        <i class="fas fa-hand-holding-heart me-2"></i>View Donations
                    </a>
                    <a href="<?php echo url('finance/reports'); ?>" class="btn btn-success">
                        <i class="fas fa-chart-bar me-2"></i>Generate Report
                    </a>
                    <a href="<?php echo url('finance/payments'); ?>" class="btn btn-warning">
                        <i class="fas fa-credit-card me-2"></i>Process Payments
                    </a>
                    <a href="<?php echo url('finance/budget'); ?>" class="btn btn-info">
                        <i class="fas fa-wallet me-2"></i>Budget Overview
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>