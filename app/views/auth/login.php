<div class="auth-page">
    <div class="auth-container">
        <!-- Left side - Welcome Section (missing in your code) -->
        <div class="auth-left">
            <div class="welcome-content">
                <div class="brand-section">
                    <h1 class="brand-title">NAYS 2.0</h1>
                    <p class="brand-subtitle">National Association of Yung Students</p>
                </div>

                <div class="welcome-features">
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Connect with Yungur students worldwide</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Access NAYS Academy & practice exams</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Participate in elections & community projects</span>
                    </div>
                </div>

                <div class="welcome-stats">
                    <div class="stat">
                        <span class="stat-number">5,000+</span>
                        <span class="stat-label">Active Members</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">45+</span>
                        <span class="stat-label">Branches</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">₦4.2M</span>
                        <span class="stat-label">Raised</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="auth-right">
            <div class="auth-card">
                <div class="auth-header">
                    <h4 class="mb-2">Welcome Back!</h4>
                    <p class="text-muted mb-0">Sign in to continue your journey</p>
                </div>

                <div class="auth-body">
                    <?php if ($error = flash('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i><?php echo $error; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if ($success = flash('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i><?php echo $success; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if ($errors = flash('errors')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <ul class="mb-0 mt-2">
                                <?php foreach($errors as $field => $fieldErrors): ?>
                                    <?php foreach($fieldErrors as $error): ?>
                                        <li><?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo url('login'); ?>" class="auth-form">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope me-2"></i>Email Address
                            </label>
                            <input type="email" class="form-control" id="email" name="email"
                                   value="<?php echo old('email'); ?>" required autofocus
                                   placeholder="Enter your email address">
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">
                                <i class="fas fa-lock me-2"></i>Password
                            </label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" required
                                       placeholder="Enter your password">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="form-options">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember Me</label>
                            </div>
                            <a href="<?php echo url('forgot-password'); ?>" class="text-decoration-none">
                                Forgot Password?
                            </a>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-sign-in-alt me-2"></i>Sign In
                        </button>
                    </form>

                    <div class="auth-divider">
                        <span>or</span>
                    </div>

                    <div class="social-login">
                        <button class="btn btn-outline-primary w-100 mb-2" type="button">
                            <i class="fab fa-google me-2"></i>Continue with Google
                        </button>
                        <button class="btn btn-outline-primary w-100" type="button">
                            <i class="fab fa-facebook me-2"></i>Continue with Facebook
                        </button>
                    </div>

                    <div class="auth-footer">
                        <span class="text-muted">Don't have an account?</span>
                        <a href="<?php echo url('register/step1'); ?>" class="text-decoration-none fw-bold ms-1">
                            Create Account
                        </a>
                    </div>

                    <div class="text-center mt-3">
                        <small class="text-muted">
                            Didn't receive verification email?
                            <a href="#" data-bs-toggle="modal" data-bs-target="#resendModal" class="text-decoration-none">
                                Resend
                            </a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Resend Verification Modal -->
<div class="modal fade" id="resendModal" tabindex="-1" aria-labelledby="resendModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="resendModalLabel">
                    <i class="fas fa-envelope me-2"></i>Resend Verification Email
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="<?php echo url('resend-verification'); ?>">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <p class="mb-3">Enter your email address to resend the verification link.</p>
                    <div class="mb-3">
                        <label for="resend_email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="resend_email" name="email" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Resend Email</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
:root {
    --primary-color: #1B4D3E;
    --primary-dark: #0F3A2E;
    --primary-light: #2A6B55;
    --secondary-color: #E9B741;
    --secondary-dark: #d4a130;
    --green-50: #f0f7f0;
    --green-100: #e0efe0;
    --dark-color: #1e293b;
}

.auth-page {
    min-height: 100vh;
    background: linear-gradient(135deg, var(--green-50) 0%, var(--green-100) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem 1rem;
    font-family: 'Inter', sans-serif;
}

.auth-container {
    display: flex;
    max-width: 1200px;
    width: 100%;
    min-height: 600px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    border-radius: 24px;
    overflow: hidden;
    background: white;
}

.auth-left {
    flex: 1;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    padding: 3rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
}

.welcome-content {
    text-align: center;
    max-width: 400px;
}

.brand-section {
    margin-bottom: 3rem;
}

.brand-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    color: white;
}

.brand-subtitle {
    opacity: 0.9;
    font-size: 1rem;
}

.welcome-features {
    margin-bottom: 3rem;
    text-align: left;
    background: rgba(255,255,255,0.1);
    padding: 2rem;
    border-radius: 16px;
}

.feature-item {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
    font-weight: 500;
}

.feature-item i {
    margin-right: 1rem;
    font-size: 1.2rem;
    color: var(--secondary-color);
}

.welcome-stats {
    display: flex;
    justify-content: space-around;
    margin-top: 2rem;
    background: rgba(255,255,255,0.1);
    padding: 1.5rem;
    border-radius: 16px;
}

.stat {
    text-align: center;
}

.stat-number {
    font-size: 1.8rem;
    font-weight: 700;
    display: block;
    color: var(--secondary-color);
}

.stat-label {
    font-size: 0.85rem;
    opacity: 0.9;
}

.auth-right {
    flex: 1;
    padding: 3rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.auth-card {
    width: 100%;
    max-width: 400px;
}

.auth-header {
    text-align: center;
    margin-bottom: 2rem;
}

.auth-header h4 {
    color: var(--primary-color);
    font-size: 1.8rem;
    font-weight: 700;
}

.auth-body {
    width: 100%;
}

.auth-form {
    margin-bottom: 2rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    font-weight: 600;
    color: var(--dark-color);
    margin-bottom: 0.5rem;
    display: block;
    font-size: 0.95rem;
}

.form-control {
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    padding: 0.75rem 1rem;
    font-size: 1rem;
    transition: all 0.3s ease;
    width: 100%;
}

.form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 4px rgba(27, 77, 62, 0.1);
    outline: none;
}

.input-group {
    display: flex;
    align-items: stretch;
    width: 100%;
}

.input-group .form-control {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-right: none;
}

.input-group .btn {
    border: 2px solid #e2e8f0;
    border-left: none;
    border-radius: 0 12px 12px 0;
    background: white;
    color: #64748b;
    padding: 0 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.input-group .btn:hover {
    background: #f8fafc;
    color: var(--primary-color);
}

.form-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
}

.form-check {
    display: flex;
    align-items: center;
}

.form-check-input {
    margin-right: 0.5rem;
    cursor: pointer;
}

.form-check-label {
    color: #64748b;
    font-size: 0.95rem;
    cursor: pointer;
}

.form-options a {
    color: var(--primary-color);
    font-size: 0.95rem;
    text-decoration: none;
}

.form-options a:hover {
    color: var(--primary-dark);
    text-decoration: underline;
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    border: none;
    padding: 0.875rem 1.5rem;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1rem;
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 100%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(27, 77, 62, 0.3);
}

.btn-primary:active {
    transform: translateY(0);
}

.btn-outline-primary {
    border: 2px solid var(--primary-color);
    background: transparent;
    color: var(--primary-color);
    border-radius: 12px;
    padding: 0.75rem 1.5rem;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 100%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.btn-outline-primary:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(27, 77, 62, 0.2);
}

.btn-outline-secondary {
    background: transparent;
    border: 2px solid #e2e8f0;
    color: #64748b;
    cursor: pointer;
    transition: all 0.3s ease;
}

.auth-divider {
    text-align: center;
    margin: 2rem 0;
    position: relative;
}

.auth-divider::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 1px;
    background: #e2e8f0;
}

.auth-divider span {
    background: white;
    padding: 0 1rem;
    color: #64748b;
    font-size: 0.95rem;
    position: relative;
    z-index: 1;
}

.social-login {
    margin-bottom: 2rem;
}

.social-login .btn {
    margin-bottom: 0.75rem;
}

.social-login .btn:last-child {
    margin-bottom: 0;
}

.auth-footer {
    text-align: center;
    padding-top: 1.5rem;
    border-top: 1px solid #e2e8f0;
}

.text-muted {
    color: #64748b;
}

.text-decoration-none {
    text-decoration: none;
}

.fw-bold {
    font-weight: 700;
}

.ms-1 {
    margin-left: 0.25rem;
}

.mt-3 {
    margin-top: 1rem;
}

.mb-2 {
    margin-bottom: 0.5rem;
}

.mb-0 {
    margin-bottom: 0;
}

.mt-2 {
    margin-top: 0.5rem;
}

.me-2 {
    margin-right: 0.5rem;
}

.w-100 {
    width: 100%;
}

/* Alert styles */
.alert {
    padding: 1rem;
    border-radius: 12px;
    margin-bottom: 1.5rem;
    position: relative;
    display: flex;
    align-items: center;
}

.alert-danger {
    background: #fee2e2;
    border: 1px solid #fecaca;
    color: #991b1b;
}

.alert-success {
    background: #dcfce7;
    border: 1px solid #bbf7d0;
    color: #166534;
}

.alert ul {
    margin-top: 0.5rem;
    padding-left: 1.5rem;
}

.alert-dismissible {
    padding-right: 3rem;
}

.btn-close {
    position: absolute;
    top: 50%;
    right: 1rem;
    transform: translateY(-50%);
    background: transparent;
    border: none;
    font-size: 1rem;
    cursor: pointer;
    padding: 0.5rem;
    line-height: 1;
    color: inherit;
}

.btn-close:hover {
    opacity: 0.75;
}

/* Modal styles */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.5);
    z-index: 1050;
    align-items: center;
    justify-content: center;
}

