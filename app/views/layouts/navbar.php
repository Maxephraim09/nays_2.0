<?php
use App\Core\Auth;
$user = Auth::user();
?>
 
 
 <!-- TOP BAR -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-left">
                <span><i class="fas fa-phone"></i> +234 800 000 0000</span>
                <span><i class="fas fa-envelope"></i> info@nays.ng</span>
            </div>
            <div class="top-bar-right">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>

    <!-- HEADER / NAVBAR -->
    <header class="header">
        <div class="container">
            <div class="logo">
                <a href="<?php echo url(''); ?>" class="logo-link">
                    <img src="public/assets/images/logo.pn"  alt="<?php echo APP_NAME; ?>" class="logo-img">
                    <h1><?php echo APP_NAME; ?></h1>
                </a>
                <span>building the future</span>
            </div>
            
            <ul class="nav-menu" id="navMenu">
                <li><a class="nav-link  href="<?php echo ($_GET['url'] ?? '') == 'home' ? 'active text-primary fw-bold' : 'text-dark'; ?>" href="<?php echo url('home'); ?>">Home</a></li>
                <li><a class="nav-link  href="<?php echo ($_GET['url'] ?? '') == 'about' ? 'active text-primary fw-bold' : 'text-dark'; ?>" href="<?php echo url('about'); ?>">About</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#talent">Talent</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a class="nav-link  href="<?php echo ($_GET['url'] ?? '') == 'library' ? 'active text-primary fw-bold' : 'text-dark'; ?>" href="<?php echo url('library'); ?>">Library</a></li>
                <li><a class="nav-link  href="<?php echo ($_GET['url'] ?? '') == 'contact' ? 'active text-primary fw-bold' : 'text-dark'; ?>" href="<?php echo url('contact'); ?>">Contact</a></li>
            </ul>
            
            <div class="nav-buttons">
                <a  href="<?php echo url('login'); ?>" class="btn btn-outline">Login</a>
                <a href="<?php echo url('register'); ?>" class="btn btn-primary">Register</a>
            </div>
            
            <div class="mobile-toggle" id="mobileToggle">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </header>