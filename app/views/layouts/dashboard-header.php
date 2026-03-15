<?php
use App\Core\Auth;
$user = Auth::user();
$currentRole = Auth::getCurrentRole();
?>
<!-- Dashboard Header - TailAdmin Style -->
<div class="dashboard-header">
    <div class="header-content">
        <!-- Breadcrumb Navigation -->
        <div class="breadcrumb-section">
            <nav class="breadcrumb-nav">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/dashboard" class="breadcrumb-link">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php
                        $pageTitles = [
                            'super_admin' => 'Super Admin Dashboard',
                            'branch_admin' => 'Branch Admin Dashboard',
                            'finance_admin' => 'Finance Admin Dashboard',
                            'alumni_admin' => 'Alumni Admin Dashboard',
                            'election_observer' => 'Election Observer Dashboard',
                            'member' => 'Member Dashboard'
                        ];
                        echo $pageTitles[$currentRole] ?? 'Dashboard';
                        ?>
                    </li>
                </ol>
            </nav>
        </div>

        <!-- User Menu -->
        <div class="header-actions">
            <!-- Notifications -->
            <div class="notification-dropdown">
                <button class="notification-btn" id="notificationBtn">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge" id="notificationBadge">3</span>
                </button>
                <div class="notification-dropdown-menu" id="notificationDropdown">
                    <div class="notification-header">
                        <h6>Notifications</h6>
                        <a href="#" class="mark-all-read">Mark all read</a>
                    </div>
                    <div class="notification-list">
                        <div class="notification-item unread">
                            <div class="notification-icon">
                                <i class="fas fa-vote-yea text-primary"></i>
                            </div>
                            <div class="notification-content">
                                <p class="notification-text">New election started in Lagos Branch</p>
                                <small class="notification-time">2 hours ago</small>
                            </div>
                        </div>
                        <div class="notification-item unread">
                            <div class="notification-icon">
                                <i class="fas fa-user-plus text-success"></i>
                            </div>
                            <div class="notification-content">
                                <p class="notification-text">5 new members joined your branch</p>
                                <small class="notification-time">5 hours ago</small>
                            </div>
                        </div>
                        <div class="notification-item">
                            <div class="notification-icon">
                                <i class="fas fa-project-diagram text-info"></i>
                            </div>
                            <div class="notification-content">
                                <p class="notification-text">Project deadline approaching</p>
                                <small class="notification-time">1 day ago</small>
                            </div>
                        </div>
                    </div>
                    <div class="notification-footer">
                        <a href="<?php echo url('notifications'); ?>" class="view-all-link">View All Notifications</a>
                    </div>
                </div>
            </div>

            <!-- Profile Dropdown -->
            <div class="profile-dropdown">
                <button class="profile-btn" id="profileBtn">
                    <div class="profile-avatar">
                        <img src="<?php echo $user->profile_photo ?? asset('images/default-avatar.png'); ?>"
                             alt="Profile">
                    </div>
                    <div class="profile-info">
                        <div class="profile-name"><?php echo $user->first_name; ?></div>
                        <?php
                        // Get user role from database
                        $db = \App\Core\Database::getInstance();
                        $userRole = $db->query("SELECT r.name FROM roles r
                                                JOIN branch_members bm ON r.id = bm.role_id
                                                WHERE bm.user_id = :user_id AND bm.is_primary_branch = 1")
                                       ->bind(':user_id', $user->id)
                                       ->single();
                        $currentRole = $userRole ? $userRole->name : 'member';
                        $roleDisplay = str_replace('_', ' ', ucfirst($currentRole));
                        ?>
                        <div class="profile-role"><?php echo $roleDisplay; ?></div>
                    </div>
                    <i class="fas fa-chevron-down dropdown-arrow"></i>
                </button>
                <div class="profile-dropdown-menu" id="profileDropdown">
                    <div class="profile-header">
                        <div class="profile-avatar-large">
                            <img src="<?php echo $user->profile_photo ?? asset('images/default-avatar.png'); ?>"
                                 alt="Profile" class="rounded-circle">
                        </div>
                        <div class="profile-details">
                            <h6><?php echo $user->first_name . ' ' . $user->last_name; ?></h6>
                            <span class="profile-role"><?php echo $roleDisplay; ?></span>
                            <small class="profile-email"><?php echo $user->email; ?></small>
                        </div>
                    </div>
                    <div class="profile-menu">
                        <a href="<?php echo url('profile'); ?>" class="profile-menu-item">
                            <i class="fas fa-user"></i>
                            <span>My Profile</span>
                        </a>
                        <a href="<?php echo url('settings'); ?>" class="profile-menu-item">
                            <i class="fas fa-cog"></i>
                            <span>Settings</span>
                        </a>
                        <a href="<?php echo url('help'); ?>" class="profile-menu-item">
                            <i class="fas fa-question-circle"></i>
                            <span>Help & Support</span>
                        </a>
                        <div class="profile-divider"></div>
                        <a href="<?php echo url('logout'); ?>" class="profile-menu-item logout">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" id="mobileMenuToggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
</nav>

<script>
// Notification dropdown toggle
document.getElementById('notificationBtn').addEventListener('click', function(e) {
    e.stopPropagation();
    document.getElementById('notificationDropdown').classList.toggle('show');
    document.getElementById('profileDropdown').classList.remove('show');
});

// Profile dropdown toggle
document.getElementById('profileBtn').addEventListener('click', function(e) {
    e.stopPropagation();
    document.getElementById('profileDropdown').classList.toggle('show');
    document.getElementById('notificationDropdown').classList.remove('show');
});

// Mobile menu toggle
document.getElementById('mobileMenuToggle').addEventListener('click', function() {
    document.querySelector('.dashboard-sidebar').classList.toggle('mobile-open');
});

// Close dropdowns when clicking outside
document.addEventListener('click', function() {
    document.getElementById('notificationDropdown').classList.remove('show');
    document.getElementById('profileDropdown').classList.remove('show');
});
</script>

<script>
// Notification dropdown toggle
document.getElementById('notificationBtn').addEventListener('click', function(e) {
    e.stopPropagation();
    document.getElementById('notificationDropdown').classList.toggle('show');
    document.getElementById('profileDropdown').classList.remove('show');
});

// Profile dropdown toggle
document.getElementById('profileBtn').addEventListener('click', function(e) {
    e.stopPropagation();
    document.getElementById('profileDropdown').classList.toggle('show');
    document.getElementById('notificationDropdown').classList.remove('show');
});

// Close dropdowns when clicking outside
document.addEventListener('click', function() {
    document.getElementById('notificationDropdown').classList.remove('show');
    document.getElementById('profileDropdown').classList.remove('show');
});

// Sidebar toggle
document.getElementById('sidebarToggle').addEventListener('click', function() {
    document.querySelector('.dashboard-container').classList.toggle('sidebar-open');
    document.querySelector('.sidebar').classList.toggle('collapsed');
});
</script>