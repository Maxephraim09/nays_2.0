<!-- Dashboard Content - TailAdmin Style -->
<div class="dashboard-content">
    <!-- Page Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Branch Administration</h1>
        <p class="text-gray-600">Manage your local branch operations and community</p>
    </div>

    <!-- Stats Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Branch Members -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Branch Members</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo $stats['branch_members'] ?? '156'; ?></p>
                    <div class="flex items-center mt-2">
                        <span class="text-green-600 text-sm font-medium flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i> +5 this week
                        </span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center">
                    <i class="fas fa-users text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Active Elections -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Active Elections</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo $stats['active_elections'] ?? '1'; ?></p>
                    <div class="flex items-center mt-2">
                        <span class="text-orange-600 text-sm font-medium flex items-center">
                            <i class="fas fa-clock mr-1"></i> Ends in 3 days
                        </span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-purple-50 rounded-lg flex items-center justify-center">
                    <i class="fas fa-vote-yea text-purple-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Active Projects -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Active Projects</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo $stats['active_projects'] ?? '3'; ?></p>
                    <div class="flex items-center mt-2">
                        <span class="text-green-600 text-sm font-medium flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i> +2 this month
                        </span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center">
                    <i class="fas fa-project-diagram text-green-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Branch Funds -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Branch Funds</p>
                    <p class="text-2xl font-bold text-gray-900">₦<?php echo number_format(($stats['branch_funds'] ?? 450000) / 1000); ?>K</p>
                    <div class="flex items-center mt-2">
                        <span class="text-green-600 text-sm font-medium flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i> +12.5%
                        </span>
                        <span class="text-gray-500 text-sm ml-2">vs last month</span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-red-50 rounded-lg flex items-center justify-center">
                    <i class="fas fa-hand-holding-heart text-red-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Section -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-900">Branch Management</h2>
                <p class="text-gray-600 mt-1">Manage your branch operations and community</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Manage Members -->
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow cursor-pointer">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center">
                        <i class="fas fa-users text-blue-600"></i>
                    </div>
                    <span class="text-xs font-medium text-gray-500 bg-white px-2 py-1 rounded-full border"><?php echo $stats['branch_members'] ?? '156'; ?> members</span>
                </div>
                <h3 class="font-medium text-gray-900 mb-1">Manage Members</h3>
                <p class="text-sm text-gray-600 mb-3">View and manage branch members</p>
                <a href="<?php echo url('branch/members'); ?>" class="text-blue-600 text-sm font-medium hover:text-blue-700">
                    View Members →
                </a>
            </div>
                        <i class="fas fa-check-circle"></i> On track
                    </div>
                </div>
            </div>
        </div>

        <!-- Forum Topics -->
        <div class="stat-card activity-card">
            <div class="stat-content">
                <div class="stat-icon">
                    <i class="fas fa-comments"></i>
                </div>
                <div class="stat-text">
                    <div class="stat-value"><?php echo $stats['forum_topics'] ?? '24'; ?></div>
                    <div class="stat-label">Forum Topics</div>
                    <div class="stat-change positive">
                        <i class="fas fa-plus"></i> 2 new today
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions Section -->
<div class="dashboard-section">
    <div class="section-header">
        <h2>Branch Management</h2>
        <p>Manage your branch operations and community engagement</p>
    </div>

    <div class="quick-actions-grid">
        <!-- Manage Members -->
        <div class="quick-action-card">
            <div class="action-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="action-content">
                <h3>Manage Members</h3>
                <p>View and manage all branch members and their roles</p>
                <div class="action-meta">
                    <span class="item-count"><?php echo $stats['branch_members'] ?? '156'; ?> members</span>
                </div>
            </div>
            <a href="<?php echo url('branch/members'); ?>" class="action-button primary">
                <i class="fas fa-users"></i>
                View Members
            </a>
        </div>

        <!-- Branch Elections -->
        <div class="quick-action-card">
            <div class="action-icon">
                <i class="fas fa-vote-yea"></i>
            </div>
            <div class="action-content">
                <h3>Branch Elections</h3>
                <p>Organize and manage elections within your branch</p>
                <div class="action-meta">
                    <span class="event-count"><?php echo $stats['active_elections'] ?? '1'; ?> active</span>
                </div>
            </div>
            <a href="<?php echo url('branch/elections'); ?>" class="action-button secondary">
                <i class="fas fa-vote-yea"></i>
                Manage Elections
            </a>
        </div>

        <!-- Projects -->
        <div class="quick-action-card">
            <div class="action-icon">
                <i class="fas fa-project-diagram"></i>
            </div>
            <div class="action-content">
                <h3>Branch Projects</h3>
                <p>Monitor and manage ongoing branch projects</p>
                <div class="action-meta">
                    <span class="item-count"><?php echo $stats['active_projects'] ?? '3'; ?> active</span>
                </div>
            </div>
            <a href="<?php echo url('branch/projects'); ?>" class="action-button info">
                <i class="fas fa-project-diagram"></i>
                View Projects
            </a>
        </div>

        <!-- Forum Management -->
        <div class="quick-action-card featured">
            <div class="action-icon">
                <i class="fas fa-comments"></i>
            </div>
            <div class="action-content">
                <h3>Forum Management</h3>
                <p>Moderate discussions and manage forum topics</p>
                <div class="action-meta">
                    <span class="item-count"><?php echo $stats['forum_topics'] ?? '24'; ?> topics</span>
                </div>
            </div>
            <a href="<?php echo url('branch/forum'); ?>" class="action-button accent">
                <i class="fas fa-comments"></i>
                Manage Forum
            </a>
        </div>
    </div>
