<!-- Dashboard Content - TailAdmin Style -->
<div class="dashboard-content">
    <!-- Page Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Welcome back, <?php echo htmlspecialchars($user->first_name ?? 'Member'); ?>!</h1>
        <p class="text-gray-600">Here's your personalized dashboard overview</p>
    </div>

    <!-- Stats Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Active Members -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Active Members</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo number_format($stats['total_members'] ?? 4892); ?></p>
                    <div class="flex items-center mt-2">
                        <span class="text-green-600 text-sm font-medium flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i> +<?php echo $stats['new_members'] ?? 187; ?> this month
                        </span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center">
                    <i class="fas fa-users text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Academy Progress -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Questions Answered</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo number_format($stats['questions_answered'] ?? 1800); ?>K</p>
                    <div class="flex items-center mt-2">
                        <span class="text-green-600 text-sm font-medium flex items-center">
                            <i class="fas fa-chart-line mr-1"></i> <?php echo $stats['mastery_rate'] ?? 67; ?>% mastery
                        </span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-green-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Funds Raised -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Funds Raised (YTD)</p>
                    <p class="text-2xl font-bold text-gray-900">₦<?php echo number_format(($stats['funds_raised'] ?? 18400000) / 1000000); ?>M</p>
                    <div class="flex items-center mt-2">
                        <span class="text-green-600 text-sm font-medium flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i> +15.3%
                        </span>
                        <span class="text-gray-500 text-sm ml-2">vs last year</span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-red-50 rounded-lg flex items-center justify-center">
                    <i class="fas fa-hand-holding-heart text-red-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Forum Activity -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Forum Posts</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo $stats['forum_posts'] ?? 234; ?></p>
                    <div class="flex items-center mt-2">
                        <span class="text-blue-600 text-sm font-medium flex items-center">
                            <i class="fas fa-plus mr-1"></i> +12 this week
                        </span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-purple-50 rounded-lg flex items-center justify-center">
                    <i class="fas fa-comments text-purple-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Section -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-900">Quick Actions</h2>
                <p class="text-gray-600 mt-1">Access your frequently used features</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Take Academy Test -->
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-200 rounded-lg p-4 hover:shadow-lg hover:shadow-blue-100 transition-all duration-300 cursor-pointer hover:-translate-y-1">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center shadow-sm">
                        <i class="fas fa-graduation-cap text-white"></i>
                    </div>
                    <span class="text-xs font-medium text-blue-700 bg-blue-100 px-2 py-1 rounded-full border border-blue-200"><?php echo $stats['questions_answered'] ?? 1800; ?>K answered</span>
                </div>
                <h3 class="font-medium text-gray-900 mb-1">Take Academy Test</h3>
                <p class="text-sm text-gray-600 mb-3">Continue your learning journey</p>
                <a href="<?php echo url('academy'); ?>" class="text-blue-600 text-sm font-medium hover:text-blue-700 flex items-center">
                    Start Test <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
                        <i class="fas fa-target"></i> <?php echo $stats['target_progress'] ?? 62; ?>% of target
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Projects -->
        <div class="stat-card projects-card">
            <div class="stat-content">
                <div class="stat-icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <div class="stat-text">
                    <div class="stat-value"><?php echo $stats['active_projects'] ?? 14; ?></div>
                    <div class="stat-label">Active Projects</div>
                    <div class="stat-change neutral">
                        <i class="fas fa-coins"></i> ₦<?php echo number_format(($stats['disbursed_amount'] ?? 3200000) / 1000000); ?>M disbursed
                    </div>
                </div>
            </div>
        </div>

        <!-- Election Status -->
        <div class="stat-card election-card">
            <div class="stat-content">
                <div class="stat-icon">
                    <i class="fas fa-vote-yea"></i>
                </div>
                <div class="stat-text">
                    <div class="stat-value"><?php echo $stats['days_to_election'] ?? 42; ?></div>
                    <div class="stat-label">Days to Election</div>
                    <div class="stat-change neutral">
                        <i class="fas fa-calendar-alt"></i> National 2026
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="stat-card activity-card">
            <div class="stat-content">
                <div class="stat-icon">
                    <i class="fas fa-history"></i>
                </div>
                <div class="stat-text">
                    <div class="stat-value"><?php echo $stats['recent_activities'] ?? 5; ?></div>
                    <div class="stat-label">Recent Activities</div>
                    <div class="stat-change positive">
                        <i class="fas fa-clock"></i> Last 24 hours
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</section>

