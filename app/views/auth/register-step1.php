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
                        <i class="fas fa-user-plus"></i>
                        <span>Join our community</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Access NAYS Academy</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-hand-holding-heart"></i>
                        <span>Support community projects</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-vote-yea"></i>
                        <span>Participate in elections</span>
                    </div>
                </div>

                <div class="registration-steps">
                    <h5>Registration Progress</h5>
                    <div class="steps-indicator">
                        <div class="step active">
                            <div class="step-number">1</div>
                            <div class="step-label">Member Type</div>
                        </div>
                        <div class="step-connector"></div>
                        <div class="step">
                            <div class="step-number">2</div>
                            <div class="step-label">Personal Info</div>
                        </div>
                        <div class="step-connector"></div>
                        <div class="step">
                            <div class="step-number">3</div>
                            <div class="step-label">Documents</div>
                        </div>
                        <div class="step-connector"></div>
                        <div class="step">
                            <div class="step-number">4</div>
                            <div class="step-label">Payment</div>
                        </div>
                        <div class="step-connector"></div>
                        <div class="step">
                            <div class="step-number">5</div>
                            <div class="step-label">Payment</div>
                        </div>
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

        <!-- Right side - Registration Form -->
        <div class="auth-right">
            <div class="auth-card register-card">
                <div class="auth-header">
                    <div class="auth-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h4 class="mb-2">Join NAYS</h4>
                    <p class="text-muted mb-0">Step 1: Select Member Type</p>
                </div>

                <div class="auth-body">
                    <!-- Error Alerts -->
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
                    
                    <div class="info-box mb-4">
                        <i class="fas fa-info-circle me-2"></i>
                        <span>Select your membership type to begin registration. Choose the option that best describes you.</span>
                    </div>
                    
                    <form method="POST" action="<?php echo url('register/step1'); ?>" class="auth-form" id="registrationForm">
                        <?php echo csrf_field(); ?>
                        
                        <div class="member-type-grid">
                            <?php 
                            $member_types = [
                                'secondary' => 'Secondary School Student',
                                'tertiary' => 'Tertiary Student',
                                'alumni' => 'Alumni / Graduate',
                                'diaspora' => 'Diaspora Student',
                                'honorary' => 'Honorary Member'
                            ];
                            
                            $descriptions = [
                                'secondary' => 'Currently enrolled in secondary school (JSS1-SSS3)',
                                'tertiary' => 'Currently enrolled in university, polytechnic, or college',
                                'alumni' => 'Graduated from tertiary institution',
                                'diaspora' => 'Yungur student living outside Nigeria',
                                'honorary' => 'Non-Yungur supporters/partners (limited privileges)'
                            ];
                            
                            $fees = [
                                'secondary' => '₦1,000/year',
                                'tertiary' => '₦2,000/year',
                                'alumni' => '₦5,000/year',
                                'diaspora' => '$20/year',
                                'honorary' => 'Custom amount'
                            ];
                            
                            foreach($member_types as $value => $label): 
                            ?>
                            <div class="member-type-card">
                                <input type="radio" name="member_type" id="type_<?php echo $value; ?>" 
                                       value="<?php echo $value; ?>" class="member-type-radio"
                                       <?php echo old('member_type') == $value ? 'checked' : ''; ?> required>
                                <label for="type_<?php echo $value; ?>" class="member-type-label">
                                    <div class="member-type-header">
                                        <?php
                                        $icons = [
                                            'secondary' => 'fas fa-school',
                                            'tertiary' => 'fas fa-university',
                                            'alumni' => 'fas fa-user-graduate',
                                            'diaspora' => 'fas fa-globe',
                                            'honorary' => 'fas fa-star'
                                        ];
                                        ?>
                                        <i class="<?php echo $icons[$value] ?? 'fas fa-user'; ?>"></i>
                                        <h5><?php echo $label; ?></h5>
                                    </div>
                                    <p class="member-type-description"><?php echo $descriptions[$value]; ?></p>
                                    <div class="member-type-footer">
                                        <span class="membership-fee"><?php echo $fees[$value]; ?></span>
                                        <span class="select-indicator">
                                            <i class="fas fa-check-circle"></i>
                                        </span>
                                    </div>
                                </label>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        
                        <div class="form-actions">
                            <a href="<?php echo url(''); ?>" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Continue <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </form>
                    
                    <div class="auth-divider">
                        <span>already have an account?</span>
                    </div>
                    
                    <div class="auth-footer">
                        <p class="mb-0">
                            <a href="<?php echo url('login'); ?>" class="text-decoration-none">
                                <i class="fas fa-sign-in-alt me-2"></i>Sign In Instead
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

.register-container {
    max-width: 1400px;
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
}