</div>

<!-- Content Tabs -->
<div class="dashboard-section">
    <div class="content-tabs">
        <div class="tabs-header">
            <button class="tab-button active" data-tab="activities">Recent Activities</button>
            <button class="tab-button" data-tab="announcements">Announcements</button>
            <button class="tab-button" data-tab="reports">Reports</button>
        </div>

        <div class="tabs-content">
            <!-- Recent Activities Tab -->
            <div class="tab-pane active" id="activities">
                <div class="activity-feed">
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-text">
                                <strong>Sarah Johnson</strong> joined the branch
                                <span class="activity-target">Computer Science Dept</span>
                            </div>
                            <div class="activity-time">1 hour ago</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-vote-yea"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-text">
                                <strong>Election</strong> voting started for Welfare Secretary
                                <span class="activity-target">Branch Election</span>
                            </div>
                            <div class="activity-time">3 hours ago</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-project-diagram"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-text">
                                <strong>Project</strong> "Campus Clean-up" milestone completed
                                <span class="activity-target">Community Service</span>
                            </div>
                            <div class="activity-time">1 day ago</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-text">
                                <strong>New topic</strong> "Exam Preparation Tips" posted
                                <span class="activity-target">Academic Forum</span>
                            </div>
                            <div class="activity-time">2 days ago</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Announcements Tab -->
            <div class="tab-pane" id="announcements">
                <div class="announcements-list">
                    <div class="announcement-card normal">
                        <div class="announcement-header">
                            <div class="announcement-icon">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="announcement-meta">
                                <span class="announcement-priority normal">Normal</span>
                                <span class="announcement-date">March 10, 2026</span>
                            </div>
                        </div>
                        <div class="announcement-content">
                            <h4>Branch Meeting This Friday</h4>
                            <p>Don't forget our monthly branch meeting this Friday at 4 PM in the main hall. We'll discuss upcoming projects and election preparations.</p>
                        </div>
                        <div class="announcement-actions">
                            <a href="#" class="announcement-link">Read More</a>
                        </div>
                    </div>

                    <div class="announcement-card important">
                        <div class="announcement-header">
                            <div class="announcement-icon">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="announcement-meta">
                                <span class="announcement-priority important">Important</span>
                                <span class="announcement-date">March 8, 2026</span>
                            </div>
                        </div>
                        <div class="announcement-content">
                            <h4>Election Deadline Extended</h4>
                            <p>The deadline for Welfare Secretary election nominations has been extended to March 15th due to popular demand.</p>
                        </div>
                        <div class="announcement-actions">
                            <a href="#" class="announcement-link">Read More</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reports Tab -->
            <div class="tab-pane" id="reports">
                <div class="charts-grid">
                    <div class="chart-card">
                        <div class="chart-header">
                            <h4>Member Growth</h4>
                            <span class="chart-period">This year</span>
                        </div>
                        <div class="chart-container">
                            <canvas id="memberGrowthChart"></canvas>
                        </div>
                    </div>

                    <div class="chart-card">
                        <div class="chart-header">
                            <h4>Project Completion</h4>
                            <span class="chart-period">Last 6 months</span>
                        </div>
                        <div class="chart-container">
                            <canvas id="projectCompletionChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <div class="quick-access-icon">
            <i class="fas fa-project-diagram"></i>
        </div>
        <h5>Branch Projects</h5>
        <p>Oversee and coordinate branch projects and initiatives</p>
        <a href="<?php echo url('branch/projects'); ?>" class="btn btn-info">
            <i class="fas fa-project-diagram me-2"></i>View Projects
        </a>
    </div>

    <div class="quick-access-card">
        <div class="quick-access-icon">
            <i class="fas fa-chart-line"></i>
        </div>
        <h5>Reports & Analytics</h5>
        <p>View detailed reports and analytics for your branch</p>
        <a href="<?php echo url('branch/reports'); ?>" class="btn btn-warning">
            <i class="fas fa-chart-line me-2"></i>View Reports
        </a>
    </div>
