<!-- Dashboard Content - TailAdmin Style -->
<div class="dashboard-content">
    <!-- Page Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Election Observer Dashboard</h1>
        <p class="text-gray-600">Monitor elections and ensure integrity across branches</p>
    </div>

    <!-- Stats Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Elections Monitored -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Elections Monitored</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo $stats['elections_monitored'] ?? '8'; ?></p>
                    <div class="flex items-center mt-2">
                        <span class="text-green-600 text-sm font-medium flex items-center">
                            <i class="fas fa-check-circle mr-1"></i> All successful
                        </span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center">
                    <i class="fas fa-vote-yea text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Reports Filed -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Reports Filed</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo $stats['reports_filed'] ?? '12'; ?></p>
                    <div class="flex items-center mt-2">
                        <span class="text-orange-600 text-sm font-medium flex items-center">
                            <i class="fas fa-clock mr-1"></i> 3 pending review
                        </span>
                    </div>
                </div>
                <div class="w-12 h-12 bg-orange-50 rounded-lg flex items-center justify-center">
                    <i class="fas fa-flag text-orange-600 text-xl"></i>
                </div>
            </div>
        </div>
                <div class="stat-text">
                    <div class="stat-value"><?php echo $stats['reports_filed'] ?? '3'; ?></div>
                    <div class="stat-label">Reports Filed</div>
                    <div class="stat-change neutral">
                        <i class="fas fa-clock"></i> 2 pending review
                    </div>
                </div>
            </div>
        </div>

        <!-- Voters Observed -->
        <div class="stat-card membership-card">
            <div class="stat-content">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-value"><?php echo number_format($stats['voters_observed'] ?? 1250); ?></div>
                <div class="stat-label">Voters Observed</div>
                <div class="stat-change positive">
                    <i class="fas fa-thumbs-up"></i> High turnout
                </div>
            </div>
        </div>

        <!-- Election Integrity -->
        <div class="stat-card projects-card">
            <div class="stat-content">
                <div class="stat-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <div class="stat-value"><?php echo $stats['integrity_score'] ?? '98'; ?>%</div>
                <div class="stat-label">Election Integrity</div>
                <div class="stat-change positive">
                    <i class="fas fa-star"></i> Excellent rating
                </div>
                <div class="progress-ring">
                    <div class="progress-circle" style="--progress: <?php echo $stats['integrity_score'] ?? '98'; ?>"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions Section -->
<div class="dashboard-section">
    <div class="section-header">
        <h2>Election Monitoring</h2>
        <p>Monitor and ensure fair elections across all branches</p>
    </div>

    <div class="quick-actions-grid">
        <!-- Active Elections -->
        <div class="quick-action-card">
            <div class="action-icon">
                <i class="fas fa-play-circle"></i>
            </div>
            <div class="action-content">
                <h3>Active Elections</h3>
                <p>Monitor ongoing elections and voting processes</p>
                <div class="action-meta">
                    <span class="event-count"><?php echo $stats['active_elections'] ?? '2'; ?> currently active</span>
                </div>
            </div>
            <a href="<?php echo url('observer/active-elections'); ?>" class="action-button primary">
                <i class="fas fa-play-circle"></i>
                Monitor Elections
            </a>
        </div>

        <!-- File Report -->
        <div class="quick-action-card">
            <div class="action-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="action-content">
                <h3>File Observation Report</h3>
                <p>Submit detailed reports on election proceedings</p>
                <div class="action-meta">
                    <span class="item-count"><?php echo $stats['reports_filed'] ?? '3'; ?> reports submitted</span>
                </div>
            </div>
            <a href="<?php echo url('observer/file-report'); ?>" class="action-button secondary">
                <i class="fas fa-file-alt"></i>
                File Report
            </a>
        </div>

        <!-- Incident Reporting -->
        <div class="quick-action-card">
            <div class="action-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="action-content">
                <h3>Report Incident</h3>
                <p>Report any irregularities or violations observed</p>
                <div class="action-meta">
                    <span class="visibility-text">Emergency reporting</span>
                </div>
            </div>
            <a href="<?php echo url('observer/report-incident'); ?>" class="action-button warning">
                <i class="fas fa-exclamation-triangle"></i>
                Report Incident
            </a>
        </div>

        <!-- Training Materials -->
        <div class="quick-action-card featured">
            <div class="action-icon">
                <i class="fas fa-book"></i>
            </div>
            <div class="action-content">
                <h3>Training Materials</h3>
                <p>Access guidelines and training resources</p>
                <div class="action-meta">
                    <span class="visibility-text">Updated regularly</span>
                </div>
            </div>
            <a href="<?php echo url('observer/training'); ?>" class="action-button info">
                <i class="fas fa-book"></i>
                View Training
            </a>
        </div>
    </div>
