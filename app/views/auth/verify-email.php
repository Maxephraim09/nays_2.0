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
                        <i class="fas fa-envelope"></i>
                        <span>Email verification</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-shield-alt"></i>
                        <span>Secure account activation</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Verify your identity</span>
                    </div>
                </div>

                <div class="verification-info">
                    <h5>Why verify your email?</h5>
                    <ul>
                        <li><i class="fas fa-lock"></i> Secure your account</li>
                        <li><i class="fas fa-bell"></i> Receive important updates</li>
                        <li><i class="fas fa-vote-yea"></i> Participate in elections</li>
                        <li><i class="fas fa-hand-holding-heart"></i> Access all features</li>
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

        <!-- Right side - Verification Result -->
        <div class="auth-right">
            <div class="auth-card">
                <div class="auth-header">
                    <div class="auth-icon">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                    <h4 class="mb-2">Email Verification</h4>
                    <p class="text-muted mb-0">Verify your email address</p>
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
                    
                    <?php if ($verified ?? false): ?>
                        <!-- Success State -->
                        <div class="verification-result success">
                            <div class="result-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <h4 class="mt-4">Email Verified Successfully!</h4>
                            <p class="text-muted">Your email has been verified. You can now log in to your account and access all NAYS features.</p>
                            
                            <div class="verified-features mt-4">
                                <div class="feature-chip">
                                    <i class="fas fa-graduation-cap"></i>
                                    <span>Academy Access</span>
                                </div>
                                <div class="feature-chip">
                                    <i class="fas fa-vote-yea"></i>
                                    <span>Voting Rights</span>
                                </div>
                                <div class="feature-chip">
                                    <i class="fas fa-comments"></i>
                                    <span>Forum Participation</span>
                                </div>
                            </div>
                            
                            <a href="<?php echo url('login'); ?>" class="btn btn-primary mt-4">
                                <i class="fas fa-sign-in-alt me-2"></i>Proceed to Login
                            </a>
                        </div>
                    <?php else: ?>
                        <!-- Failed State -->
                        <div class="verification-result failed">
                            <div class="result-icon failed">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                            <h4 class="mt-4">Verification Failed</h4>
                            <p class="text-muted">The verification link is invalid or has expired.</p>
                            
                            <div class="help-box mt-4">
                                <h5>Need help?</h5>
                                <ul>
                                    <li><i class="fas fa-redo-alt"></i> Request a new verification link</li>
                                    <li><i class="fas fa-envelope"></i> Check your spam folder</li>
                                    <li><i class="fas fa-headset"></i> Contact support</li>
                                </ul>
                            </div>
                            
                            <div class="action-buttons mt-4">
                                <a href="<?php echo url('resend-verification'); ?>" class="btn btn-outline-primary mb-2">
                                    <i class="fas fa-redo-alt me-2"></i>Resend Verification
                                </a>
                                <a href="<?php echo url('login'); ?>" class="btn btn-primary">
                                    <i class="fas fa-arrow-left me-2"></i>Back to Login
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <div class="auth-divider">
                        <span>need assistance?</span>
                    </div>
                    
                    <div class="auth-footer">
                        <p class="mb-2">
                            <a href="<?php echo url('contact'); ?>" class="text-decoration-none">
                                <i class="fas fa-headset me-2"></i>Contact Support
                            </a>
                        </p>
                        <p class="mb-0">
                            <a href="<?php echo url('faq'); ?>" class="text-decoration-none">
                                <i class="fas fa-question-circle me-2"></i>Visit FAQ
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

/* Verification Info Box */
.verification-info {
    margin-bottom: 2rem;
    text-align: left;
    background: rgba(0,0,0,0.2);
    padding: 1.5rem;
    border-radius: 16px;
}

.verification-info h5 {
    color: var(--secondary-color);
    margin-bottom: 1rem;
    font-size: 1rem;
}

.verification-info ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.verification-info li {
    display: flex;
    align-items: center;
    margin-bottom: 0.75rem;
    font-size: 0.9rem;
    color: rgba(255,255,255,0.9);
}

