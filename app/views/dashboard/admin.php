<!-- DASHBOARD CONTENT -->
<div class="dashboard-content">
    <!-- Page Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Dashboard Overview</h1>
        <p class="text-gray-600">Welcome back! Here's what's happening with your system today.</p>
    </div>

    <!-- Welcome Banner -->
    <div class="welcome-banner">
        <div class="welcome-text">
            <h2>Welcome back, Super Admin</h2>
            <p>Here's what's happening with NAYS today</p>
        </div>
        <div class="welcome-stats">
            <div class="stat-item">
                <div class="stat-value">1,247</div>
                <div class="stat-label">Active Members</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">₦2.4M</div>
                <div class="stat-label">Funds Raised</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">23</div>
                <div class="stat-label">Active Projects</div>
            </div>
        </div>
    </div>

    <!-- Stats Cards Grid -->
    <div class="stats-grid">
        <!-- Total Members -->
        <div class="stat-card">
            <div class="stat-header">
                <h3>Total Members</h3>
                <span class="stat-change"><i class="fas fa-arrow-up"></i> +12%</span>
            </div>
            <div class="stat-number">5,247</div>
            <div class="stat-desc">↑ 124 new this month</div>
        </div>

        <!-- Active Projects -->
        <div class="stat-card">
            <div class="stat-header">
                <h3>Active Projects</h3>
                <span class="stat-change"><i class="fas fa-arrow-up"></i> +3</span>
            </div>
            <div class="stat-number">23</div>
            <div class="stat-desc">₦4.2M total funding</div>
        </div>

        <!-- Election Turnout -->
        <div class="stat-card">
            <div class="stat-header">
                <h3>Election Turnout</h3>
                <span class="stat-change negative"><i class="fas fa-arrow-down"></i> -5%</span>
            </div>
            <div class="stat-number">78.6%</div>
            <div class="stat-desc">3,847 votes cast</div>
        </div>

        <!-- Academy Users -->
        <div class="stat-card">
            <div class="stat-header">
                <h3>Academy Users</h3>
                <span class="stat-change"><i class="fas fa-arrow-up"></i> +18%</span>
            </div>
            <div class="stat-number">2,847</div>
            <div class="stat-desc">1,247 exams taken</div>
        </div>
    </div>

    <!-- CHARTS SECTION -->
    <div class="charts-row">
        <!-- Line Chart: Member Growth -->
        <div class="chart-card">
            <div class="chart-header">
                <h3><i class="fas fa-chart-line" style="color:#E9B741; margin-right:8px;"></i> Member Growth (Last 6 months)</h3>
                <span class="badge">+18% vs prev</span>
            </div>
            <div class="chart-container">
                <canvas id="memberGrowthChart"></canvas>
            </div>
        </div>
        <!-- Pie Chart: Project Funding Distribution -->
        <div class="chart-card">
            <div class="chart-header">
                <h3><i class="fas fa-chart-pie" style="color:#1B4D3E; margin-right:8px;"></i> Project Funding by Category</h3>
                <span class="badge">₦4.2M total</span>
            </div>
            <div class="chart-container">
                <canvas id="fundingPieChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Two Column Layout -->
    <div class="two-column">
        <!-- Left Column - Recent Activity -->
        <div class="card">
            <div class="card-header">
                <h3>Recent Activity</h3>
                <span class="badge">Live feed</span>
            </div>
            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <div class="activity-content">
                    <div class="activity-title">New member registered: Adamu John (Tertiary)</div>
                    <div class="activity-time">2 minutes ago</div>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-donate"></i>
                </div>
                <div class="activity-content">
                    <div class="activity-title">Donation received: ₦50,000 for Scholarship Fund</div>
                    <div class="activity-time">15 minutes ago</div>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-vote-yea"></i>
                </div>
                <div class="activity-content">
                    <div class="activity-title">Vote cast in National Election #2026-04</div>
                    <div class="activity-time">1 hour ago</div>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-tasks"></i>
                </div>
                <div class="activity-content">
                    <div class="activity-title">Project update: Computer Lab - 70% complete</div>
                    <div class="activity-time">3 hours ago</div>
                </div>
            </div>
            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="activity-content">
                    <div class="activity-title">Academy: 45 new practice exams completed</div>
                    <div class="activity-time">5 hours ago</div>
                </div>
            </div>
        </div>

        <!-- Right Column - Active Projects -->
        <div class="card">
            <div class="card-header">
                <h3>Active Projects</h3>
                <span class="badge">8 ongoing</span>
            </div>
            <div class="project-item">
                <div class="project-header">
                    <span class="project-name">Unijos Computer Lab</span>
                    <span class="project-amount">₦450K</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width:70%"></div>
                </div>
                <div class="project-stats">
                    <span>70% complete</span>
                    <span>₦315K spent</span>
                </div>
            </div>
            <div class="project-item">
                <div class="project-header">
                    <span class="project-name">ABU Borehole</span>
                    <span class="project-amount">₦280K</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width:45%"></div>
                </div>
                <div class="project-stats">
                    <span>45% complete</span>
                    <span>₦126K spent</span>
                </div>
            </div>
            <div class="project-item">
                <div class="project-header">
                    <span class="project-name">Scholarship Fund</span>
                    <span class="project-amount">₦2M</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width:62%"></div>
                </div>
                <div class="project-stats">
                    <span>62% funded</span>
                    <span>₦1.24M raised</span>
                </div>
            </div>
            <div class="project-item">
                <div class="project-header">
                    <span class="project-name">Yungur Archive</span>
                    <span class="project-amount">₦150K</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width:90%"></div>
                </div>
                <div class="project-stats">
                    <span>90% complete</span>
                    <span>23 recordings</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="card" style="margin-bottom: 0;">
        <div class="card-header">
            <h3>Quick Actions</h3>
            <span class="badge">admin tools</span>
        </div>
        <div class="action-grid">
            <div class="action-btn">
                <i class="fas fa-user-plus"></i>
                <span>Add Member</span>
            </div>
            <div class="action-btn">
                <i class="fas fa-vote-yea"></i>
                <span>New Election</span>
            </div>
            <div class="action-btn">
                <i class="fas fa-project-diagram"></i>
                <span>Create Project</span>
            </div>
            <div class="action-btn">
                <i class="fas fa-bullhorn"></i>
                <span>Announcement</span>
            </div>
            <div class="action-btn">
                <i class="fas fa-graduation-cap"></i>
                <span>Add Question</span>
            </div>
            <div class="action-btn">
                <i class="fas fa-hand-holding-heart"></i>
                <span>Start Campaign</span>
            </div>
            <div class="action-btn">
                <i class="fas fa-boxes"></i>
                <span>Update Inventory</span>
            </div>
            <div class="action-btn">
                <i class="fas fa-file-alt"></i>
                <span>Generate Report</span>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="dashboard-footer">
        <div>© 2026 NAYS 2.0 - National Association of Yung Students</div>
        <div class="footer-links">
            <span><i class="fas fa-shield-alt"></i> Privacy</span>
            <span><i class="fas fa-cog"></i> Settings</span>
            <span><i class="fas fa-question-circle"></i> Help</span>
            <span><i class="fas fa-envelope"></i> Contact</span>
        </div>
    </footer>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Chart.js initialization
    const ctxLine = document.getElementById('memberGrowthChart').getContext('2d');
    new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: ['Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar'],
            datasets: [{
                label: 'Total Members',
                data: [4120, 4350, 4580, 4820, 5010, 5247],
                borderColor: '#E9B741',
                backgroundColor: 'rgba(233, 183, 65, 0.1)',
                tension: 0.3,
                fill: true,
                pointBackgroundColor: '#1B4D3E',
                pointBorderColor: '#fff',
                pointRadius: 5,
                pointHoverRadius: 7
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: { backgroundColor: '#1B4D3E' }
            },
            scales: {
                y: { beginAtZero: false, grid: { color: '#e2e8f0' } }
            }
        }
    });

    const ctxPie = document.getElementById('fundingPieChart').getContext('2d');
    new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: ['Education', 'Infrastructure', 'Scholarships', 'Culture'],
            datasets: [{
                data: [42, 28, 18, 12],
                backgroundColor: ['#E9B741', '#1B4D3E', '#2A6B55', '#B7E3D1'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom', labels: { boxWidth: 12, font: { size: 11 } } }
            }
        }
    });
});
</script>