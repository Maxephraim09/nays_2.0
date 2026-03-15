<div class="auth-page">
    <div class="auth-container register-container">
        <!-- Left side - Branding -->
        <div class="auth-left">
            <div class="welcome-content">
                <div class="brand-section">
                    <h1 class="brand-title">NAYS 2.0</h1>
                    <p class="brand-subtitle">National Association of Yung Students</p>
                </div>

                <div class="membership-summary">
                    <h5>Your Membership</h5>
                    <div class="summary-card">
                        <div class="summary-icon">
                            <i class="fas 
                                <?php 
                                $icons = [
                                    'secondary' => 'fa-school',
                                    'tertiary' => 'fa-university',
                                    'alumni' => 'fa-user-graduate',
                                    'diaspora' => 'fa-globe',
                                    'honorary' => 'fa-star'
                                ];
                                echo $icons[$member_type] ?? 'fa-user';
                                ?>">
                            </i>
                        </div>
                        <div class="summary-details">
                            <span class="member-type"><?php echo ucfirst($member_type); ?> Member</span>
                            <span class="member-fee"><?php echo $fee_formatted; ?></span>
                        </div>
                    </div>
                </div>

                <div class="benefits-list">
                    <h5>Membership Benefits</h5>
                    <div class="benefit-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Full access to NAYS Academy</span>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Voting rights in elections</span>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Forum participation</span>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Project proposal submission</span>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Talent showcase access</span>
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
                        <div class="step completed">
                            <div class="step-number"><i class="fas fa-check"></i></div>
                            <div class="step-label">Basic Info</div>
                        </div>
                        <div class="step-connector completed"></div>
                        <div class="step completed">
                            <div class="step-number"><i class="fas fa-check"></i></div>
                            <div class="step-label">Education</div>
                        </div>
                        <div class="step-connector completed"></div>
                        <div class="step completed">
                            <div class="step-number"><i class="fas fa-check"></i></div>
                            <div class="step-label">Documents</div>
                        </div>
                        <div class="step-connector completed"></div>
                        <div class="step active">
                            <div class="step-number">5</div>
                            <div class="step-label">Payment</div>
                        </div>
                    </div>
                </div>

                <div class="payment-security">
                    <i class="fas fa-lock"></i>
                    <div>
                        <h6>Secure Payment</h6>
                        <p>All transactions are encrypted and secure. Your payment information is protected.</p>
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

        <!-- Right side - Payment Form -->
        <div class="auth-right">
            <div class="auth-card register-card">
                <div class="auth-header">
                    <div class="auth-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <h4 class="mb-2">Membership Fee</h4>
                    <p class="text-muted mb-0">Step 5: Complete your payment</p>
                </div>

                <div class="auth-body"><br><br><br><br><br>
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
                    
                    <!-- Progress Bar -->
                    <div class="progress-container mb-4">
                        <div class="progress-info">
                            <span>Step 5 of 5</span>
                            <span>100% Complete</span>
                        </div>
                        <div class="progress-bar-custom">
                            <div class="progress-fill" style="width: 100%"></div>
                        </div>
                    </div>
                    
                    <!-- Fee Display Card -->
                    <div class="fee-card mb-4">
                        <div class="fee-header">
                            <span>Membership Fee</span>
                            <span class="member-badge"><?php echo ucfirst($member_type); ?></span>
                        </div>
                        <div class="fee-amount"><?php echo $fee_formatted; ?></div>
                        <div class="fee-description">
                            <?php
                            $feeTypes = [
                                'secondary' => 'Annual secondary school membership',
                                'tertiary' => 'Annual tertiary institution membership',
                                'alumni' => 'Annual alumni membership',
                                'diaspora' => 'Annual diaspora membership (USD)',
                                'honorary' => 'Custom amount'
                            ];
                            echo $feeTypes[$member_type] ?? 'Membership fee';
                            ?>
                        </div>
                    </div>
                    
                    <form method="POST" action="<?php echo url('register/step5'); ?>" id="paymentForm" class="auth-form">
                        <?php echo csrf_field(); ?>
                        
                        <h5 class="payment-section-title">
                            <i class="fas fa-credit-card me-2"></i>Select Payment Method
                        </h5>
                        
                        <div class="payment-methods-grid">
                            <!-- Card Payment -->
                            <div class="payment-method-card" data-method="card">
                                <input type="radio" name="payment_method" value="card" id="method_card" required>
                                <label for="method_card" class="method-label">
                                    <div class="method-icon">
                                        <i class="fas fa-credit-card"></i>
                                    </div>
                                    <div class="method-info">
                                        <h6>Card Payment</h6>
                                        <p>Pay with debit/credit card</p>
                                    </div>
                                </label>
                            </div>
                            
                            <!-- Bank Transfer -->
                            <div class="payment-method-card" data-method="transfer">
                                <input type="radio" name="payment_method" value="transfer" id="method_transfer">
                                <label for="method_transfer" class="method-label">
                                    <div class="method-icon">
                                        <i class="fas fa-university"></i>
                                    </div>
                                    <div class="method-info">
                                        <h6>Bank Transfer</h6>
                                        <p>Transfer to our bank account</p>
                                    </div>
                                </label>
                            </div>
                            
                            <!-- USSD -->
                            <div class="payment-method-card" data-method="ussd">
                                <input type="radio" name="payment_method" value="ussd" id="method_ussd">
                                <label for="method_ussd" class="method-label">
                                    <div class="method-icon">
                                        <i class="fas fa-mobile-alt"></i>
                                    </div>
                                    <div class="method-info">
                                        <h6>USSD</h6>
                                        <p>Pay using USSD code</p>
                                    </div>
                                </label>
                            </div>
                            
                            <!-- Cash at Branch -->
                            <div class="payment-method-card" data-method="cash">
                                <input type="radio" name="payment_method" value="cash" id="method_cash">
                                <label for="method_cash" class="method-label">
                                    <div class="method-icon">
                                        <i class="fas fa-money-bill-wave"></i>
                                    </div>
                                    <div class="method-info">
                                        <h6>Cash at Branch</h6>
                                        <p>Pay at any NAYS branch</p>
                                    </div>
                                </label>
                            </div>
                            
                            <!-- Waiver Code -->
                            <div class="payment-method-card waiver-card" data-method="waiver">
                                <input type="radio" name="payment_method" value="waiver" id="method_waiver">
                                <label for="method_waiver" class="method-label">
                                    <div class="method-icon">
                                        <i class="fas fa-ticket-alt"></i>
                                    </div>
                                    <div class="method-info">
                                        <h6>Scholarship/Waiver Code</h6>
                                        <p>If you have a waiver code</p>
                                    </div>
                                </label>
                                <div class="waiver-code-field">
                                    <input type="text" class="form-control" name="waiver_code" id="waiver_code" 
                                           placeholder="Enter waiver code" disabled>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Payment Instructions -->
                        <div class="payment-instructions" id="paymentInstructions" style="display: none;">
                            <h6>
                                <i class="fas fa-info-circle me-2"></i>
                                Payment Instructions
                            </h6>
                            <div class="instruction-content" id="cardInstructions" style="display: none;">
                                <p>You will be redirected to a secure payment page to complete your transaction.</p>
                                <div class="instruction-note">
                                    <i class="fas fa-shield-alt"></i>
                                    <span>Secured by industry-standard encryption</span>
                                </div>
                            </div>
                            <div class="instruction-content" id="transferInstructions" style="display: none;">
                                <p>Please transfer to:</p>
                                <ul class="bank-details">
                                    <li><strong>Bank:</strong> NAYS Foundation Bank</li>
                                    <li><strong>Account Name:</strong> NAYS Foundation</li>
                                    <li><strong>Account Number:</strong> 0123456789</li>
                                    <li><strong>Amount:</strong> <?php echo $fee_formatted; ?></li>
                                </ul>
                                <div class="instruction-note">
                                    <i class="fas fa-info-circle"></i>
                                    <span>Use your email as payment reference</span>
                                </div>
                            </div>
                            <div class="instruction-content" id="ussdInstructions" style="display: none;">
                                <p>Dial <strong>*123#</strong> and follow the prompts.</p>
                                <ul class="ussd-details">
                                    <li><strong>Payment Code:</strong> NAYS<?php echo time(); ?></li>
                                    <li><strong>Amount:</strong> <?php echo $fee_formatted; ?></li>
                                </ul>
                                <div class="instruction-note">
                                    <i class="fas fa-mobile-alt"></i>
                                    <span>Available on all major networks</span>
                                </div>
                            </div>
                            <div class="instruction-content" id="cashInstructions" style="display: none;">
                                <p>Visit any NAYS branch near you:</p>
                                <ul class="branch-details">
                                    <li>Abuja: 123 Yungur Street, Wuse Zone 4</li>
                                    <li>Lagos: 45 Marina Road, Lagos Island</li>
                                    <li>Kano: 23 Muhammadu Buhari Way</li>
                                </ul>
                                <div class="instruction-note">
                                    <i class="fas fa-clock"></i>
                                    <span>Account activated upon verification (1-2 business days)</span>
                                </div>
                            </div>
                            <div class="instruction-content" id="waiverInstructions" style="display: none;">
                                <p>Enter your waiver code above to complete registration.</p>
                                <div class="instruction-note">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Your account will be activated immediately</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <a href="<?php echo url('register/step4'); ?>" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg" id="submitBtn">
                                Complete Registration <i class="fas fa-check-circle ms-2"></i>
                            </button>
                        </div>
                    </form>
                    
                    <div class="security-note mt-4">
                        <i class="fas fa-shield-alt"></i>
                        <span>Your payment information is secure and encrypted</span>
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