</div>

<!-- Branch Activities -->
<div class="dashboard-card">
    <div class="card-header">
        <h5 class="card-title">
            <i class="fas fa-history me-2"></i>Recent Branch Activities
        </h5>
    </div>
    <div class="card-body">
        <div class="activity-list">
            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <div class="activity-content">
                    <p class="activity-text">
                        <strong>Sarah Johnson</strong> joined the branch
                        <span class="activity-target">Student, Computer Science</span>
                    </p>
                    <small class="activity-time">1 hour ago</small>
                </div>
            </div>

            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-vote-yea"></i>
                </div>
                <div class="activity-content">
                    <p class="activity-text">
                        <strong>Election</strong> for Branch Secretary started
                        <span class="activity-target">3 candidates, 45 voters</span>
                    </p>
                    <small class="activity-time">3 hours ago</small>
                </div>
            </div>

            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <div class="activity-content">
                    <p class="activity-text">
                        <strong>Project Update</strong> submitted for "Community Outreach"
                        <span class="activity-target">Milestone: 75% complete</span>
                    </p>
                    <small class="activity-time">5 hours ago</small>
                </div>
            </div>

            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-comments"></i>
                </div>
                <div class="activity-content">
                    <p class="activity-text">
                        <strong>New topic</strong> "Career Development Workshop"
                        <span class="activity-target">Started by Michael Ade</span>
                    </p>
                    <small class="activity-time">1 day ago</small>
                </div>
            </div>
        </div>
    </div>