<!-- Quick Actions Section -->
<div class="dashboard-section">
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-900">Quick Actions</h2>
                <p class="text-gray-600 mt-1">Jump into what matters most to you</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Continue Learning -->
            <div class="bg-white border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow cursor-pointer">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-blue-600"></i>
                    </div>
                    <span class="text-xs font-medium text-gray-500 bg-gray-100 px-2 py-1 rounded-full"><?php echo $stats['academy_progress'] ?? 75; ?>% complete</span>
                </div>
                <h3 class="font-medium text-gray-900 mb-1">Continue Learning</h3>
                <p class="text-sm text-gray-600 mb-3">Resume your academy progress</p>
                <a href="<?php echo url('academy'); ?>" class="text-blue-600 text-sm font-medium hover:text-blue-700">
                    Resume Practice →
                </a>
            </div>

            <!-- My Portfolio -->
            <div class="bg-white border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow cursor-pointer">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-10 h-10 bg-yellow-50 rounded-lg flex items-center justify-center">
                        <i class="fas fa-star text-yellow-600"></i>
                    </div>
                    <span class="text-xs font-medium text-gray-500 bg-gray-100 px-2 py-1 rounded-full"><?php echo $stats['portfolio_items'] ?? 3; ?> items</span>
                </div>
                <h3 class="font-medium text-gray-900 mb-1">My Portfolio</h3>
                <p class="text-sm text-gray-600 mb-3">Showcase your achievements</p>
                <a href="<?php echo url('portfolio'); ?>" class="text-yellow-600 text-sm font-medium hover:text-yellow-700">
                    View Profile →
                </a>
            </div>

            <!-- Support a Project -->
            <div class="bg-white border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow cursor-pointer border-green-200 bg-green-50">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center">
                        <i class="fas fa-hand-holding-heart text-green-600"></i>
                    </div>
                    <span class="text-xs font-medium text-gray-500 bg-gray-100 px-2 py-1 rounded-full"><?php echo $stats['project_progress'] ?? 25; ?>% funded</span>
                </div>
                <h3 class="font-medium text-gray-900 mb-1"><?php echo $stats['featured_project'] ?? 'Unijos Borehole Project'; ?></h3>
                <p class="text-sm text-gray-600 mb-3">Help provide clean water</p>
                <a href="<?php echo url('projects/support/' . ($stats['featured_project_id'] ?? '1')); ?>" class="text-green-600 text-sm font-medium hover:text-green-700">
                    Donate Now →
                </a>
            </div>

            <!-- Upcoming Events -->
            <div class="bg-white border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow cursor-pointer">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-10 h-10 bg-purple-50 rounded-lg flex items-center justify-center">
                        <i class="fas fa-calendar-alt text-purple-600"></i>
                    </div>
                    <span class="text-xs font-medium text-gray-500 bg-gray-100 px-2 py-1 rounded-full"><?php echo count($stats['upcoming_events'] ?? []); ?> events</span>
                </div>
                <h3 class="font-medium text-gray-900 mb-1">Upcoming Events</h3>
                <p class="text-sm text-gray-600 mb-3">Don't miss important dates</p>
                <a href="<?php echo url('events'); ?>" class="text-purple-600 text-sm font-medium hover:text-purple-700">
                    View Events →
                </a>
            </div>

            <!-- Cast Your Vote -->
            <div class="bg-white border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow cursor-pointer">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-10 h-10 bg-red-50 rounded-lg flex items-center justify-center">
                        <i class="fas fa-vote-yea text-red-600"></i>
                    </div>
                    <span class="text-xs font-medium text-gray-500 bg-gray-100 px-2 py-1 rounded-full"><?php echo $stats['days_to_election'] ?? 42; ?> days left</span>
                </div>
                <h3 class="font-medium text-gray-900 mb-1">Cast Your Vote</h3>
                <p class="text-sm text-gray-600 mb-3">Participate in elections</p>
                <a href="<?php echo url('elections'); ?>" class="text-red-600 text-sm font-medium hover:text-red-700">
                    Vote Now →
                </a>
            </div>

            <!-- Forum Activity -->
            <div class="bg-white border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow cursor-pointer">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-10 h-10 bg-indigo-50 rounded-lg flex items-center justify-center">
                        <i class="fas fa-comments text-indigo-600"></i>
                    </div>
                    <span class="text-xs font-medium text-gray-500 bg-gray-100 px-2 py-1 rounded-full">Active discussions</span>
                </div>
                <h3 class="font-medium text-gray-900 mb-1">Forum & Community</h3>
                <p class="text-sm text-gray-600 mb-3">Join community discussions</p>
                <a href="<?php echo url('forum'); ?>" class="text-indigo-600 text-sm font-medium hover:text-indigo-700">
                    Join Discussion →
                </a>
            </div>
        </div>
    </div>
