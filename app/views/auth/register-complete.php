<div class="auth-page">
    <div class="auth-container success-container">
        <!-- Left side - Celebratory Branding -->
        <div class="auth-left">
            <div class="welcome-content">
                <div class="brand-section">
                    <h1 class="brand-title">NAYS 2.0</h1>
                    <p class="brand-subtitle">National Association of Yung Students</p>
                </div>

                <div class="celebration-animation">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>

                <div class="welcome-message">
                    <h2>Welcome to the Family!</h2>
                    <p>You are now part of a growing community of Yungur students worldwide.</p>
                </div>

                <div class="quick-stats">
                    <div class="stat-circle">
                        <span class="stat-number">5,000+</span>
                        <span class="stat-label">Members</span>
                    </div>
                    <div class="stat-circle">
                        <span class="stat-number">45+</span>
                        <span class="stat-label">Branches</span>
                    </div>
                    <div class="stat-circle">
                        <span class="stat-number">23</span>
                        <span class="stat-label">Projects</span>
                    </div>
                </div>

                <div class="success-quote">
                    <i class="fas fa-quote-left"></i>
                    <p>Education is the most powerful weapon which you can use to change the world.</p>
                    <small>- Nelson Mandela</small>
                </div>
            </div>
        </div>

        <!-- Right side - Success Message -->
        <div class="auth-right">
            <div class="auth-card success-card">
                <div class="success-header">
                    <div class="success-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h2>Registration Complete!</h2>
                    <p>Your account has been created successfully</p>
                </div>

                <div class="success-body">
                    <!-- NAYS ID Display -->
                    <div class="nays-id-card">
                        <span class="id-label">Your NAYS ID</span>
                        <div class="id-number"><?php echo $nays_id; ?></div>
                        <div class="id-barcode">
                            <i class="fas fa-barcode"></i>
                            <span><?php echo $nays_id; ?></span>
                        </div>
                    </div>

                    <!-- Next Steps -->
                    <div class="next-steps">
                        <h5>
                            <i class="fas fa-list-check me-2"></i>
                            Next Steps
                        </h5>
                        <div class="steps-timeline">
                            <div class="step-item">
                                <div class="step-number">1</div>
                                <div class="step-content">
                                    <h6>Verify Your Email</h6>
                                    <p>Check your inbox for verification link</p>
                                </div>
                                <div class="step-status pending">
                                    <i class="fas fa-clock"></i>
                                </div>
                            </div>
                            
                            <div class="step-item">
                                <div class="step-number">2</div>
                                <div class="step-content">
                                    <h6>Click Verification Link</h6>
                                    <p>Confirm your email address</p>
                                </div>
                                <div class="step-status pending">
                                    <i class="fas fa-clock"></i>
                                </div>
                            </div>
                            
                            <div class="step-item">
                                <div class="step-number">3</div>
                                <div class="step-content">
                                    <h6>Login to Your Account</h6>
                                    <p>Access your dashboard</p>
                                </div>
                                <div class="step-status pending">
                                    <i class="fas fa-clock"></i>
                                </div>
                            </div>
                            
                            <div class="step-item">
                                <div class="step-number">4</div>
                                <div class="step-content">
                                    <h6>Download Digital ID</h6>
                                    <p>Get your membership card</p>
                                </div>
                                <div class="step-status pending">
                                    <i class="fas fa-clock"></i>
                                </div>
                            </div>
                            
                            <div class="step-item">
                                <div class="step-number">5</div>
                                <div class="step-content">
                                    <h6>Join Branch Group</h6>
                                    <p>Connect with local members</p>
                                </div>
                                <div class="step-status pending">
                                    <i class="fas fa-clock"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Verification Alert -->
                    <div class="verification-alert">
                        <i class="fas fa-envelope-open-text"></i>
                        <div class="alert-content">
                            <h6>Pending Email Verification</h6>
                            <p>We've sent a verification link to your email. Please check your inbox (and spam folder).</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <a href="<?php echo url('login'); ?>" class="btn btn-primary">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            Go to Login
                        </a>
                        <a href="<?php echo url(''); ?>" class="btn btn-outline-primary">
                            <i class="fas fa-home me-2"></i>
                            Home
                        </a>
                    </div>
                </div>
            </div>

            <!-- Digital ID Card Preview -->
            <div class="digital-id-preview mt-4">
                <div class="preview-header">
                    <i class="fas fa-id-card me-2"></i>
                    <span>Your Digital ID Card Preview</span>
                </div>
                <div class="digital-id-card">
                    <div class="id-card-inner">
                        <div class="id-card-header">
                            <div class="id-logo">
                                <i class="fas fa-graduation-cap"></i>
                                <span>NAYS 2.0</span>
                            </div>
                            <div class="id-type">MEMBERSHIP CARD</div>
                        </div>
                        <div class="id-card-body">
                            <div class="id-qr-code">
                                <i class="fas fa-qrcode"></i>
                            </div>
                            <div class="id-details">
                                <h4><?php echo ($user ? $user->first_name . ' ' . $user->last_name : 'New Member'); ?></h4>
                                <div class="id-info">
                                    <span class="info-label">NAYS ID:</span>
                                    <span class="info-value"><?php echo $nays_id ?? 'NAYS-T-2026-0490d'; ?></span>
                                </div>
                                <div class="id-info">
                                    <span class="info-label">Member Type:</span>
                                    <span class="info-value"><?php echo ($user && $user->member_type ? ucfirst($user->member_type) : 'Regular'); ?></span>
                                </div>
                                <div class="id-info">
                                    <span class="info-label">Status:</span>
                                    <span class="badge bg-warning">Pending Verification</span>
                                </div>
                                <div class="id-info">
                                    <span class="info-label">Valid Until:</span>
                                    <span class="info-value"><?php echo date('d M Y', strtotime('+1 year')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="id-card-footer">
                            <i class="fas fa-shield-alt"></i>
                            <span>National Association of Yung Students</span>
                        </div>
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
    max-width: 1400px;
    width: 100%;
    min-height: 600px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    border-radius: 24px;
    overflow: hidden;
    background: white;
}