</div>

<!-- Content Tabs -->
<div class="dashboard-section">
    <div class="content-tabs">
        <div class="tabs-header">
            <button class="tab-button active" data-tab="monitoring">Election Monitoring</button>
            <button class="tab-button" data-tab="reports">Observation Reports</button>
            <button class="tab-button" data-tab="analytics">Election Analytics</button>
        </div>

        <div class="tabs-content">
            <!-- Election Monitoring Tab -->
            <div class="tab-pane active" id="monitoring">
                <div class="activity-feed">
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-play-circle"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-text">
                                <strong>Student Council Election</strong> started at Lagos Branch
                                <span class="activity-target">Polling station A1</span>
                            </div>
                            <div class="activity-time">Live - Started 2 hours ago</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-text">
                                <strong>Voter turnout</strong> at Abuja Branch: 78%
                                <span class="activity-target">Higher than expected</span>
                            </div>
                            <div class="activity-time">1 hour ago</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-text">
                                <strong>Election completed</strong> at Kano Branch
                                <span class="activity-target">All procedures followed</span>
                            </div>
                            <div class="activity-time">3 hours ago</div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-flag"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-text">
                                <strong>Observation report</strong> submitted for Port Harcourt
                                <span class="activity-target">Pending review</span>
                            </div>
                            <div class="activity-time">5 hours ago</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Observation Reports Tab -->
            <div class="tab-pane" id="reports">
                <div class="announcements-list">
                    <div class="announcement-card normal">
                        <div class="announcement-header">
                            <div class="announcement-icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div class="announcement-meta">
                                <span class="announcement-priority normal">Report</span>
                                <span class="announcement-date">March 12, 2026</span>
                            </div>
                        </div>
                        <div class="announcement-content">
                            <h4>Lagos Branch Student Council Election</h4>
                            <p>Comprehensive report on the March 10th election. All procedures were followed correctly with high voter participation.</p>
                        </div>
                        <div class="announcement-actions">
                            <a href="#" class="announcement-link">View Full Report</a>
                        </div>
                    </div>

                    <div class="announcement-card important">
                        <div class="announcement-header">
                            <div class="announcement-icon">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="announcement-meta">
                                <span class="announcement-priority important">Incident Report</span>
                                <span class="announcement-date">March 8, 2026</span>
                            </div>
                        </div>
                        <div class="announcement-content">
                            <h4>Technical Issue - Abuja Branch</h4>
                            <p>Minor technical glitch with voting system resolved within 15 minutes. No impact on election integrity.</p>
                        </div>
                        <div class="announcement-actions">
                            <a href="#" class="announcement-link">View Incident Report</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Election Analytics Tab -->
            <div class="tab-pane" id="analytics">
                <div class="charts-grid">
                    <div class="chart-card">
                        <div class="chart-header">
                            <h4>Voter Turnout Trends</h4>
                            <span class="chart-period">Last 6 elections</span>
                        </div>
                        <div class="chart-container">
                            <canvas id="turnoutChart"></canvas>
                        </div>
                    </div>

                    <div class="chart-card">
                        <div class="chart-header">
                            <h4>Election Integrity Scores</h4>
                            <span class="chart-period">By branch</span>
                        </div>
                        <div class="chart-container">
                            <canvas id="integrityChart"></canvas>
                        </div>
                    </div>

                    <div class="chart-card">
                        <div class="chart-header">
                            <h4>Report Submission Rate</h4>
                            <span class="chart-period">This year</span>
                        </div>
                        <div class="chart-container">
                            <canvas id="reportsChart"></canvas>
                        </div>
                    </div>

                    <div class="chart-card">
                        <div class="chart-header">
                            <h4>Incident Frequency</h4>
                            <span class="chart-period">Last 12 months</span>
                        </div>
                        <div class="chart-container">
                            <canvas id="incidentsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <p>Monitor ongoing elections in real-time</p>
        <a href="<?php echo url('elections/active'); ?>" class="btn btn-primary">
            <i class="fas fa-play-circle me-2"></i>Monitor Elections
        </a>
    </div>

    <div class="quick-access-card">
        <div class="quick-access-icon">
            <i class="fas fa-file-alt"></i>
        </div>
        <h5>Observation Reports</h5>
        <p>View and file election observation reports</p>
        <a href="<?php echo url('elections/reports'); ?>" class="btn btn-success">
            <i class="fas fa-file-alt me-2"></i>View Reports
        </a>
    </div>

    <div class="quick-access-card">
        <div class="quick-access-icon">
            <i class="fas fa-clipboard-check"></i>
        </div>
        <h5>Election Checklist</h5>
        <p>Use monitoring checklist for compliance</p>
        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#checklistModal">
            <i class="fas fa-clipboard-check me-2"></i>Open Checklist
        </button>
    </div>

    <div class="quick-access-card">
        <div class="quick-access-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <h5>Report Incident</h5>
        <p>Report irregularities or violations</p>
        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#incidentModal">
            <i class="fas fa-exclamation-triangle me-2"></i>Report Incident
        </button>
    </div>