</div>
            <div class="action-content">
                <h3>Cast Your Vote</h3>
                <p>Make your voice heard in ongoing elections</p>
                <div class="action-meta">
                    <span class="election-status"><?php echo $stats['active_elections'] ?? 1; ?> active election<?php echo ($stats['active_elections'] ?? 1) > 1 ? 's' : ''; ?></span>
                    <span class="voting-deadline"><?php echo $stats['voting_deadline'] ?? 'Ends in 3 days'; ?></span>
                </div>
            </div>
            <a href="<?php echo url('elections/vote'); ?>" class="action-button warning">
                <i class="fas fa-check-circle"></i>
                Vote Now
            </a>
        </div>
    </div>
</section>

<!-- Main Content Tabs -->
<section class="dashboard-section">
    <div class="content-tabs">
        <div class="tabs-header">
            <button class="tab-button active" data-tab="announcements">Announcements</button>
            <button class="tab-button" data-tab="activity">My Activity</button>
            <button class="tab-button" data-tab="leaderboard">Leaderboard</button>
            <button class="tab-button" data-tab="charts">Analytics</button>
        </div>

        <div class="tabs-content">
            <!-- Announcements Tab -->
            <div class="tab-pane active" id="announcements-tab">
                <div class="announcements-list">
                    <?php foreach ($stats['announcements'] ?? [] as $announcement): ?>
                    <div class="announcement-card <?php echo $announcement['priority'] ?? 'normal'; ?>">
                        <div class="announcement-header">
                            <div class="announcement-icon">
                                <i class="fas fa-<?php echo $announcement['icon'] ?? 'bullhorn'; ?>"></i>
                            </div>
                            <div class="announcement-meta">
                                <span class="announcement-priority <?php echo $announcement['priority'] ?? 'normal'; ?>">
                                    <?php echo ucfirst($announcement['priority'] ?? 'normal'); ?>
                                </span>
                                <span class="announcement-date"><?php echo $announcement['date'] ?? '2 hours ago'; ?></span>
                            </div>
                        </div>
                        <div class="announcement-content">
                            <h4><?php echo $announcement['title'] ?? 'New Academy Module Available'; ?></h4>
                            <p><?php echo $announcement['content'] ?? 'We\'ve added new practice questions for JAMB preparation.'; ?></p>
                        </div>
                        <div class="announcement-actions">
                            <a href="<?php echo $announcement['link'] ?? '#'; ?>" class="announcement-link">Read More</a>
                        </div>
                    </div>
                    <?php endforeach; ?>

                    <!-- Default announcements if none from data -->
                    <?php if (empty($stats['announcements'])): ?>
                    <div class="announcement-card important">
                        <div class="announcement-header">
                            <div class="announcement-icon">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="announcement-meta">
                                <span class="announcement-priority important">Important</span>
                                <span class="announcement-date">1 hour ago</span>
                            </div>
                        </div>
                        <div class="announcement-content">
                            <h4>Election Period Begins</h4>
                            <p>The nomination period for branch executives has officially started. Submit your candidacy by March 25th.</p>
                        </div>
                        <div class="announcement-actions">
                            <a href="<?php echo url('elections'); ?>" class="announcement-link">Learn More</a>
                        </div>
                    </div>

                    <div class="announcement-card normal">
                        <div class="announcement-header">
                            <div class="announcement-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="announcement-meta">
                                <span class="announcement-priority normal">Normal</span>
                                <span class="announcement-date">3 hours ago</span>
                            </div>
                        </div>
                        <div class="announcement-content">
                            <h4>New Academy Content Available</h4>
                            <p>We've added advanced mathematics modules and practice tests for 2026 JAMB candidates.</p>
                        </div>
                        <div class="announcement-actions">
                            <a href="<?php echo url('academy'); ?>" class="announcement-link">Start Learning</a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Activity Feed Tab -->
            <div class="tab-pane" id="activity-tab">
                <div class="activity-feed">
                    <?php foreach ($stats['recent_activities'] ?? [] as $activity): ?>
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-<?php echo $activity['icon'] ?? 'circle'; ?>"></i>
                        </div>
                        <div class="activity-content">
                            <p class="activity-text">
                                <strong><?php echo $activity['action'] ?? 'Activity performed'; ?></strong>
                                <span class="activity-target"><?php echo $activity['target'] ?? ''; ?></span>
                            </p>
                            <small class="activity-time"><?php echo $activity['time'] ?? 'Recently'; ?></small>
                        </div>
                    </div>
                    <?php endforeach; ?>

                    <!-- Default activities -->
                    <?php if (empty($stats['recent_activities'])): ?>
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="activity-content">
                            <p class="activity-text">
                                <strong>Completed JAMB Mathematics Practice</strong>
                                <span class="activity-target">Scored 85% - Great job!</span>
                            </p>
                            <small class="activity-time">2 hours ago</small>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-vote-yea"></i>
                        </div>
                        <div class="activity-content">
                            <p class="activity-text">
                                <strong>Voted in Branch Secretary Election</strong>
                                <span class="activity-target">Your vote has been recorded securely</span>
                            </p>
                            <small class="activity-time">1 day ago</small>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <div class="activity-content">
                            <p class="activity-text">
                                <strong>Posted in Forum Discussion</strong>
                                <span class="activity-target">"Career Opportunities in Tech" topic</span>
                            </p>
                            <small class="activity-time">2 days ago</small>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Leaderboard Tab -->
            <div class="tab-pane" id="leaderboard-tab">
                <div class="leaderboard-section">
                    <div class="leaderboard-header">
                        <h3>Top Performers</h3>
                        <div class="leaderboard-filters">
                            <button class="filter-btn active" data-filter="academy">Academy</button>
                            <button class="filter-btn" data-filter="pageant">Pageant</button>
                            <button class="filter-btn" data-filter="overall">Overall</button>
                        </div>
                    </div>

                    <div class="leaderboard-list">
                        <?php
                        $leaderboard = $stats['leaderboard'] ?? [
                            ['rank' => 1, 'name' => 'Adebayo Johnson', 'points' => 1250, 'badge' => 'gold'],
                            ['rank' => 2, 'name' => 'Grace Okafor', 'points' => 1180, 'badge' => 'silver'],
                            ['rank' => 3, 'name' => 'You', 'points' => 1050, 'badge' => 'bronze', 'is_user' => true],
                            ['rank' => 4, 'name' => 'Emmanuel Nwosu', 'points' => 980, 'badge' => ''],
                            ['rank' => 5, 'name' => 'Fatima Ibrahim', 'points' => 920, 'badge' => '']
                        ];
                        ?>

                        <?php foreach ($leaderboard as $entry): ?>
                        <div class="leaderboard-item <?php echo $entry['is_user'] ?? false ? 'current-user' : ''; ?>">
                            <div class="leaderboard-rank">
                                <?php if ($entry['badge']): ?>
                                    <i class="fas fa-medal medal-<?php echo $entry['badge']; ?>"></i>
                                <?php else: ?>
                                    <span class="rank-number"><?php echo $entry['rank']; ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="leaderboard-info">
                                <div class="leaderboard-name"><?php echo $entry['name']; ?></div>
                                <small class="leaderboard-points"><?php echo number_format($entry['points']); ?> points</small>
                            </div>
                            <?php if ($entry['is_user'] ?? false): ?>
                            <div class="user-indicator">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="leaderboard-actions">
                        <a href="<?php echo url('academy/leaderboard'); ?>" class="btn btn-outline-primary">
                            <i class="fas fa-list"></i> View Full Leaderboard
                        </a>
                    </div>
                </div>
            </div>

            <!-- Analytics Tab -->
            <div class="tab-pane" id="charts-tab">
                <div class="charts-grid">
                    <!-- Membership Growth Chart -->
                    <div class="chart-card">
                        <div class="chart-header">
                            <h4>Membership Growth</h4>
                            <span class="chart-period">Last 6 months</span>
                        </div>
                        <div class="chart-container">
                            <canvas id="membershipChart" width="400" height="200"></canvas>
                        </div>
                    </div>

                    <!-- Donation Trends Chart -->
                    <div class="chart-card">
                        <div class="chart-header">
                            <h4>Donation Trends</h4>
                            <span class="chart-period">Monthly</span>
                        </div>
                        <div class="chart-container">
                            <canvas id="donationChart" width="400" height="200"></canvas>
                        </div>
                    </div>

                    <!-- Academy Performance Chart -->
                    <div class="chart-card">
                        <div class="chart-header">
                            <h4>Academy Subject Performance</h4>
                            <span class="chart-period">Your progress</span>
                        </div>
                        <div class="chart-container">
                            <canvas id="academyChart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
