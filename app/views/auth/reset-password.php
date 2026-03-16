<div class="auth-page">
    <div class="auth-container">
        <!-- Left side - Branding -->
        <div class="auth-left">
            <div class="welcome-content">
                <div class="brand-section">
                    <h1 class="brand-title">NAYS 2.0</h1>
                    <p class="brand-subtitle">National Association of Yung Students</p>
                </div>

                <div class="welcome-features">
                    <div class="feature-item">
                        <i class="fas fa-lock"></i>
                        <span>Secure password reset</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-shield-alt"></i>
                        <span>Enhanced security</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Strong password required</span>
                    </div>
                </div>

                <div class="password-requirements">
                    <h5>Password Requirements:</h5>
                    <ul>
                        <li><i class="fas fa-circle" id="req-length"></i> At least 8 characters</li>
                        <li><i class="fas fa-circle" id="req-lower"></i> At least 1 lowercase letter</li>
                        <li><i class="fas fa-circle" id="req-upper"></i> At least 1 uppercase letter</li>
                        <li><i class="fas fa-circle" id="req-number"></i> At least 1 number</li>
                        <li><i class="fas fa-circle" id="req-special"></i> At least 1 special character</li>
                    </ul>
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
                </div>
            </div>
        </div>

        <!-- Right side - Reset Password Form -->
        <div class="auth-right">
            <div class="auth-card">
                <div class="auth-header">
                    <div class="auth-icon">
                        <i class="fas fa-key"></i>
                    </div>
                    <h4 class="mb-2">Create New Password</h4>
                    <p class="text-muted mb-0">Enter your new password below</p>
                </div>

                <div class="auth-body">
                    <!-- Error Alerts -->
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
                    
                    <form method="POST" action="<?php echo url('reset-password'); ?>" class="auth-form" id="passwordForm">
                        <?php echo csrf_field(); ?>
                        
                        <input type="hidden" name="token" value="<?php echo $token; ?>">
                        
                        <!-- Password Field -->
                        <div class="form-group">
                            <label for="password" class="form-label">
                                <i class="fas fa-lock me-2"></i>New Password *
                            </label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" required
                                       placeholder="Enter new password">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div id="password-strength" class="mt-2"></div>
                            <small class="password-hint">
                                <i class="fas fa-info-circle me-1"></i>Min 8 characters with mixed case, numbers & symbols
                            </small>
                        </div>
                        
                        <!-- Confirm Password Field -->
                        <div class="form-group">
                            <label for="confirm_password" class="form-label">
                                <i class="fas fa-check-circle me-2"></i>Confirm New Password *
                            </label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required
                                       placeholder="Confirm new password">
                                <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div id="password-match" class="mt-2"></div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100" id="submitBtn">
                            <i class="fas fa-sync-alt me-2"></i>Reset Password
                        </button>
                    </form>
                    
                    <div class="auth-divider">
                        <span>or</span>
                    </div>
                    
                    <div class="auth-footer">
                        <p class="mb-0">
                            <a href="<?php echo url('login'); ?>" class="text-decoration-none">
                                <i class="fas fa-arrow-left me-2"></i>Back to Login
                            </a>
                        </p>
                    </div>
                </div>
            </div>
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
    --gray-50: #f8fafc;
    --gray-100: #f1f5f9;
    --gray-200: #e2e8f0;
    --gray-300: #cbd5e1;
    --gray-400: #94a3b8;
    --gray-500: #64748b;
    --gray-600: #475569;
    --gray-700: #334155;
    --danger: #dc2626;
    --danger-light: #fee2e2;
    --success: #15803d;
    --success-light: #dcfce7;
    --warning: #d97706;
    --warning-light: #fef3c7;
    --info: #2563eb;
    --info-light: #dbeafe;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
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

/* Left Side - Branding */
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
    margin-bottom: 2rem;
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
    margin-bottom: 2rem;
    text-align: left;
    background: rgba(255,255,255,0.1);
    padding: 1.5rem;
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

/* Password Requirements List */
.password-requirements {
    margin-bottom: 2rem;
    text-align: left;
    background: rgba(0,0,0,0.2);
    padding: 1.5rem;
    border-radius: 16px;
}

.password-requirements h5 {
    color: var(--secondary-color);
    margin-bottom: 1rem;
    font-size: 1rem;
}

.password-requirements ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.password-requirements li {
    display: flex;
    align-items: center;
    margin-bottom: 0.75rem;
    font-size: 0.9rem;
    color: rgba(255,255,255,0.9);
}