</div>
                            </div>

                            <div class="activity-item">
                                <div class="activity-icon">
                                    <i class="fas fa-vote-yea"></i>
                                </div>
                                <div class="activity-content">
                                    <p class="activity-text">
                                        <strong>Election</strong> "Branch Secretary" is now open for voting
                                        <span class="activity-target">Ends in 5 days</span>
                                    </p>
                                    <small class="activity-time">3 hours ago</small>
                                </div>
                            </div>

                            <div class="activity-item">
                                <div class="activity-icon">
                                    <i class="fas fa-project-diagram"></i>
                                </div>
                                <div class="activity-content">
                                    <p class="activity-text">
                                        <strong>Project Update</strong> "Community Library" reached 75% completion
                                        <span class="activity-target">Funded by donations</span>
                                    </p>
                                    <small class="activity-time">1 day ago</small>
                                </div>
                            </div>

                            <div class="activity-item">
                                <div class="activity-icon">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                <div class="activity-content">
                                    <p class="activity-text">
                                        <strong>Academy</strong> New CBT practice session available
                                        <span class="activity-target">JAMB Mathematics</span>
                                    </p>
                                    <small class="activity-time">2 days ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Member Management -->
                <div class="dashboard-card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-users-cog me-2"></i>Member Management
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Joined</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="<?php echo asset('images/default-avatar.png'); ?>" class="rounded-circle me-2" width="32" height="32" alt="Avatar">
                                            <div>
                                                <div class="fw-bold">Michael Adebayo</div>
                                                <small class="text-muted">Computer Science</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>Jan 15, 2024</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary me-1">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-warning">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="<?php echo asset('images/default-avatar.png'); ?>" class="rounded-circle me-2" width="32" height="32" alt="Avatar">
                                            <div>
                                                <div class="fw-bold">Grace Okafor</div>
                                                <small class="text-muted">Business Admin</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td>Feb 20, 2024</td>
                                    <td>
                                        <button class="btn btn-sm btn-success me-1">
                                            <i class="fas fa-check"></i> Approve
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Quick Actions -->
                <div class="dashboard-card mb-4">
                    <div class="card-header">
                        <h5 class="card-title">
                            <i class="fas fa-bolt me-2"></i>Quick Actions
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="<?php echo url('branch/members'); ?>" class="btn btn-outline-primary">
                                <i class="fas fa-users me-2"></i>Manage Members
                            </a>
                            <a href="<?php echo url('branch/elections/create'); ?>" class="btn btn-outline-success">
                                <i class="fas fa-plus-circle me-2"></i>Create Election
                            </a>
                            <a href="<?php echo url('branch/projects'); ?>" class="btn btn-outline-info">
                                <i class="fas fa-project-diagram me-2"></i>Branch Projects
                            </a>
                            <a href="<?php echo url('branch/announcements/create'); ?>" class="btn btn-outline-warning">
                                <i class="fas fa-bullhorn me-2"></i>Send Announcement
                            </a>
                            <a href="<?php echo url('branch/reports'); ?>" class="btn btn-outline-secondary">
                                <i class="fas fa-chart-bar me-2"></i>Branch Reports
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Branch Performance -->
                <div class="dashboard-card mb-4">
                    <div class="card-header">
                        <h5 class="card-title">
                            <i class="fas fa-chart-line me-2"></i>Branch Performance
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="progress-item mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Member Engagement</span>
                                <span class="fw-bold text-success">85%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-success" style="width: 85%"></div>
                            </div>
                        </div>

                        <div class="progress-item mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Election Participation</span>
                                <span class="fw-bold text-primary">72%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-primary" style="width: 72%"></div>
                            </div>
                        </div>

                        <div class="progress-item mb-0">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Project Completion</span>
                                <span class="fw-bold text-info">90%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-info" style="width: 90%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Events -->
                <div class="dashboard-card">
                    <div class="card-header">
                        <h5 class="card-title">
                            <i class="fas fa-calendar-alt me-2"></i>Upcoming Events
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="event-card mb-3">
                            <div class="event-icon">
                                <i class="fas fa-vote-yea text-primary"></i>
                            </div>
                            <div class="event-content">
                                <h6>Branch Election</h6>
                                <p>Branch Secretary position</p>
                                <div class="event-meta">
                                    <small><i class="fas fa-calendar me-1"></i>March 25, 2024</small>
                                </div>
                            </div>
                        </div>

                        <div class="event-card mb-3">
                            <div class="event-icon">
                                <i class="fas fa-graduation-cap text-success"></i>
                            </div>
                            <div class="event-content">
                                <h6>JAMB Prep Workshop</h6>
                                <p>Mathematics and English</p>
                                <div class="event-meta">
                                    <small><i class="fas fa-calendar me-1"></i>March 28, 2024</small>
                                </div>
                            </div>
                        </div>

                        <div class="event-card mb-0">
                            <div class="event-icon">
                                <i class="fas fa-project-diagram text-info"></i>
                            </div>
                            <div class="event-content">
                                <h6>Project Meeting</h6>
                                <p>Community Library project</p>
                                <div class="event-meta">
                                    <small><i class="fas fa-calendar me-1"></i>April 2, 2024</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>