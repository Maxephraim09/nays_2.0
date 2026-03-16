<!-- Dashboard Content - TailAdmin Style -->
<div class="dashboard-content">
    <!-- Page Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Alumni Network</h1>
        <p class="text-gray-600">Manage alumni connections, mentorship, and career services</p>
    </div>

    <!-- Stats Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Alumni -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Alumni</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo number_format($stats['total_alumni'] ?? 1250); ?></p>
                    <div class="flex items-center mt-2">
                        <span class="text-green-600 text-sm font-medium flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i> +12.5%
                        </span>
                        <span class="text-gray-500 text-sm ml-2">vs last year</span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Active Mentors -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Active Mentors</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo $stats['active_mentors'] ?? 89; ?></p>
                    <div class="flex items-center mt-2">
                        <span class="text-green-600 text-sm font-medium flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i> +5 this month
                        </span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center">
                    <i class="fas fa-user-friends text-green-600 text-xl"></i>
                </div>
            </div>
        </div>
                <div class="stat-text">
                    <div class="stat-value"><?php echo $stats['active_mentors'] ?? 45; ?></div>
                    <div class="stat-label">Active Mentors</div>
                    <div class="stat-change positive">
                        <i class="fas fa-arrow-up"></i> +8.3%
                    </div>
                </div>
            </div>
        </div>

        <!-- Job Postings -->
        <div class="stat-card activity-card">
            <div class="stat-content">
                <div class="stat-icon">
                    <i class="fas fa-briefcase"></i>
                </div>
                <div class="stat-value"><?php echo $stats['job_postings'] ?? 23; ?></div>
                <div class="stat-label">Job Postings</div>
                <div class="stat-change positive">
                    <i class="fas fa-plus"></i> 3 new this week
                </div>
            </div>
        </div>

        <!-- Upcoming Events -->
        <div class="stat-card election-card">
            <div class="stat-content">
                <div class="stat-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="stat-value"><?php echo $stats['upcoming_events'] ?? 5; ?></div>
                <div class="stat-label">Upcoming Events</div>
                <div class="stat-change neutral">
                    <i class="fas fa-calendar-check"></i> Next in 2 days
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions Section -->
<div class="dashboard-section">
    <div class="section-header">
        <h2>Alumni Network</h2>
        <p>Connect alumni with current students and manage mentorship programs</p>
    </div>

    <div class="quick-actions-grid">
        <!-- Alumni Directory -->
        <div class="quick-action-card">
            <div class="action-icon">
                <i class="fas fa-address-book"></i>
            </div>
            <div class="action-content">
                <h3>Alumni Directory</h3>
                <p>Manage and update the alumni database</p>
                <div class="action-meta">
                    <span class="item-count"><?php echo number_format($stats['total_alumni'] ?? 1250); ?> alumni</span>
                </div>
            </div>
            <a href="<?php echo url('alumni/directory'); ?>" class="action-button primary">
                <i class="fas fa-address-book"></i>
                View Directory
            </a>
        </div>

        <!-- Mentorship Program -->
        <div class="quick-action-card">
            <div class="action-icon">
                <i class="fas fa-user-friends"></i>
            </div>
            <div class="action-content">
                <h3>Mentorship Program</h3>
                <p>Manage mentor-mentee pairings and programs</p>
                <div class="action-meta">
                    <span class="item-count"><?php echo $stats['active_mentors'] ?? 45; ?> active mentors</span>
                </div>
            </div>
            <a href="<?php echo url('alumni/mentorship'); ?>" class="action-button secondary">
                <i class="fas fa-user-friends"></i>
                Manage Program
            </a>
        </div>

        <!-- Job Board -->
        <div class="quick-action-card">
            <div class="action-icon">
                <i class="fas fa-briefcase"></i>
            </div>
            <div class="action-content">
                <h3>Job Board</h3>
                <p>Post and manage job opportunities for alumni</p>
                <div class="action-meta">
                    <span class="item-count"><?php echo $stats['job_postings'] ?? 23; ?> active postings</span>
                </div>
            </div>
            <a href="<?php echo url('alumni/jobs'); ?>" class="action-button info">
                <i class="fas fa-briefcase"></i>
                Manage Jobs
            </a>
        </div>

        <!-- Events Management -->
        <div class="quick-action-card featured">
            <div class="action-icon">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="action-content">
                <h3>Events Management</h3>
                <p>Organize alumni reunions and networking events</p>
                <div class="action-meta">
                    <span class="next-event"><?php echo $stats['upcoming_events'] ?? 5; ?> upcoming</span>
                </div>
            </div>
            <a href="<?php echo url('alumni/events'); ?>" class="action-button accent">
                <i class="fas fa-calendar-alt"></i>
                Manage Events
            </a>
        </div>
    </div>