.verification-info li i {
    width: 24px;
    margin-right: 0.75rem;
    color: var(--secondary-color);
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
    max-width: 450px;
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

/* Verification Result */
.verification-result {
    text-align: center;
    padding: 1rem;
}

.result-icon {
    width: 100px;
    height: 100px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
}

.result-icon i {
    font-size: 5rem;
}

.result-icon.success i {
    color: var(--success);
    animation: scaleIn 0.5s ease;
}

.result-icon.failed i {
    color: var(--warning);
    animation: shake 0.5s ease;
}

@keyframes scaleIn {
    0% {
        transform: scale(0);
    }
    70% {
        transform: scale(1.1);
    }
    100% {
        transform: scale(1);
    }
}

@keyframes shake {
    0%, 100% {
        transform: translateX(0);
    }
    10%, 30%, 50%, 70%, 90% {
        transform: translateX(-5px);
    }
    20%, 40%, 60%, 80% {
        transform: translateX(5px);
    }
}

.verification-result h4 {
    color: var(--dark-color);
    margin-top: 1.5rem;
    margin-bottom: 0.5rem;
}

.verification-result .text-muted {
    color: var(--gray-500);
}

/* Feature Chips */
.verified-features {
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem;
    justify-content: center;
}

.feature-chip {
    background: var(--green-50);
    padding: 0.5rem 1rem;
    border-radius: 30px;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.85rem;
    color: var(--primary-color);
    border: 1px solid var(--primary-light);
}

.feature-chip i {
    color: var(--secondary-color);
}

/* Help Box */
.help-box {
    background: var(--gray-50);
    padding: 1.5rem;
    border-radius: 16px;
    text-align: left;
    border: 1px solid var(--gray-200);
}

.help-box h5 {
    color: var(--primary-color);
    margin-bottom: 1rem;
    font-size: 1rem;
}

.help-box ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.help-box li {
    display: flex;
    align-items: center;
    margin-bottom: 0.75rem;
    color: var(--gray-600);
    font-size: 0.9rem;
}

.help-box li i {
    width: 24px;
    margin-right: 0.75rem;
    color: var(--secondary-color);
}

/* Action Buttons */
.action-buttons {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
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
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-family: 'Inter', sans-serif;
    text-decoration: none;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(27, 77, 62, 0.3);
}

.btn-primary:active {
    transform: translateY(0);
}

.btn-outline-primary {
    background: transparent;
    border: 2px solid var(--primary-color);
    color: var(--primary-color);
    padding: 0.875rem 1.5rem;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
}

.btn-outline-primary:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(27, 77, 62, 0.2);
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
    text-transform: lowercase;
}

/* Footer Links */
.auth-footer {
    text-align: center;
}

.auth-footer p {
    margin-bottom: 0.75rem;
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

.mb-2 {
    margin-bottom: 0.5rem;
}

.mb-0 {
    margin-bottom: 0;
}

.mt-4 {
    margin-top: 2rem;
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
    .verification-info,
    .welcome-stats {
        padding: 1.5rem;
    }

    .auth-right {
        padding: 2rem;
    }

    .verified-features {
        flex-direction: column;
        align-items: center;
    }

    .feature-chip {
        width: 100%;
        justify-content: center;
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

    .result-icon {
        width: 80px;
        height: 80px;
    }

    .result-icon i {
        font-size: 4rem;
    }

    .action-buttons .btn {
        width: 100%;
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

    // Add confetti effect for successful verification (optional)
    <?php if ($verified ?? false): ?>
    function createConfetti() {
        const colors = ['#1B4D3E', '#E9B741', '#2A6B55', '#B7E3D1'];
        
        for (let i = 0; i < 50; i++) {
            setTimeout(() => {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.animationDuration = (Math.random() * 3 + 2) + 's';
                confetti.style.opacity = Math.random();
                confetti.style.transform = 'rotate(' + Math.random() * 360 + 'deg)';
                
                document.body.appendChild(confetti);
                
                setTimeout(() => {
                    confetti.remove();
                }, 5000);
            }, i * 100);
        }
    }
    
    // Add confetti styles
    const style = document.createElement('style');
    style.textContent = `
        .confetti {
            position: fixed;
            top: -10px;
            width: 10px;
            height: 10px;
            z-index: 9999;
            animation: fall linear forwards;
        }
        
        @keyframes fall {
            to {
                transform: translateY(100vh) rotate(720deg);
            }
        }
    `;
    document.head.appendChild(style);
    
    // Trigger confetti
    createConfetti();
    <?php endif; ?>
});
</script>