/* Membership Summary */
.membership-summary {
    margin-bottom: 2rem;
    background: rgba(255,255,255,0.1);
    border-radius: 16px;
    padding: 1.5rem;
    text-align: left;
}

.membership-summary h5 {
    color: var(--secondary-color);
    margin-bottom: 1rem;
    font-size: 1rem;
}

.summary-card {
    display: flex;
    align-items: center;
    gap: 1rem;
    background: rgba(0,0,0,0.2);
    padding: 1rem;
    border-radius: 12px;
}

.summary-icon {
    width: 50px;
    height: 50px;
    background: var(--secondary-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.summary-icon i {
    font-size: 1.5rem;
    color: var(--primary-color);
}

.summary-details {
    display: flex;
    flex-direction: column;
}

.member-type {
    font-weight: 600;
    text-transform: capitalize;
}

.member-fee {
    color: var(--secondary-color);
    font-size: 1.2rem;
    font-weight: 700;
}

/* Benefits List */
.benefits-list {
    margin-bottom: 2rem;
    background: rgba(0,0,0,0.2);
    border-radius: 16px;
    padding: 1.5rem;
    text-align: left;
}

.benefits-list h5 {
    color: var(--secondary-color);
    margin-bottom: 1rem;
    font-size: 1rem;
}

.benefit-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 0.75rem;
    color: rgba(255,255,255,0.9);
    font-size: 0.9rem;
}

.benefit-item i {
    color: var(--secondary-color);
    font-size: 1rem;
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

/* Payment Security */
.payment-security {
    background: rgba(255,255,255,0.1);
    border-radius: 12px;
    padding: 1rem;
    margin-bottom: 2rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    text-align: left;
}

.payment-security i {
    font-size: 2rem;
    color: var(--secondary-color);
}

.payment-security h6 {
    color: white;
    margin-bottom: 0.25rem;
    font-size: 0.95rem;
}

.payment-security p {
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

/* Fee Card */
.fee-card {
    background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    border-radius: 16px;
    padding: 2rem;
    color: white;
    text-align: center;
    margin-bottom: 2rem;
}

.fee-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
    font-size: 1rem;
    opacity: 0.9;
}

.member-badge {
    background: var(--secondary-color);
    color: var(--primary-color);
    padding: 0.25rem 0.75rem;
    border-radius: 30px;
    font-size: 0.8rem;
    font-weight: 600;
}

.fee-amount {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.fee-description {
    opacity: 0.9;
    font-size: 0.95rem;
}

/* Payment Methods */
.payment-section-title {
    color: var(--dark-color);
    font-size: 1.1rem;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
}

.payment-section-title i {
    color: var(--primary-color);
}

.payment-methods-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.payment-method-card {
    position: relative;
    background: var(--gray-50);
    border: 2px solid var(--gray-200);
    border-radius: 12px;
    transition: all 0.3s ease;
    cursor: pointer;
}

.payment-method-card:hover {
    border-color: var(--primary-color);
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(27, 77, 62, 0.1);
}

.payment-method-card.selected {
    border-color: var(--primary-color);
    background: var(--green-50);
}

.payment-method-card input[type="radio"] {
    position: absolute;
    opacity: 0;
    width: 0;
    height: 0;
}

.method-label {
    display: flex;
    align-items: center;
    padding: 1.5rem;
    cursor: pointer;
    gap: 1rem;
}

.method-icon {
    width: 48px;
    height: 48px;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid var(--primary-color);
}

.method-icon i {
    font-size: 1.5rem;
    color: var(--primary-color);
}

.method-info {
    flex: 1;
}

.method-info h6 {
    color: var(--dark-color);
    margin-bottom: 0.25rem;
}

.method-info p {
    color: var(--gray-500);
    font-size: 0.8rem;
    margin: 0;
}

/* Waiver Card Special */
.waiver-card {
    grid-column: span 2;
}

.waiver-code-field {
    padding: 0 1.5rem 1.5rem 1.5rem;
    display: none;
}

.waiver-card.selected .waiver-code-field {
    display: block;
}

/* Payment Instructions */
.payment-instructions {
    background: var(--info-light);
    border: 1px solid var(--info);
    border-radius: 12px;
    padding: 1.5rem;
    margin: 1.5rem 0;
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

.payment-instructions h6 {
    color: var(--info);
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
}

.instruction-content p {
    color: var(--dark-color);
    margin-bottom: 1rem;
}

.bank-details,
.ussd-details,
.branch-details {
    list-style: none;
    padding: 0;
    margin: 0 0 1rem 0;
}

.bank-details li,
.ussd-details li,
.branch-details li {
    padding: 0.5rem 0;
    border-bottom: 1px solid rgba(37, 99, 235, 0.1);
    color: var(--gray-700);
}

.bank-details li:last-child,
.ussd-details li:last-child,
.branch-details li:last-child {
    border-bottom: none;
}

.instruction-note {
    background: rgba(37, 99, 235, 0.1);
    border-radius: 8px;
    padding: 0.75rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--info);
    font-size: 0.9rem;
}

/* Security Note */
.security-note {
    text-align: center;
    color: var(--gray-500);
    font-size: 0.85rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.security-note i {
    color: var(--success);
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

.btn-primary.btn-lg {
    padding: 1rem 2rem;
    font-size: 1.1rem;
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

.form-control {
    border: 2px solid var(--gray-200);
    border-radius: 10px;
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

/* Responsive */
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

    .welcome-stats,
    .registration-steps,
    .benefits-list,
    .membership-summary {
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

    .payment-methods-grid {
        grid-template-columns: 1fr;
    }

    .waiver-card {
        grid-column: span 1;
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
    const paymentCards = document.querySelectorAll('.payment-method-card');
    const paymentInstructions = document.getElementById('paymentInstructions');
    const waiverCode = document.getElementById('waiver_code');
    const submitBtn = document.getElementById('submitBtn');
    
    // Payment method selection
    paymentCards.forEach(card => {
        card.addEventListener('click', function() {
            // Remove selected class from all cards
            paymentCards.forEach(c => c.classList.remove('selected'));
            
            // Add selected class to this card
            this.classList.add('selected');
            
            // Check the radio button
            const radio = this.querySelector('input[type="radio"]');
            radio.checked = true;
            
            // Get selected method
            const method = radio.value;
            
            // Show payment instructions
            paymentInstructions.style.display = 'block';
            
            // Hide all instruction content
            document.querySelectorAll('.instruction-content').forEach(div => {
                div.style.display = 'none';
            });
            
            // Show selected instruction
            document.getElementById(method + 'Instructions').style.display = 'block';
            
            // Enable/disable waiver code
            if (method === 'waiver') {
                waiverCode.disabled = false;
                waiverCode.focus();
            } else {
                waiverCode.disabled = true;
                waiverCode.value = '';
            }
        });
    });
    
    // Form validation
    const form = document.getElementById('paymentForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            const selectedMethod = document.querySelector('input[name="payment_method"]:checked');
            
            if (!selectedMethod) {
                e.preventDefault();
                alert('Please select a payment method');
                return;
            }
            
            if (selectedMethod.value === 'waiver') {
                const waiverCode = document.getElementById('waiver_code');
                if (!waiverCode.value.trim()) {
                    e.preventDefault();
                    alert('Please enter your waiver code');
                    waiverCode.focus();
                    return;
                }
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