</div>

<!-- Content Tabs -->
<div class="dashboard-section">
    <div class="content-tabs">
        <div class="tabs-header">
            <button class="tab-button active" data-tab="network">Network Activity</button>
            <button class="tab-button" data-tab="success">Success Stories</button>
            <button class="tab-button" data-tab="analytics">Engagement Analytics</button>
        </div>

        <div class="tabs-content">
            <!-- Network Activity Tab -->
            <div class="tab-pane active" id="network">
                <div class="activity-feed">
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-text">
                                <strong>Dr. Sarah Adebayo</strong> joined the alumni network
                                <span class="activity-target">Class of 2015</span>
                            </div>
                            <div class="activity-time">1 hour ago</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-text">
                                <strong>New job posting</strong> "Software Engineer at Google" added
                                <span class="activity-target">Tech Industry</span>
                            </div>
                            <div class="activity-time">3 hours ago</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-text">
                                <strong>Mentor pairing</strong> completed between Ahmed and Fatima
                                <span class="activity-target">Computer Science</span>
                            </div>
                            <div class="activity-time">1 day ago</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-text">
                                <strong>Alumni reunion</strong> event scheduled for June 2026
                                <span class="activity-target">Class of 2020</span>
                            </div>
                            <div class="activity-time">2 days ago</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Success Stories Tab -->
            <div class="tab-pane" id="success">
                <div class="announcements-list">
                    <div class="announcement-card normal">
                        <div class="announcement-header">
                            <div class="announcement-icon">
                                <i class="fas fa-trophy"></i>
                            </div>
                            <div class="announcement-meta">
                                <span class="announcement-priority normal">Success Story</span>
                                <span class="announcement-date">March 5, 2026</span>
                            </div>
                        </div>
                        <div class="announcement-content">
                            <h4>From NAYS to CEO: Adebayo's Journey</h4>
                            <p>Former NAYS president now leads a Fortune 500 company. Read about his inspiring journey from student leadership to corporate success.</p>
                        </div>
                        <div class="announcement-actions">
                            <a href="#" class="announcement-link">Read Full Story</a>
                        </div>
                    </div>

                    <div class="announcement-card normal">
                        <div class="announcement-header">
                            <div class="announcement-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="announcement-meta">
                                <span class="announcement-priority normal">Achievement</span>
                                <span class="announcement-date">February 28, 2026</span>
                            </div>
                        </div>
                        <div class="announcement-content">
                            <h4>NAYS Alumna Wins International Award</h4>
                            <p>Dr. Amara Okafor receives the Young Scientist Award for her groundbreaking research in renewable energy.</p>
                        </div>
                        <div class="announcement-actions">
                            <a href="#" class="announcement-link">Read More</a>
                        </div>
                    </div>

                    <div class="announcement-card normal">
                        <div class="announcement-header">
                            <div class="announcement-icon">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <div class="announcement-meta">
                                <span class="announcement-priority normal">Career Update</span>
                                <span class="announcement-date">February 20, 2026</span>
                            </div>
                        </div>
                        <div class="announcement-content">
                            <h4>NAYS Alumni Leading Innovation</h4>
                            <p>Three NAYS alumni have founded successful startups in the tech sector, creating over 200 jobs in Nigeria.</p>
                        </div>
                        <div class="announcement-actions">
                            <a href="#" class="announcement-link">Read More</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Engagement Analytics Tab -->
            <div class="tab-pane" id="analytics">
                <div class="charts-grid">
                    <div class="chart-card">
                        <div class="chart-header">
                            <h4>Alumni Engagement</h4>
                            <span class="chart-period">Last 6 months</span>
                        </div>
                        <div class="chart-container">
                            <canvas id="engagementChart"></canvas>
                        </div>
                    </div>

                    <div class="chart-card">
                        <div class="chart-header">
                            <h4>Mentorship Connections</h4>
                            <span class="chart-period">This year</span>
                        </div>
                        <div class="chart-container">
                            <canvas id="mentorshipChart"></canvas>
                        </div>
                    </div>

                    <div class="chart-card">
                        <div class="chart-header">
                            <h4>Job Postings Trend</h4>
                            <span class="chart-period">Last 12 months</span>
                        </div>
                        <div class="chart-container">
                            <canvas id="jobPostingsChart"></canvas>
                        </div>
                    </div>

                    <div class="chart-card">
                        <div class="chart-header">
                            <h4>Event Attendance</h4>
                            <span class="chart-period">Last 6 months</span>
                        </div>
                        <div class="chart-container">
                            <canvas id="eventAttendanceChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <p>Manage and update the alumni database</p>
        <a href="<?php echo url('alumni/directory'); ?>" class="btn btn-primary">
            <i class="fas fa-address-book me-2"></i>View Directory
        </a>
    </div>

    <div class="quick-access-card">
        <div class="quick-access-icon">
            <i class="fas fa-briefcase"></i>
        </div>
        <h5>Job Postings</h5>
        <p>Post and manage job opportunities for alumni</p>
        <a href="<?php echo url('alumni/jobs'); ?>" class="btn btn-success">
            <i class="fas fa-briefcase me-2"></i>Manage Jobs
        </a>
    </div>

    <div class="quick-access-card">
        <div class="quick-access-icon">
            <i class="fas fa-user-friends"></i>
        </div>
        <h5>Mentorship Program</h5>
        <p>Facilitate connections between alumni and students</p>
        <a href="<?php echo url('alumni/mentorship'); ?>" class="btn btn-info">
            <i class="fas fa-user-friends me-2"></i>Manage Mentorship
        </a>
    </div>

    <div class="quick-access-card">
        <div class="quick-access-icon">
            <i class="fas fa-calendar-alt"></i>
        </div>
        <h5>Alumni Events</h5>
        <p>Organize and manage alumni networking events</p>
        <a href="<?php echo url('alumni/events'); ?>" class="btn btn-warning">
            <i class="fas fa-calendar-alt me-2"></i>Manage Events
        </a>
    </div>