.password-requirements li i {
    font-size: 0.6rem;
    margin-right: 0.75rem;
    color: var(--gray-400);
}

.password-requirements li i.valid {
    color: var(--success-light);
}

.welcome-stats {
    display: flex;
    justify-content: space-around;
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

/* Right Side - Form */
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

.auth-icon {
    width: 80px;
    height: 80px;
    background: var(--green-50);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
}

.auth-icon i {
    font-size: 2.5rem;
    color: var(--primary-color);
}

.auth-header h4 {
    color: var(--primary-color);
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.auth-header .text-muted {
    color: var(--gray-500);
}

/* Form Styles */
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
    border: 2px solid var(--gray-200);
    border-radius: 12px;
    padding: 0.75rem 1rem;
    font-size: 1rem;
    transition: all 0.3s ease;
    width: 100%;
    font-family: 'Inter', sans-serif;
}

.form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 4px rgba(27, 77, 62, 0.1);
    outline: none;
}

.form-control::placeholder {
    color: var(--gray-400);
}

.form-control.is-valid {
    border-color: var(--success);
}

.form-control.is-invalid {
    border-color: var(--danger);
}

/* Input Group */
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
    border: 2px solid var(--gray-200);
    border-left: none;
    border-radius: 0 12px 12px 0;
    background: white;
    color: var(--gray-500);
    padding: 0 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    cursor: pointer;
}

.input-group .btn:hover {
    background: var(--gray-100);
    color: var(--primary-color);
}

/* Password Strength Meter */
#password-strength {
    margin-top: 0.5rem;
}

.progress {
    height: 4px;
    background: var(--gray-200);
    border-radius: 2px;
    overflow: hidden;
}

.progress-bar {
    height: 100%;
    transition: width 0.3s ease;
}

/* Password Hint */
.password-hint {
    display: block;
    color: var(--gray-500);
    font-size: 0.8rem;
    margin-top: 0.5rem;
}

/* Password Match Indicator */
#password-match {
    font-size: 0.85rem;
    margin-top: 0.5rem;
}

.match-success {
    color: var(--success);
}

.match-error {
    color: var(--danger);
}

/* Button Styles */
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
    font-family: 'Inter', sans-serif;
}

.btn-primary:hover:not(:disabled) {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(27, 77, 62, 0.3);
}

.btn-primary:active:not(:disabled) {
    transform: translateY(0);
}

.btn-primary:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

/* Alert Styles */
.alert {
    padding: 1rem;
    border-radius: 12px;
    margin-bottom: 1.5rem;
    position: relative;
    display: flex;
    align-items: center;
    animation: slideIn 0.3s ease;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.alert-danger {
    background: var(--danger-light);
    border: 1px solid var(--danger);
    color: var(--danger);
}

.alert-success {
    background: var(--success-light);
    border: 1px solid var(--success);
    color: var(--success);
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
    opacity: 0.7;
    transition: opacity 0.2s;
}

.btn-close:hover {
    opacity: 1;
}

/* Divider */
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
    background: var(--gray-200);
}

.auth-divider span {
    background: white;
    padding: 0 1rem;
    color: var(--gray-500);
    font-size: 0.95rem;
    position: relative;
    z-index: 1;
}

/* Footer Links */
.auth-footer {
    text-align: center;
}

.auth-footer a {
    color: var(--primary-color);
    transition: color 0.2s;
    display: inline-flex;
    align-items: center;
}

.auth-footer a:hover {
    color: var(--primary-dark);
}