.success-container {
    max-width: 1300px;
}

/* Left Side - Celebratory Branding */
.auth-left {
    flex: 1;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    padding: 3rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    position: relative;
    overflow: hidden;
}

.auth-left::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(233,183,65,0.1) 0%, transparent 70%);
    animation: rotate 30s linear infinite;
}

@keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.welcome-content {
    text-align: center;
    max-width: 400px;
    position: relative;
    z-index: 1;
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

/* Celebration Animation */
.celebration-animation {
    margin-bottom: 2rem;
    display: flex;
    justify-content: center;
    gap: 1rem;
}

.celebration-animation i {
    font-size: 2rem;
    color: var(--secondary-color);
    animation: pulse 2s infinite;
}

.celebration-animation i:nth-child(1) { animation-delay: 0s; }
.celebration-animation i:nth-child(2) { animation-delay: 0.3s; }
.celebration-animation i:nth-child(3) { animation-delay: 0.6s; }

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
        opacity: 1;
    }
    50% {
        transform: scale(1.2);
        opacity: 0.8;
    }
}

.welcome-message {
    margin-bottom: 2rem;
    background: rgba(255,255,255,0.1);
    padding: 2rem;
    border-radius: 16px;
}

.welcome-message h2 {
    color: var(--secondary-color);
    margin-bottom: 1rem;
}

.welcome-message p {
    opacity: 0.9;
    line-height: 1.6;
}

/* Quick Stats */
.quick-stats {
    display: flex;
    justify-content: space-around;
    gap: 1rem;
    margin-bottom: 2rem;
}

.stat-circle {
    background: rgba(255,255,255,0.1);
    border-radius: 16px;
    padding: 1rem;
    flex: 1;
    text-align: center;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.2);
}

.stat-number {
    display: block;
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--secondary-color);
}

.stat-label {
    font-size: 0.8rem;
    opacity: 0.9;
}

/* Success Quote */
.success-quote {
    background: rgba(0,0,0,0.2);
    border-radius: 16px;
    padding: 2rem;
    position: relative;
}

.success-quote i {
    color: var(--secondary-color);
    font-size: 1.5rem;
    margin-bottom: 1rem;
}

.success-quote p {
    font-style: italic;
    margin-bottom: 0.5rem;
    line-height: 1.6;
}

.success-quote small {
    opacity: 0.8;
}

/* Right Side - Success Message */
.auth-right {
    flex: 1.2;
    padding: 3rem;
    display: flex;
    flex-direction: column;
    overflow-y: auto;
    max-height: 100vh;
}

.auth-card {
    width: 100%;
    max-width: 600px;
    margin: 0 auto;
}

/* Success Header */
.success-header {
    text-align: center;
    margin-bottom: 2rem;
}

.success-icon {
    width: 100px;
    height: 100px;
    background: var(--success-light);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    animation: scaleIn 0.5s ease;
}

@keyframes scaleIn {
    from {
        transform: scale(0);
    }
    70% {
        transform: scale(1.1);
    }
    to {
        transform: scale(1);
    }
}

.success-icon i {
    font-size: 3rem;
    color: var(--success);
}

