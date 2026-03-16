<?php
use App\Core\Auth;
$user = Auth::user();
?>
<!-- Sidebar -->
<aside class="dashboard-sidebar">
    <div class="sidebar-header">
        <div class="sidebar-brand">
            <i class="fas fa-graduation-cap"></i>
            <span>NAYS</span>
        </div>
        <button class="sidebar-toggle" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Sidebar Navigation -->
    <nav class="sidebar-nav">
        <ul class="nav-menu">
            <!-- Common Items -->
            <li class="nav-item">
                <a class="nav-link <?php echo ($_GET['url'] ?? '') == 'dashboard' ? 'active' : ''; ?>" href="<?php echo url('dashboard'); ?>">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php echo strpos($_GET['url'] ?? '', 'profile') === 0 ? 'active' : ''; ?>" href="<?php echo url('profile'); ?>">
                    <i class="fas fa-user"></i>
                    <span>My Profile</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('notifications'); ?>">
                    <i class="fas fa-bell"></i>
                    <span>Notifications</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('messages'); ?>">
                    <i class="fas fa-comments"></i>
                    <span>Messages</span>
                </a>
            </li>

            <?php
            // Get user role from database
            $db = \App\Core\Database::getInstance();
            $userRole = $db->query("SELECT r.name FROM roles r
                                    JOIN branch_members bm ON r.id = bm.role_id
                                    WHERE bm.user_id = :user_id AND bm.is_primary_branch = 1")
                           ->bind(':user_id', $user->id)
                           ->single();
            $currentRole = $userRole ? $userRole->name : 'member';
            ?>

            <!-- Role-based Navigation -->
            <?php if (in_array($currentRole, ['member'])): ?>
            <!-- Member Navigation -->
            <li class="nav-section">
                <div class="nav-section-title">Learning & Growth</div>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo strpos($_GET['url'] ?? '', 'academy') === 0 ? 'active' : ''; ?>" href="<?php echo url('academy'); ?>">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Academy</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo strpos($_GET['url'] ?? '', 'portfolio') === 0 ? 'active' : ''; ?>" href="<?php echo url('portfolio'); ?>">
                    <i class="fas fa-star"></i>
                    <span>Talent Hub</span>
                </a>
            </li>

            <li class="nav-section">
                <div class="nav-section-title">Community</div>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo strpos($_GET['url'] ?? '', 'projects') === 0 ? 'active' : ''; ?>" href="<?php echo url('projects'); ?>">
                    <i class="fas fa-project-diagram"></i>
                    <span>Projects I Support</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo strpos($_GET['url'] ?? '', 'donations') === 0 ? 'active' : ''; ?>" href="<?php echo url('donations'); ?>">
                    <i class="fas fa-hand-holding-heart"></i>
                    <span>Donations & Campaigns</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo strpos($_GET['url'] ?? '', 'forum') === 0 ? 'active' : ''; ?>" href="<?php echo url('forum'); ?>">
                    <i class="fas fa-comments"></i>
                    <span>Forum & Discussions</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo strpos($_GET['url'] ?? '', 'elections') === 0 ? 'active' : ''; ?>" href="<?php echo url('elections'); ?>">
                    <i class="fas fa-vote-yea"></i>
                    <span>Elections & Voting</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('events'); ?>">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Events & Calendar</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('announcements'); ?>">
                    <i class="fas fa-bullhorn"></i>
                    <span>Announcements</span>
                </a>
            </li>

            <?php elseif ($currentRole === 'branch_admin'): ?>
            <!-- Branch Admin Navigation -->
            <li class="nav-section">
                <div class="nav-section-title">Branch Management</div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('branch/overview'); ?>">
                    <i class="fas fa-chart-line"></i>
                    <span>Branch Overview</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('branch/members'); ?>">
                    <i class="fas fa-users"></i>
                    <span>Members & Approvals</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('branch/announcements'); ?>">
                    <i class="fas fa-bullhorn"></i>
                    <span>Branch Announcements</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('branch/projects'); ?>">
                    <i class="fas fa-project-diagram"></i>
                    <span>Branch Projects</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('branch/events'); ?>">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Branch Events</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('branch/finance'); ?>">
                    <i class="fas fa-wallet"></i>
                    <span>Branch Finance</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('branch/inventory'); ?>">
                    <i class="fas fa-boxes"></i>
                    <span>Inventory Requests</span>
                </a>
            </li>

            <?php elseif (in_array($currentRole, ['super_admin', 'national_admin'])): ?>
            <!-- National Admin Navigation -->
            <li class="nav-section">
                <div class="nav-section-title">National Management</div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('admin/overview'); ?>">
                    <i class="fas fa-chart-line"></i>
                    <span>National Overview</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('admin/branches'); ?>">
                    <i class="fas fa-sitemap"></i>
                    <span>All Branches</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('admin/users'); ?>">
                    <i class="fas fa-users"></i>
                    <span>All Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('admin/elections'); ?>">
                    <i class="fas fa-vote-yea"></i>
                    <span>Elections Management</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('admin/academy'); ?>">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Academy Questions Bank</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('admin/projects'); ?>">
                    <i class="fas fa-project-diagram"></i>
                    <span>Projects & Funding</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('admin/finance'); ?>">
                    <i class="fas fa-wallet"></i>
                    <span>Donations & Finance</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('admin/announcements'); ?>">
                    <i class="fas fa-bullhorn"></i>
                    <span>National Announcements</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('admin/audit'); ?>">
                    <i class="fas fa-shield-alt"></i>
                    <span>Audit Logs</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('admin/settings'); ?>">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
            </li>

            <?php elseif ($currentRole === 'finance_admin'): ?>
            <!-- Finance Admin Navigation -->
            <li class="nav-section">
                <div class="nav-section-title">Finance Management</div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('finance/transactions'); ?>">
                    <i class="fas fa-exchange-alt"></i>
                    <span>Transactions</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('finance/budgets'); ?>">
                    <i class="fas fa-wallet"></i>
                    <span>Budgets</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('finance/reports'); ?>">
                    <i class="fas fa-chart-bar"></i>
                    <span>Reports</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('finance/donors'); ?>">
                    <i class="fas fa-heart"></i>
                    <span>Donor Wall</span>
                </a>
            </li>

            <?php elseif ($currentRole === 'alumni_admin'): ?>
            <!-- Alumni Admin Navigation -->
            <li class="nav-section">
                <div class="nav-section-title">Alumni Management</div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('alumni/directory'); ?>">
                    <i class="fas fa-address-book"></i>
                    <span>Alumni Directory</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('alumni/mentorship'); ?>">
                    <i class="fas fa-user-friends"></i>
                    <span>Mentorship</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('alumni/jobs'); ?>">
                    <i class="fas fa-briefcase"></i>
                    <span>Jobs</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('alumni/giving'); ?>">
                    <i class="fas fa-hand-holding-heart"></i>
                    <span>Giving</span>
                </a>
            </li>

            <?php elseif ($currentRole === 'election_observer'): ?>
            <!-- Election Observer Navigation -->
            <li class="nav-section">
                <div class="nav-section-title">Election Monitoring</div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('observer/elections'); ?>">
                    <i class="fas fa-eye"></i>
                    <span>Active Elections</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('observer/reports'); ?>">
                    <i class="fas fa-file-alt"></i>
                    <span>Observation Reports</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('observer/audit'); ?>">
                    <i class="fas fa-shield-alt"></i>
                    <span>Audit View</span>
                </a>
            </li>
            <?php endif; ?>
        </ul>

        <!-- Footer Section -->
        <div class="sidebar-footer">
            <a class="nav-link logout-link" href="<?php echo url('help'); ?>">
                <i class="fas fa-question-circle"></i>
                <span>Help & Support</span>
            </a>
            <a class="nav-link logout-link" href="<?php echo url('logout'); ?>">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </div>
    </nav>
</aside>