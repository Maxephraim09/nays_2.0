<div class="auth-page">
    <div class="auth-container register-container">
        <!-- Left side - Branding -->
        <div class="auth-left">
            <div class="welcome-content">
                <div class="brand-section">
                    <h1 class="brand-title">NAYS 2.0</h1>
                    <p class="brand-subtitle">National Association of Yung Students</p>
                </div>

                <div class="welcome-features">
                    <div class="feature-item">
                        <i class="fas fa-user"></i>
                        <span>Personal Information</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-phone"></i>
                        <span>Contact Details</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Location Information</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-lock"></i>
                        <span>Account Security</span>
                    </div>
                </div>

                <div class="registration-steps">
                    <h5>Registration Progress</h5>
                    <div class="steps-indicator">
                        <div class="step completed">
                            <div class="step-number"><i class="fas fa-check"></i></div>
                            <div class="step-label">Member Type</div>
                        </div>
                        <div class="step-connector completed"></div>
                        <div class="step active">
                            <div class="step-number">2</div>
                            <div class="step-label">Basic Info</div>
                        </div>
                        <div class="step-connector"></div>
                        <div class="step">
                            <div class="step-number">3</div>
                            <div class="step-label">Education</div>
                        </div>
                        <div class="step-connector"></div>
                        <div class="step">
                            <div class="step-number">4</div>
                            <div class="step-label">Documents</div>
                        </div>
                        <div class="step-connector"></div>
                        <div class="step">
                            <div class="step-number">5</div>
                            <div class="step-label">Payment</div>
                        </div>
                    </div>
                </div>

                <div class="info-box-side">
                    <i class="fas fa-shield-alt"></i>
                    <div class="info-content">
                        <h6>Secure Registration</h6>
                        <p>Your information is encrypted and securely stored</p>
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
                </div>
            </div>
        </div>

        <!-- Right side - Registration Form -->
        <div class="auth-right">
            <div class="auth-card register-card">
                <div class="auth-header">
                    <div class="auth-icon">
                        <i class="fas fa-user-edit"></i>
                    </div>
                    <h4 class="mb-2">Basic Information</h4>
                    <p class="text-muted mb-0">Step 2: Enter your personal details</p>
                </div>

                <div class="auth-body">
                    <!-- Error Alerts -->
                    <?php if ($error = flash('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i><?php echo $error; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($errors = flash('errors')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>Please fix the following errors:</strong>
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
                    
                    <!-- Progress Bar -->
                    <div class="progress-container mb-4">
                        <div class="progress-info">
                            <span>Step 2 of 5</span>
                            <span>40% Complete</span>
                        </div>
                        <div class="progress-bar-custom">
                            <div class="progress-fill" style="width: 40%"></div>
                        </div>
                    </div>
                    
                    <form method="POST" action="<?php echo url('register/step2'); ?>" id="registrationForm" class="auth-form"><br><br><br><br>
                        <?php echo csrf_field(); ?>
                        
                        <!-- Name Fields -->
                        <div class="form-row"> 
                            <div class="form-group">
                                <label for="first_name" class="form-label">
                                    <i class="fas fa-user me-2"></i>First Name *
                                </label>
                                <input type="text" class="form-control" id="first_name" name="first_name" 
                                       value="<?php echo old('first_name'); ?>" required placeholder="Enter your first name">
                            </div>
                            
                            <div class="form-group">
                                <label for="last_name" class="form-label">
                                    <i class="fas fa-user me-2"></i>Last Name *
                                </label>
                                <input type="text" class="form-control" id="last_name" name="last_name" 
                                       value="<?php echo old('last_name'); ?>" required placeholder="Enter your last name">
                            </div>
                        </div>
                        
                        <!-- Middle Name -->
                        <div class="form-group">
                            <label for="middle_name" class="form-label">
                                <i class="fas fa-user me-2"></i>Middle Name
                            </label>
                            <input type="text" class="form-control" id="middle_name" name="middle_name" 
                                   value="<?php echo old('middle_name'); ?>" placeholder="Enter your middle name (optional)">
                        </div>
                        
                        <!-- Date of Birth & Gender -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="date_of_birth" class="form-label">
                                    <i class="fas fa-calendar-alt me-2"></i>Date of Birth *
                                </label>
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" 
                                       value="<?php echo old('date_of_birth'); ?>" required max="<?php echo date('Y-m-d', strtotime('-10 years')); ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="gender" class="form-label">
                                    <i class="fas fa-venus-mars me-2"></i>Gender *
                                </label>
                                <select class="form-select" id="gender" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="male" <?php echo old('gender') == 'male' ? 'selected' : ''; ?>>Male</option>
                                    <option value="female" <?php echo old('gender') == 'female' ? 'selected' : ''; ?>>Female</option>
                                    <option value="other" <?php echo old('gender') == 'other' ? 'selected' : ''; ?>>Other</option>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Contact Information -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone" class="form-label">
                                    <i class="fas fa-phone me-2"></i>Phone Number *
                                </label>
                                <input type="tel" class="form-control" id="phone" name="phone" 
                                       value="<?php echo old('phone'); ?>" placeholder="08012345678" required>
                                <small class="form-hint">Nigerian mobile number (e.g., 08012345678)</small>
                            </div>
                            
                            <div class="form-group">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope me-2"></i>Email Address *
                                </label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       value="<?php echo old('email'); ?>" placeholder="you@example.com" required>
                            </div>
                        </div>
                        
                        <!-- Location Information -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="state_of_origin" class="form-label">
                                    <i class="fas fa-map-marker-alt me-2"></i>State of Origin *
                                </label>
                                <select class="form-select" id="state_of_origin" name="state_of_origin" required>
                                    <option value="">Select State</option>
                                    <?php 
                                    $states = ['Adamawa', 'Lagos', 'Abuja', 'Kano', 'Rivers', 'Kaduna', 'Oyo', 'Benue'];
                                    foreach($states as $state): ?>
                                        <option value="<?php echo $state; ?>" <?php echo old('state_of_origin') == $state ? 'selected' : ''; ?>>
                                            <?php echo $state; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="lga" class="form-label">
                                    <i class="fas fa-map-pin me-2"></i>LGA *
                                </label>
                                <select class="form-select" id="lga" name="lga" required>
                                    <option value="">Select LGA</option>
                                </select>
                            </div>
                        </div>
                        
                        <!-- Hometown -->
                        <div class="form-group">
                            <label for="hometown" class="form-label">
                                <i class="fas fa-home me-2"></i>Hometown/Town *
                            </label>
                            <input type="text" class="form-control" id="hometown" name="hometown" 
                                   value="<?php echo old('hometown'); ?>" required placeholder="Enter your hometown">
                        </div>
                        
                        <!-- Password Fields -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock me-2"></i>Password *
                                </label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" 
                                           placeholder="Create a strong password" required>
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div id="password-strength" class="mt-2"></div>
                                <div class="password-requirements-mini">
                                    <small><i class="fas fa-circle" id="req-length"></i> 8+ characters</small>
                                    <small><i class="fas fa-circle" id="req-lower"></i> Lowercase</small>
                                    <small><i class="fas fa-circle" id="req-upper"></i> Uppercase</small>
                                    <small><i class="fas fa-circle" id="req-number"></i> Number</small>
                                    <small><i class="fas fa-circle" id="req-special"></i> Special</small>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="confirm_password" class="form-label">
                                    <i class="fas fa-check-circle me-2"></i>Confirm Password *
                                </label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" 
                                           placeholder="Re-enter your password" required>
                                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div id="password-match" class="mt-2"></div>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <a href="<?php echo url('register/step1'); ?>" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Continue <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </form>
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
    max-width: 1400px;
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

/* Registration Steps */
.registration-steps {
    margin-bottom: 2rem;
    background: rgba(0,0,0,0.2);
    padding: 1.5rem;
    border-radius: 16px;
}

.registration-steps h5 {
    color: var(--secondary-color);
    margin-bottom: 1.5rem;
    font-size: 1rem;
    text-align: left;
}

.steps-indicator {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.step {
    display: flex;
    flex-direction: column;
    align-items: center;
    flex: 1;
}

.step-number {
    width: 32px;
    height: 32px;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: white;
    transition: all 0.3s ease;
}

.step.completed .step-number {
    background: var(--success);
    color: white;
}

.step.active .step-number {
    background: var(--secondary-color);
    color: var(--primary-color);
    transform: scale(1.1);
}

.step-label {
    font-size: 0.7rem;
    color: rgba(255,255,255,0.8);
    text-align: center;
}

.step-connector {
    height: 2px;
    background: rgba(255,255,255,0.2);
    flex: 0.5;
    margin: 0 0.5rem;
    margin-bottom: 1.5rem;
}

.step-connector.completed {
    background: var(--success);
}

/* Info Box Side */
.info-box-side {
    background: rgba(255,255,255,0.1);
    border-radius: 12px;
    padding: 1rem;
    margin-bottom: 2rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    text-align: left;
}

.info-box-side i {
    font-size: 2rem;
    color: var(--secondary-color);
}

.info-content h6 {
    color: white;
    margin-bottom: 0.25rem;
    font-size: 0.95rem;
}

.info-content p {
    color: rgba(255,255,255,0.8);
    font-size: 0.8rem;
    margin: 0;
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
    flex: 1.2;
    padding: 3rem;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow-y: auto;
    max-height: 100vh;
}

.auth-card {
    width: 100%;
    max-width: 700px;
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

/* Progress Bar */
.progress-container {
    margin-bottom: 2rem;
}

.progress-info {
    display: flex;
    justify-content: space-between;
    margin-bottom: 0.5rem;
    font-size: 0.9rem;
    color: var(--gray-600);
}

.progress-bar-custom {
    height: 8px;
    background: var(--gray-200);
    border-radius: 20px;
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    background: linear-gradient(90deg, var(--primary-color), var(--primary-light));
    border-radius: 20px;
    transition: width 0.3s ease;
}

/* Form Styles */
.auth-form {
    width: 100%;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
    margin-bottom: 1rem;
}

.form-group {
    margin-bottom: 1rem;
}

.form-label {
    font-weight: 600;
    color: var(--dark-color);
    margin-bottom: 0.5rem;
    display: block;
    font-size: 0.95rem;
}

.form-control, .form-select {
    border: 2px solid var(--gray-200);
    border-radius: 12px;
    padding: 0.75rem 1rem;
    font-size: 1rem;
    transition: all 0.3s ease;
    width: 100%;
    font-family: 'Inter', sans-serif;
}

.form-control:focus, .form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 4px rgba(27, 77, 62, 0.1);
    outline: none;
}

.form-control::placeholder {
    color: var(--gray-400);
}

.form-hint {
    display: block;
    color: var(--gray-500);
    font-size: 0.75rem;
    margin-top: 0.25rem;
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

/* Password Strength */
#password-strength {
    margin-top: 0.5rem;
}

.progress {
    height: 4px;
    background: var(--gray-200);
    border-radius: 2px;
    overflow: hidden;
    margin-bottom: 0.25rem;
}

.progress-bar {
    height: 100%;
    transition: width 0.3s ease;
}

.password-requirements-mini {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    margin-top: 0.5rem;
}

.password-requirements-mini small {
    display: flex;
    align-items: center;
    gap: 0.25rem;
    color: var(--gray-500);
    font-size: 0.7rem;
}

.password-requirements-mini small i {
    font-size: 0.5rem;
    color: var(--gray-400);
}

.password-requirements-mini small i.valid {
    color: var(--success);
}

#password-match {
    font-size: 0.8rem;
}

.match-success {
    color: var(--success);
}

.match-error {
    color: var(--danger);
}

/* Form Actions */
.form-actions {
    display: flex;
    gap: 1rem;
    justify-content: space-between;
    margin-top: 2rem;
}

/* Button Styles */
.btn-primary {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    border: none;
    padding: 0.875rem 2rem;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1rem;
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-family: 'Inter', sans-serif;
    text-decoration: none;
    flex: 1;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(27, 77, 62, 0.3);
}

.btn-primary:active {
    transform: translateY(0);
}

.btn-outline-secondary {
    background: transparent;
    border: 2px solid var(--gray-300);
    color: var(--gray-600);
    padding: 0.875rem 2rem;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    flex: 1;
}

.btn-outline-secondary:hover {
    background: var(--gray-100);
    border-color: var(--gray-400);
    transform: translateY(-2px);
}

/* Alert Styles */
.alert {
    padding: 1rem;
    border-radius: 12px;
    margin-bottom: 1.5rem;
    position: relative;
    display: block;
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

.alert-danger ul {
    margin-top: 0.5rem;
    padding-left: 1.5rem;
}

.alert-dismissible {
    padding-right: 3rem;
}

.btn-close {
    position: absolute;
    top: 1rem;
    right: 1rem;
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

/* Responsive */
@media (max-width: 1200px) {
    .form-row {
        grid-template-columns: 1fr;
    }
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
    .registration-steps,
    .welcome-stats {
        padding: 1.5rem;
    }

    .steps-indicator {
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .step {
        min-width: 60px;
    }

    .auth-right {
        padding: 2rem;
    }

    .form-actions {
        flex-direction: column;
    }

    .btn-primary,
    .btn-outline-secondary {
        width: 100%;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // LGA data
    const lgas = {
        'Adamawa': ['Yola North', 'Yola South', 'Girei', 'Jimeta', 'Mubi North', 'Mubi South', 'Michika', 'Madagali', 'Hong', 'Gombi', 'Song', 'Fufore', 'Demsa', 'Numan', 'Lamurde', 'Guyuk', 'Shelleng', 'Toungo', 'Mayo Belwa', 'Jada', 'Ganye'],
        'Lagos': ['Agege', 'Ajeromi-Ifelodun', 'Alimosho', 'Amuwo-Odofin', 'Apapa', 'Badagry', 'Epe', 'Eti-Osa', 'Ibeju-Lekki', 'Ifako-Ijaiye', 'Ikeja', 'Ikorodu', 'Kosofe', 'Lagos Island', 'Lagos Mainland', 'Mushin', 'Ojo', 'Oshodi-Isolo', 'Shomolu', 'Surulere'],
        'Abuja': ['Abaji', 'Bwari', 'Gwagwalada', 'Kuje', 'Kwali', 'Municipal Area Council'],
        'Kano': ['Dala', 'Fagge', 'Gwale', 'Kano Municipal', 'Nassarawa', 'Tarauni', 'Ungogo'],
        'Rivers': ['Port Harcourt', 'Obio-Akpor', 'Eleme', 'Ikwerre', 'Oyigbo', 'Tai', 'Gokana'],
        'Kaduna': ['Kaduna North', 'Kaduna South', 'Chikun', 'Igabi', 'Zaria', 'Sabon Gari'],
        'Oyo': ['Ibadan North', 'Ibadan South', 'Ibadan East', 'Ibadan West', 'Ogbomosho', 'Oyo East'],
        'Benue': ['Makurdi', 'Gboko', 'Oturkpo', 'Katsina-Ala', 'Vandeikya', 'Kwande']
    };

    // State change handler
    document.getElementById('state_of_origin').addEventListener('change', function() {
        const state = this.value;
        const lgaSelect = document.getElementById('lga');
        lgaSelect.innerHTML = '<option value="">Select LGA</option>';
        
        if (lgas[state]) {
            lgas[state].forEach(lga => {
                const option = document.createElement('option');
                option.value = lga;
                option.textContent = lga;
                lgaSelect.appendChild(option);
            });
        }
    });

    // Password strength meter
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm_password');
    
    // Requirement elements
    const reqLength = document.getElementById('req-length');
    const reqLower = document.getElementById('req-lower');
    const reqUpper = document.getElementById('req-upper');
    const reqNumber = document.getElementById('req-number');
    const reqSpecial = document.getElementById('req-special');
    
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
        let color = '#dc3545';
        let text = 'Weak';
        
        if (strength === 0) {
            text = 'Enter password';
            color = '#64748b';
        } else if (strength <= 2) {
            text = 'Weak';
            color = '#dc3545';
        } else if (strength <= 3) {
            text = 'Medium';
            color = '#ffc107';
        } else if (strength <= 4) {
            text = 'Strong';
            color = '#17a2b8';
        } else {
            text = 'Very Strong';
            color = '#28a745';
        }
        
        meter.innerHTML = `
            <div class="progress">
                <div class="progress-bar" style="width: ${width}%; background-color: ${color};"></div>
            </div>
            <small style="color: ${color};">${text}</small>
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
        } else {
            matchDiv.innerHTML = '<span class="match-error"><i class="fas fa-exclamation-circle me-1"></i>Passwords do not match</span>';
        }
    }
    
    // Toggle password visibility
    const togglePassword = document.getElementById('togglePassword');
    const toggleConfirm = document.getElementById('toggleConfirmPassword');
    
    if (togglePassword) {
        togglePassword.addEventListener('click', function() {
            const input = document.getElementById('password');
            const icon = this.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    }
    
    if (toggleConfirm) {
        toggleConfirm.addEventListener('click', function() {
            const input = document.getElementById('confirm_password');
            const icon = this.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    }
    
    // Auto-dismiss alerts
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