<?php
use App\Core\Auth;
$user = Auth::user();
?>
<div class="col-md-3 col-lg-2 sidebar bg-light">
    <div class="position-sticky pt-3">
        <div class="text-center mb-4">
            <img src="<?php echo $user->profile_photo ?? asset('images/default-avatar.png'); ?>" 
                 alt="Profile" class="rounded-circle" width="80" height="80">
            <h6 class="mt-2"><?php echo $user->first_name . ' ' . $user->last_name; ?></h6>
            <span class="badge bg-primary"><?php echo ucfirst($user->member_type); ?></span>
        </div>
        
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo $_GET['url'] == 'dashboard' ? 'active' : ''; ?>" href="<?php echo url('dashboard'); ?>">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo strpos($_GET['url'], 'profile') === 0 ? 'active' : ''; ?>" href="<?php echo url('profile'); ?>">
                    <i class="fas fa-user"></i> Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo strpos($_GET['url'], 'branches') === 0 ? 'active' : ''; ?>" href="<?php echo url('branches'); ?>">
                    <i class="fas fa-sitemap"></i> Branches
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo strpos($_GET['url'], 'elections') === 0 ? 'active' : ''; ?>" href="<?php echo url('elections'); ?>">
                    <i class="fas fa-vote-yea"></i> Elections
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo strpos($_GET['url'], 'academy') === 0 ? 'active' : ''; ?>" href="<?php echo url('academy'); ?>">
                    <i class="fas fa-graduation-cap"></i> Academy
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo strpos($_GET['url'], 'portfolio') === 0 ? 'active' : ''; ?>" href="<?php echo url('portfolio'); ?>">
                    <i class="fas fa-star"></i> Talent Hub
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo strpos($_GET['url'], 'projects') === 0 ? 'active' : ''; ?>" href="<?php echo url('projects'); ?>">
                    <i class="fas fa-project-diagram"></i> Projects
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo strpos($_GET['url'], 'donate') === 0 ? 'active' : ''; ?>" href="<?php echo url('donate'); ?>">
                    <i class="fas fa-hand-holding-heart"></i> Donate
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo strpos($_GET['url'], 'forum') === 0 ? 'active' : ''; ?>" href="<?php echo url('forum'); ?>">
                    <i class="fas fa-comments"></i> Forum
                </a>
            </li>
        </ul>
    </div>
</div>