</div>

<!-- Active Elections & Recent Reports -->
<div class="dashboard-row">
    <div class="dashboard-col-8">
        <!-- Active Elections -->
        <div class="dashboard-card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-play-circle me-2"></i>Active Elections Under Monitoring
                </h5>
            </div>
            <div class="card-body">
                <div class="activity-list">
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-vote-yea"></i>
                        </div>
                        <div class="activity-content">
                            <p class="activity-text">
                                <strong>Student Council President - Lagos Branch</strong>
                                <span class="activity-target">Election for main student leadership position</span>
                            </p>
                            <small class="activity-time">
                                <i class="fas fa-calendar me-1"></i>Started: March 20, 2024 |
                                <i class="fas fa-clock me-1"></i>Ends: March 25, 2024 |
                                <i class="fas fa-users me-1"></i>1,250 registered voters
                            </small>
                            <div class="mt-2">
                                <span class="badge bg-success me-2">Live Monitoring</span>
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye me-1"></i>Monitor
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-vote-yea"></i>
                        </div>
                        <div class="activity-content">
                            <p class="activity-text">
                                <strong>Branch Secretary Election - Abuja Branch</strong>
                                <span class="activity-target">Administrative position for branch operations</span>
                            </p>
                            <small class="activity-time">
                                <i class="fas fa-calendar me-1"></i>Started: March 22, 2024 |
                                <i class="fas fa-clock me-1"></i>Ends: March 28, 2024 |
                                <i class="fas fa-users me-1"></i>890 registered voters
                            </small>
                            <div class="mt-2">
                                <span class="badge bg-success me-2">Live Monitoring</span>
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye me-1"></i>Monitor
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-col-4">
        <!-- Election Integrity Metrics -->
        <div class="dashboard-card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-chart-line me-2"></i>Election Integrity
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span>Voter Turnout</span>
                        <span class="fw-bold text-success">78%</span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-success" style="width: 78%"></div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span>Process Compliance</span>
                        <span class="fw-bold text-primary">95%</span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-primary" style="width: 95%"></div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span>Security Measures</span>
                        <span class="fw-bold text-info">92%</span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-info" style="width: 92%"></div>
                    </div>
                </div>

                <div class="mb-0">
                    <div class="d-flex justify-content-between mb-1">
                        <span>Transparency</span>
                        <span class="fw-bold text-success">98%</span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-success" style="width: 98%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Observer Guidelines -->
        <div class="dashboard-card">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="fas fa-book me-2"></i>Guidelines
                </h5>
            </div>
            <div class="card-body">
                <div class="accordion" id="guidelinesAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#guideline1">
                                <i class="fas fa-shield-alt me-2"></i>Code of Conduct
                            </button>
                        </h2>
                        <div id="guideline1" class="accordion-collapse collapse" data-bs-parent="#guidelinesAccordion">
                            <div class="accordion-body">
                                <small>Maintain neutrality, document observations objectively, and report any irregularities immediately.</small>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#guideline2">
                                <i class="fas fa-eye me-2"></i>Observation Protocol
                            </button>
                        </h2>
                        <div id="guideline2" class="accordion-collapse collapse" data-bs-parent="#guidelinesAccordion">
                            <div class="accordion-body">
                                <small>Monitor voter registration, ballot distribution, voting process, and result tabulation.</small>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#guideline3">
                                <i class="fas fa-flag me-2"></i>Reporting Incidents
                            </button>
                        </h2>
                        <div id="guideline3" class="accordion-collapse collapse" data-bs-parent="#guidelinesAccordion">
                            <div class="accordion-body">
                                <small>Use the incident reporting tool for any violations, irregularities, or concerns.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                                        <button class="btn btn-sm btn-outline-primary me-1">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-download"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Observer Tools & Guidelines -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-tools me-2"></i>Observer Tools
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#checklistModal">
                            <i class="fas fa-clipboard-check me-2"></i>Election Checklist
                        </button>
                        <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#incidentModal">
                            <i class="fas fa-exclamation-triangle me-2"></i>Report Incident
                        </button>
                        <button class="btn btn-outline-info">
                            <i class="fas fa-camera me-2"></i>Photo Evidence
                        </button>
                        <button class="btn btn-outline-warning">
                            <i class="fas fa-clock me-2"></i>Time Tracker
                        </button>
                        <button class="btn btn-outline-secondary">
                            <i class="fas fa-qrcode me-2"></i>QR Verifier
                        </button>
                    </div>
                </div>
            </div>

            <!-- Election Integrity Metrics -->
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-chart-line me-2"></i>Election Integrity
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span>Voter Turnout</span>
                            <span class="fw-bold text-success">78%</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-success" style="width: 78%"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span>Process Compliance</span>
                            <span class="fw-bold text-primary">95%</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-primary" style="width: 95%"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <span>Security Measures</span>
                            <span class="fw-bold text-info">92%</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-info" style="width: 92%"></div>
                        </div>
                    </div>

                    <div class="mb-0">
                        <div class="d-flex justify-content-between mb-1">
                            <span>Transparency</span>
                            <span class="fw-bold text-success">98%</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-success" style="width: 98%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Observer Guidelines -->
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-book me-2"></i>Guidelines
                    </h5>
                </div>
                <div class="card-body">
                    <div class="accordion" id="guidelinesAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#guideline1">
                                    <i class="fas fa-shield-alt me-2"></i>Code of Conduct
                                </button>
                            </h2>
                            <div id="guideline1" class="accordion-collapse collapse" data-bs-parent="#guidelinesAccordion">
                                <div class="accordion-body">
                                    <small>Maintain neutrality, document observations objectively, and report any irregularities immediately.</small>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#guideline2">
                                    <i class="fas fa-eye me-2"></i>Observation Protocol
                                </button>
                            </h2>
                            <div id="guideline2" class="accordion-collapse collapse" data-bs-parent="#guidelinesAccordion">
                                <div class="accordion-body">
                                    <small>Monitor voter registration, ballot distribution, voting process, and result tabulation.</small>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#guideline3">
                                    <i class="fas fa-flag me-2"></i>Reporting Incidents
                                </button>
                            </h2>
                            <div id="guideline3" class="accordion-collapse collapse" data-bs-parent="#guidelinesAccordion">
                                <div class="accordion-body">
                                    <small>Use the incident reporting tool for any violations, irregularities, or concerns.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Election Checklist Modal -->
