<div class="auth-page">
    <div class="auth-container">
        <div class="auth-left">
            <div class="welcome-content">
                <div class="brand-section">
                    <div class="brand-logo">
                        <i class="fas fa-graduation-cap fa-3x text-primary"></i>
                    </div>
                    <h1 class="brand-title"><?php echo APP_NAME; ?></h1>
                    <p class="brand-subtitle">National Association of Yungur Students</p>
                </div>

                <div class="welcome-features">
                    <div class="feature-item">
                        <i class="fas fa-users text-primary"></i>
                        <span>Join Our Community</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-handshake text-success"></i>
                        <span>Network & Connect</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-lightbulb text-info"></i>
                        <span>Learn & Grow</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-award text-warning"></i>
                        <span>Achieve Excellence</span>
                    </div>
                </div>

                <div class="welcome-stats">
                    <div class="stat">
                        <div class="stat-number">5,000+</div>
                        <div class="stat-label">Active Members</div>
                    </div>
                    <div class="stat">
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Branches</div>
                    </div>
                    <div class="stat">
                        <div class="stat-number">20+</div>
                        <div class="stat-label">Countries</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="auth-right">
            <div class="auth-card">
                <div class="auth-header">
                    <h4 class="mb-2">Join Our Community</h4>
                    <p class="text-muted mb-0">Create your account and start your journey</p>
                </div>

                <div class="auth-body">
                    <?php if ($error = flash('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show">
                            <i class="fas fa-exclamation-triangle me-2"></i><?php echo $error; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <?php if ($errors = flash('errors')): ?>
                        <div class="alert alert-danger alert-dismissible fade show">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <ul class="mb-0">
                                <?php foreach($errors as $field => $fieldErrors): ?>
                                    <?php foreach($fieldErrors as $error): ?>
                                        <li><?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo url('register'); ?>" id="registerForm" class="auth-form">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name" class="form-label">
                                        <i class="fas fa-user me-2"></i>First Name *
                                    </label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                           value="<?php echo old('first_name'); ?>" required
                                           placeholder="Enter your first name">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name" class="form-label">
                                        <i class="fas fa-user me-2"></i>Last Name *
                                    </label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                           value="<?php echo old('last_name'); ?>" required
                                           placeholder="Enter your last name">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope me-2"></i>Email Address *
                            </label>
                            <input type="email" class="form-control" id="email" name="email"
                                   value="<?php echo old('email'); ?>" required
                                   placeholder="Enter your email address">
                            <small class="form-text text-muted">We'll send a verification link to this email</small>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="form-label">
                                <i class="fas fa-phone me-2"></i>Phone Number *
                            </label>
                            <input type="tel" class="form-control" id="phone" name="phone"
                                   value="<?php echo old('phone'); ?>" required
                                   placeholder="Enter your phone number">
                        </div>

                        <div class="form-group">
                            <label for="member_type" class="form-label">
                                <i class="fas fa-graduation-cap me-2"></i>Member Type *
                            </label>
                            <select class="form-select" id="member_type" name="member_type" required>
                                <option value="">Select Member Type</option>
                                <?php foreach($member_types as $value => $label): ?>
                                    <option value="<?php echo $value; ?>" <?php echo old('member_type') == $value ? 'selected' : ''; ?>>
                                        <?php echo $label; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="form-label">
                                        <i class="fas fa-lock me-2"></i>Password *
                                    </label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password" required
                                               placeholder="Create a password">
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    <div id="password-strength" class="mt-2"></div>
                                    <small class="form-text text-muted">Minimum 8 characters with numbers and symbols</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="confirm_password" class="form-label">
                                        <i class="fas fa-lock me-2"></i>Confirm Password *
                                    </label>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required
                                           placeholder="Confirm your password">
                                    <div id="password-match" class="mt-2"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="agree_terms" name="agree_terms" required>
                                <label class="form-check-label" for="agree_terms">
                                    I agree to the <a href="#" target="_blank" class="text-decoration-none">Terms and Conditions</a> and
                                    <a href="#" target="_blank" class="text-decoration-none">Privacy Policy</a>
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-user-plus me-2"></i>Create Account
                        </button>
                    </form>

                    <div class="auth-divider">
                        <span>or</span>
                    </div>

                    <div class="social-login">
                        <button class="btn btn-outline-primary w-100 mb-2">
                            <i class="fab fa-google me-2"></i>Continue with Google
                        </button>
                        <button class="btn btn-outline-primary w-100">
                            <i class="fab fa-facebook me-2"></i>Continue with Facebook
                        </button>
                    </div>

                    <div class="auth-footer">
                        <span class="text-muted">Already have an account?</span>
                        <a href="<?php echo url('login'); ?>" class="text-decoration-none fw-bold ms-1">
                            Sign In
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.auth-page {
    min-height: 100vh;
    background: linear-gradient(135deg, var(--green-50) 0%, var(--green-100) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem 0;
}

.auth-container {
    display: flex;
    max-width: 1200px;
    width: 100%;
    min-height: 700px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    border-radius: 20px;
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

.brand-logo {
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    width: 80px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    backdrop-filter: blur(10px);
}

.brand-title {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.brand-subtitle {
    opacity: 0.9;
    font-size: 0.9rem;
}

.welcome-features {
    margin-bottom: 3rem;
}

.feature-item {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
    font-weight: 500;
}

.feature-item i {
    margin-right: 0.5rem;
    font-size: 1.2rem;
}

.welcome-stats {
    display: flex;
    justify-content: space-around;
    margin-top: 2rem;
}

.stat {
    text-align: center;
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    display: block;
}

.stat-label {
    font-size: 0.8rem;
    opacity: 0.9;
}

.auth-right {
    flex: 1;
    padding: 3rem;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow-y: auto;
}

.auth-card {
    width: 100%;
    max-width: 500px;
}

.auth-header {
    text-align: center;
    margin-bottom: 2rem;
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
}

.form-control, .form-select {
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 0.75rem 1rem;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
    transform: translateY(-2px);
}

.input-group .btn {
    border: 2px solid #e9ecef;
    border-left: none;
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(40, 167, 69, 0.3);
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
    background: #e9ecef;
}

.auth-divider span {
    background: white;
    padding: 0 1rem;
    color: #6c757d;
    font-size: 0.9rem;
}

.social-login {
    margin-bottom: 2rem;
}

.btn-outline-primary {
    border: 2px solid var(--primary-color);
    color: var(--primary-color);
    border-radius: 10px;
}

.btn-outline-primary:hover {
    background: var(--primary-color);
    border-color: var(--primary-color);
}

.auth-footer {
    text-align: center;
    padding-top: 1rem;
    border-top: 1px solid #e9ecef;
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

    .welcome-stats {
        flex-wrap: wrap;
        gap: 1rem;
    }

    .auth-right {
        padding: 2rem;
    }
}
</style>

<script>
// Password strength indicator
document.getElementById('password').addEventListener('input', function() {
    const password = this.value;
    const strengthDiv = document.getElementById('password-strength');

    let strength = 0;
    let feedback = [];

    if (password.length >= 8) strength++;
    else feedback.push('At least 8 characters');

    if (/[a-z]/.test(password)) strength++;
    else feedback.push('Lowercase letter');

    if (/[A-Z]/.test(password)) strength++;
    else feedback.push('Uppercase letter');

    if (/[0-9]/.test(password)) strength++;
    else feedback.push('Number');

    if (/[^A-Za-z0-9]/.test(password)) strength++;
    else feedback.push('Special character');

    let color, text;
    switch(strength) {
        case 0:
        case 1:
            color = 'text-danger';
            text = 'Very Weak';
            break;
        case 2:
            color = 'text-warning';
            text = 'Weak';
            break;
        case 3:
            color = 'text-info';
            text = 'Fair';
            break;
        case 4:
            color = 'text-primary';
            text = 'Good';
            break;
        case 5:
            color = 'text-success';
            text = 'Strong';
            break;
    }

    strengthDiv.innerHTML = `<small class="${color}"><i class="fas fa-key me-1"></i>${text}</small>`;
});

// Password confirmation
document.getElementById('confirm_password').addEventListener('input', function() {
    const confirmPassword = this.value;
    const password = document.getElementById('password').value;
    const matchDiv = document.getElementById('password-match');

    if (confirmPassword === '') {
        matchDiv.innerHTML = '';
        return;
    }

    if (confirmPassword === password) {
        matchDiv.innerHTML = '<small class="text-success"><i class="fas fa-check me-1"></i>Passwords match</small>';
    } else {
        matchDiv.innerHTML = '<small class="text-danger"><i class="fas fa-times me-1"></i>Passwords do not match</small>';
    }
});

// Toggle password visibility
document.getElementById('togglePassword').addEventListener('click', function() {
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
</script>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('password').addEventListener('keyup', function() {
    var password = this.value;
    var strength = 0;
    
    if (password.length >= 8) strength += 1;
    if (password.match(/[a-z]+/)) strength += 1;
    if (password.match(/[A-Z]+/)) strength += 1;
    if (password.match(/[0-9]+/)) strength += 1;
    if (password.match(/[$@#&!]+/)) strength += 1;
    
    var meter = document.getElementById('password-strength');
    var width = (strength / 5) * 100;
    var color = '#dc3545';
    
    if (strength >= 4) color = '#28a745';
    else if (strength >= 3) color = '#ffc107';
    
    meter.innerHTML = '<div class="progress"><div class="progress-bar" style="width: ' + width + '%; background-color: ' + color + ';"></div></div>';
});
</script>