.text-muted {
    color: var(--gray-500);
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

.me-2 {
    margin-right: 0.5rem;
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

.w-100 {
    width: 100%;
}

/* Responsive Design */
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
    .password-requirements,
    .welcome-stats {
        padding: 1.5rem;
    }

    .auth-right {
        padding: 2rem;
    }
}

@media (max-width: 480px) {
    .auth-header h4 {
        font-size: 1.5rem;
    }

    .auth-icon {
        width: 60px;
        height: 60px;
    }

    .auth-icon i {
        font-size: 2rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm_password');
    const togglePassword = document.getElementById('togglePassword');
    const toggleConfirm = document.getElementById('toggleConfirmPassword');
    const submitBtn = document.getElementById('submitBtn');
    const form = document.getElementById('passwordForm');
    
    // Password strength requirements elements
    const reqLength = document.getElementById('req-length');
    const reqLower = document.getElementById('req-lower');
    const reqUpper = document.getElementById('req-upper');
    const reqNumber = document.getElementById('req-number');
    const reqSpecial = document.getElementById('req-special');
    
    // Toggle password visibility
    if (togglePassword) {
        togglePassword.addEventListener('click', function() {
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
    
    if (toggleConfirm) {
        toggleConfirm.addEventListener('click', function() {
            const icon = this.querySelector('i');
            if (confirmPassword.type === 'password') {
                confirmPassword.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                confirmPassword.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    }
    
    // Password strength checker
    if (password) {
        password.addEventListener('keyup', function() {
            const value = this.value;
            let strength = 0;
            
            // Check requirements
            const hasLength = value.length >= 8;
            const hasLower = /[a-z]/.test(value);
            const hasUpper = /[A-Z]/.test(value);
            const hasNumber = /[0-9]/.test(value);
            const hasSpecial = /[$@#&!%*?\-_]/.test(value);
            
            // Update requirement indicators
            updateRequirement(reqLength, hasLength);
            updateRequirement(reqLower, hasLower);
            updateRequirement(reqUpper, hasUpper);
            updateRequirement(reqNumber, hasNumber);
            updateRequirement(reqSpecial, hasSpecial);
            
            // Calculate strength
            if (hasLength) strength++;
            if (hasLower) strength++;
            if (hasUpper) strength++;
            if (hasNumber) strength++;
            if (hasSpecial) strength++;
            
            // Update strength meter
            updateStrengthMeter(strength);
            
            // Check password match
            checkPasswordMatch();
        });
    }
    
    // Confirm password match
    if (confirmPassword) {
        confirmPassword.addEventListener('keyup', checkPasswordMatch);
    }
    
    function updateRequirement(element, isValid) {
        if (element) {
            if (isValid) {
                element.className = 'fas fa-check-circle valid';
                element.style.color = '#28a745';
            } else {
                element.className = 'fas fa-circle';
                element.style.color = '';
            }
        }
    }
    
    function updateStrengthMeter(strength) {
        const meter = document.getElementById('password-strength');
        if (!meter) return;
        
        const width = (strength / 5) * 100;
        let color = '#dc3545'; // red
        let message = 'Very Weak';
        
        if (strength === 0) {
            message = 'Enter password';
            color = '#64748b';
        } else if (strength === 1) {
            message = 'Weak';
            color = '#dc3545';
        } else if (strength === 2) {
            message = 'Fair';
            color = '#ffc107';
        } else if (strength === 3) {
            message = 'Good';
            color = '#17a2b8';
        } else if (strength === 4) {
            message = 'Strong';
            color = '#28a745';
        } else if (strength === 5) {
            message = 'Very Strong';
            color = '#28a745';
        }
        
        meter.innerHTML = `
            <div class="progress">
                <div class="progress-bar" style="width: ${width}%; background-color: ${color};"></div>
            </div>
            <small style="color: ${color}; margin-top: 4px; display: block;">${message}</small>
        `;
    }
    
    function checkPasswordMatch() {
        const matchDiv = document.getElementById('password-match');
        if (!matchDiv || !password || !confirmPassword) return;
        
        if (confirmPassword.value === '') {
            matchDiv.innerHTML = '';
            return;
        }
        
        if (password.value === confirmPassword.value) {
            matchDiv.innerHTML = '<span class="match-success"><i class="fas fa-check-circle me-1"></i>Passwords match</span>';
            confirmPassword.classList.add('is-valid');
            confirmPassword.classList.remove('is-invalid');
        } else {
            matchDiv.innerHTML = '<span class="match-error"><i class="fas fa-exclamation-circle me-1"></i>Passwords do not match</span>';
            confirmPassword.classList.add('is-invalid');
            confirmPassword.classList.remove('is-valid');
        }
    }
    
    // Form validation
    if (form) {
        form.addEventListener('submit', function(e) {
            if (password.value !== confirmPassword.value) {
                e.preventDefault();
                alert('Passwords do not match!');
            }
            
            if (password.value.length < 8) {
                e.preventDefault();
                alert('Password must be at least 8 characters long!');
            }
        });
    }
    
    // Auto-dismiss alerts after 5 seconds
    document.querySelectorAll('.alert-dismissible').forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.3s ease';
            alert.style.opacity = '0';
            setTimeout(() => {
                if (alert.parentNode) {
                    alert.remove();
                }
            }, 300);
        }, 5000);
    });

    // Close alert with close button
    document.querySelectorAll('.alert .btn-close').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const alert = this.closest('.alert');
            if (alert) {
                alert.remove();
            }
        });
    });
});
</script>