.modal.show {
    display: flex;
}

.modal-dialog {
    max-width: 500px;
    width: 90%;
}

.modal-dialog-centered {
    margin: 1.75rem auto;
}

.modal-content {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 25px 50px rgba(0,0,0,0.2);
}

.modal-header {
    padding: 1.25rem 1.5rem;
    border-bottom: 1px solid #e2e8f0;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.modal-header.bg-light {
    background: #f8fafc;
}

.modal-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--primary-color);
    margin: 0;
}

.modal-body {
    padding: 1.5rem;
}

.modal-footer {
    padding: 1.25rem 1.5rem;
    border-top: 1px solid #e2e8f0;
    display: flex;
    justify-content: flex-end;
    gap: 0.75rem;
}

.btn-secondary {
    background: #e2e8f0;
    border: none;
    color: #475569;
    padding: 0.75rem 1.5rem;
    border-radius: 10px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-secondary:hover {
    background: #cbd5e1;
}

@media (max-width: 992px) {
    .auth-container {
        max-width: 95%;
    }
}

@media (max-width: 768px) {
    .auth-container {
        flex-direction: column;
        max-width: 100%;
        margin: 1rem;
    }

    .auth-left {
        padding: 2rem;
    }

    .welcome-features,
    .welcome-stats {
        padding: 1.5rem;
    }

    .welcome-stats {
        flex-wrap: wrap;
        gap: 1rem;
    }

    .stat {
        flex: 1 1 calc(50% - 0.5rem);
    }

    .auth-right {
        padding: 2rem;
    }
}

@media (max-width: 480px) {
    .welcome-stats {
        flex-direction: column;
        gap: 1rem;
    }

    .stat {
        width: 100%;
    }

    .form-options {
        flex-direction: column;
        gap: 1rem;
        align-items: flex-start;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle password visibility
    const togglePassword = document.getElementById('togglePassword');
    if (togglePassword) {
        togglePassword.addEventListener('click', function() {
            const password = document.getElementById('password');
            const icon = this.querySelector('i');

            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    }

    // Modal functionality
    const modalTriggers = document.querySelectorAll('[data-bs-toggle="modal"]');
    const modals = document.querySelectorAll('.modal');

    modalTriggers.forEach(trigger => {
        trigger.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('data-bs-target');
            const modal = document.querySelector(targetId);
            if (modal) {
                modal.classList.add('show');
            }
        });
    });

    // Close modal with close button
    document.querySelectorAll('[data-bs-dismiss="modal"]').forEach(btn => {
        btn.addEventListener('click', function() {
            const modal = this.closest('.modal');
            if (modal) {
                modal.classList.remove('show');
            }
        });
    });

    // Close modal when clicking outside
    modals.forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.remove('show');
            }
        });
    });

    // Auto-dismiss alerts after 5 seconds
    document.querySelectorAll('.alert-dismissible').forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.3s ease';
            alert.style.opacity = '0';
            setTimeout(() => {
                alert.remove();
            }, 300);
        }, 5000);
    });

    // Close alert with close button
    document.querySelectorAll('.alert .btn-close').forEach(btn => {
        btn.addEventListener('click', function() {
            const alert = this.closest('.alert');
            if (alert) {
                alert.remove();
            }
        });
    });
});
</script>