</div>

<!-- Recent Alumni Activities -->
<div class="dashboard-card">
    <div class="card-header">
        <h5 class="card-title">
            <i class="fas fa-history me-2"></i>Recent Alumni Activities
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
                        <strong>Dr. Adebayo</strong> joined as a mentor
                        <span class="activity-target">Software Engineer at Google</span>
                    </p>
                    <small class="activity-time">3 hours ago</small>
                </div>
            </div>

            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-briefcase"></i>
                </div>
                <div class="activity-content">
                    <p class="activity-text">
                        <strong>New job posting</strong> from TechCorp
                        <span class="activity-target">Senior Developer position</span>
                    </p>
                    <small class="activity-time">1 day ago</small>
                </div>
            </div>

            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="activity-content">
                    <p class="activity-text">
                        <strong>Alumni reunion</strong> scheduled
                        <span class="activity-target">Class of 2018 - Lagos Branch</span>
                    </p>
                    <small class="activity-time">2 days ago</small>
                </div>
            </div>

            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-user-friends"></i>
                </div>
                <div class="activity-content">
                    <p class="activity-text">
                        <strong>Mentorship match</strong> completed
                        <span class="activity-target">Sarah Johnson ↔ Michael Ade</span>
                    </p>
                    <small class="activity-time">3 days ago</small>
                </div>
            </div>
        </div>
    </div>
</div>