<div class="modal fade" id="checklistModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-clipboard-check me-2"></i>Election Monitoring Checklist
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="checklist-section mb-4">
                    <h6 class="text-primary mb-3">Pre-Election Phase</h6>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="check1">
                        <label class="form-check-label" for="check1">
                            Voter registration list is accurate and up-to-date
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="check2">
                        <label class="form-check-label" for="check2">
                            Ballot papers are secure and tamper-proof
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="check3">
                        <label class="form-check-label" for="check3">
                            Voting machines/systems are tested and functional
                        </label>
                    </div>
                </div>

                <div class="checklist-section mb-4">
                    <h6 class="text-primary mb-3">During Election Phase</h6>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="check4">
                        <label class="form-check-label" for="check4">
                            Polling stations open on time
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="check5">
                        <label class="form-check-label" for="check5">
                            Voter identification is properly verified
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="check6">
                        <label class="form-check-label" for="check6">
                            No unauthorized persons in polling area
                        </label>
                    </div>
                </div>

                <div class="checklist-section">
                    <h6 class="text-primary mb-3">Post-Election Phase</h6>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="check7">
                        <label class="form-check-label" for="check7">
                            Votes are counted accurately
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="check8">
                        <label class="form-check-label" for="check8">
                            Results are announced transparently
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="check9">
                        <label class="form-check-label" for="check9">
                            All materials are properly secured
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Checklist</button>
            </div>
        </div>
    </div>
</div>

<!-- Incident Report Modal -->
<div class="modal fade" id="incidentModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle me-2"></i>Report Election Incident
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="incidentType" class="form-label">Incident Type</label>
                        <select class="form-select" id="incidentType">
                            <option>Security Breach</option>
                            <option>Voter Intimidation</option>
                            <option>Technical Issues</option>
                            <option>Process Violation</option>
                            <option>Other</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="incidentDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="incidentDescription" rows="4" placeholder="Describe the incident in detail..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="incidentSeverity" class="form-label">Severity Level</label>
                        <select class="form-select" id="incidentSeverity">
                            <option value="low">Low - Minor issue, no impact on election</option>
                            <option value="medium">Medium - Potential impact on process</option>
                            <option value="high">High - Serious violation affecting integrity</option>
                            <option value="critical">Critical - Immediate threat to election</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="incidentEvidence" class="form-label">Evidence/Photos</label>
                        <input type="file" class="form-control" id="incidentEvidence" multiple accept="image/*">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Submit Report</button>
            </div>
        </div>
    </div>
</div>