.auth-card {
    width: 100%;
    max-width: 600px;
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

/* Info Box */
.info-box {
    background: var(--info-light);
    border: 1px solid var(--info);
    border-radius: 12px;
    padding: 1rem;
    display: flex;
    align-items: center;
    color: var(--info);
    font-size: 0.95rem;
}

.info-box i {
    font-size: 1.2rem;
    flex-shrink: 0;
}

/* Member Type Grid */
.member-type-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1rem;
    margin-bottom: 2rem;
}

.member-type-card {
    position: relative;
    cursor: pointer;
}

.member-type-radio {
    position: absolute;
    opacity: 0;
    width: 0;
    height: 0;
}

.member-type-label {
    display: block;
    padding: 1.5rem;
    background: var(--gray-50);
    border: 2px solid var(--gray-200);
    border-radius: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
    height: 100%;
}

.member-type-radio:checked + .member-type-label {
    border-color: var(--primary-color);
    background: var(--green-50);
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(27, 77, 62, 0.15);
}

.member-type-radio:checked + .member-type-label .select-indicator i {
    color: var(--success);
    opacity: 1;
}

.member-type-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
}

.member-type-header i {
    font-size: 1.8rem;
    color: var(--primary-color);
}

.member-type-header h5 {
    color: var(--dark-color);
    font-weight: 600;
    margin: 0;
}

.member-type-description {
    color: var(--gray-500);
    font-size: 0.9rem;
    margin-bottom: 1rem;
    line-height: 1.5;
}

.member-type-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: auto;
}

.membership-fee {
    font-weight: 600;
    color: var(--primary-color);
    background: var(--green-100);
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.9rem;
}

.select-indicator i {
    color: var(--gray-400);
    font-size: 1.5rem;
    opacity: 0.5;
    transition: all 0.3s ease;
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
    text-transform: lowercase;
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

.me-2 {
    margin-right: 0.5rem;
}

.ms-2 {
    margin-left: 0.5rem;
}

.mb-0 {
    margin-bottom: 0;
}

.mb-4 {
    margin-bottom: 1.5rem;
}

.mt-2 {
    margin-top: 0.5rem;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .member-type-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 992px) {
    .auth-container {
        max-width: 95%;
    }
    
    .member-type-grid {
        grid-template-columns: 1fr;
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

    .member-type-header {
        flex-direction: column;
        text-align: center;
        gap: 0.5rem;
    }

    .member-type-header i {
        font-size: 2rem;
    }

    .member-type-footer {
        flex-direction: column;
        gap: 0.5rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
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

    // Form validation
    const form = document.getElementById('registrationForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            const selectedType = document.querySelector('input[name="member_type"]:checked');
            
            if (!selectedType) {
                e.preventDefault();
                showValidationError('Please select a membership type to continue.');
            }
        });
    }

    // Show validation error
    function showValidationError(message) {
        // Check if error already exists
        let errorDiv = document.querySelector('.alert-danger');
        if (!errorDiv) {
            errorDiv = document.createElement('div');
            errorDiv.className = 'alert alert-danger alert-dismissible fade show';
            errorDiv.setAttribute('role', 'alert');
            
            const closeBtn = document.createElement('button');
            closeBtn.type = 'button';
            closeBtn.className = 'btn-close';
            closeBtn.setAttribute('data-bs-dismiss', 'alert');
            closeBtn.setAttribute('aria-label', 'Close');
            
            errorDiv.innerHTML = `<i class="fas fa-exclamation-triangle me-2"></i>${message}`;
            errorDiv.appendChild(closeBtn);
            
            const infoBox = document.querySelector('.info-box');
            if (infoBox) {
                infoBox.parentNode.insertBefore(errorDiv, infoBox.nextSibling);
            }
            
            // Add close button functionality
            closeBtn.addEventListener('click', function() {
                errorDiv.remove();
            });
            
            // Auto dismiss
            setTimeout(() => {
                if (errorDiv.parentNode) {
                    errorDiv.style.transition = 'opacity 0.3s ease';
                    errorDiv.style.opacity = '0';
                    setTimeout(() => {
                        if (errorDiv.parentNode) {
                            errorDiv.remove();
                        }
                    }, 300);
                }
            }, 5000);
        }
    }

    // Add hover effect to member type cards
    document.querySelectorAll('.member-type-label').forEach(card => {
        card.addEventListener('mouseenter', function() {
            if (!this.previousElementSibling?.checked) {
                this.style.transform = 'translateY(-2px)';
                this.style.boxShadow = '0 10px 20px rgba(0,0,0,0.1)';
            }
        });

        card.addEventListener('mouseleave', function() {
            if (!this.previousElementSibling?.checked) {
                this.style.transform = 'none';
                this.style.boxShadow = 'none';
            }
        });
    });
});
</script>