.success-header h2 {
    color: var(--primary-color);
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.success-header p {
    color: var(--gray-500);
}

/* NAYS ID Card */
.nays-id-card {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    border-radius: 16px;
    padding: 2rem;
    text-align: center;
    color: white;
    margin-bottom: 2rem;
}

.id-label {
    display: block;
    font-size: 0.9rem;
    opacity: 0.9;
    margin-bottom: 0.5rem;
}

.id-number {
    font-size: 2.5rem;
    font-weight: 700;
    letter-spacing: 2px;
    margin-bottom: 1rem;
    font-family: monospace;
}

.id-barcode {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    background: rgba(255,255,255,0.1);
    padding: 0.75rem;
    border-radius: 8px;
}

.id-barcode i {
    font-size: 2rem;
    color: var(--secondary-color);
}

.id-barcode span {
    font-family: monospace;
    font-size: 1rem;
    opacity: 0.9;
}

/* Next Steps */
.next-steps {
    background: var(--gray-50);
    border-radius: 16px;
    padding: 1.5rem;
    margin-bottom: 2rem;
    border: 1px solid var(--gray-200);
}

.next-steps h5 {
    color: var(--primary-color);
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
}

.next-steps h5 i {
    color: var(--secondary-color);
}

.steps-timeline {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.step-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 0.75rem;
    background: white;
    border-radius: 12px;
    transition: all 0.3s ease;
}

.step-item:hover {
    transform: translateX(5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

.step-number {
    width: 36px;
    height: 36px;
    background: var(--primary-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
    flex-shrink: 0;
}

.step-content {
    flex: 1;
}

.step-content h6 {
    color: var(--dark-color);
    margin-bottom: 0.25rem;
}

.step-content p {
    color: var(--gray-500);
    font-size: 0.85rem;
    margin: 0;
}

.step-status {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.step-status.pending {
    background: var(--warning-light);
    color: var(--warning);
}

.step-status.completed {
    background: var(--success-light);
    color: var(--success);
}

/* Verification Alert */
.verification-alert {
    background: var(--info-light);
    border: 1px solid var(--info);
    border-radius: 12px;
    padding: 1rem;
    margin-bottom: 2rem;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.verification-alert i {
    font-size: 2rem;
    color: var(--info);
}

.alert-content h6 {
    color: var(--info);
    margin-bottom: 0.25rem;
}

.alert-content p {
    color: var(--dark-color);
    font-size: 0.9rem;
    margin: 0;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 1rem;
    margin-bottom: 2rem;
}

/* Digital ID Preview */
.digital-id-preview {
    width: 100%;
    max-width: 600px;
    margin: 0 auto;
}

.preview-header {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--primary-color);
    font-weight: 600;
    margin-bottom: 1rem;
}

.preview-header i {
    color: var(--secondary-color);
}

.digital-id-card {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    border-radius: 16px;
    padding: 2px;
    position: relative;
    overflow: hidden;
}

.id-card-inner {
    background: white;
    border-radius: 14px;
    padding: 1.5rem;
}

.id-card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid var(--gray-200);
}

.id-logo {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.id-logo i {
    font-size: 1.5rem;
    color: var(--primary-color);
}

.id-logo span {
    font-weight: 700;
    color: var(--primary-color);
}

.id-type {
    background: var(--secondary-color);
    color: var(--primary-color);
    padding: 0.25rem 0.75rem;
    border-radius: 30px;
    font-size: 0.8rem;
    font-weight: 600;
}

.id-card-body {
    display: flex;
    gap: 1.5rem;
    margin-bottom: 1.5rem;
}

.id-qr-code {
    width: 100px;
    height: 100px;
    background: var(--gray-100);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.id-qr-code i {
    font-size: 3rem;
    color: var(--primary-color);
}

.id-details {
    flex: 1;
}

.id-details h4 {
    color: var(--dark-color);
    margin-bottom: 0.75rem;
}

.id-info {
    display: flex;
    margin-bottom: 0.5rem;
    font-size: 0.9rem;
}

.info-label {
    width: 100px;
    color: var(--gray-500);
}

.info-value {
    color: var(--dark-color);
    font-weight: 500;
}

.badge {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    border-radius: 30px;
    font-size: 0.75rem;
    font-weight: 600;
}

.badge.bg-warning {
    background: var(--warning-light);
    color: var(--warning);
}

.id-card-footer {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding-top: 1rem;
    border-top: 2px solid var(--gray-200);
    color: var(--gray-500);
    font-size: 0.8rem;
}

.id-card-footer i {
    color: var(--secondary-color);
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

.btn-outline-primary {
    background: transparent;
    border: 2px solid var(--primary-color);
    color: var(--primary-color);
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

.btn-outline-primary:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-2px);
}

.btn-lg {
    padding: 1rem 2rem;
    font-size: 1.1rem;
}

/* Responsive */
@media (max-width: 992px) {
    .auth-container {
        max-width: 95%;
    }

    .quick-stats {
        flex-wrap: wrap;
    }

    .stat-circle {
        min-width: 120px;
    }

    .id-card-body {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .id-info {
        justify-content: center;
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

    .welcome-message,
    .success-quote,
    .quick-stats {
        padding: 1.5rem;
    }

    .auth-right {
        padding: 2rem;
    }

    .action-buttons {
        flex-direction: column;
    }

    .btn-primary,
    .btn-outline-primary {
        width: 100%;
    }

    .id-card-body {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .id-info {
        flex-direction: column;
        align-items: center;
        gap: 0.25rem;
    }

    .info-label {
        width: auto;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add confetti effect for celebration
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
    
    // Trigger confetti on page load
    createConfetti();

    // Auto-dismiss alerts after 5 seconds (if any)
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
});
</script>