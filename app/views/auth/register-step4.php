<div class="auth-page">
    <div class="auth-container register-container">
        <!-- Left side - Branding -->
        <div class="auth-left">
            <div class="welcome-content">
                <div class="brand-section">
                    <h1 class="brand-title">NAYS 2.0</h1>
                    <p class="brand-subtitle">National Association of Yung Students</p>
                </div>

                <div class="upload-requirements">
                    <div class="requirement-item">
                        <i class="fas fa-file-pdf"></i>
                        <span>PDF files accepted</span>
                    </div>
                    <div class="requirement-item">
                        <i class="fas fa-file-image"></i>
                        <span>JPG & PNG formats</span>
                    </div>
                    <div class="requirement-item">
                        <i class="fas fa-weight-hanging"></i>
                        <span>Max file size: 5MB</span>
                    </div>
                </div>

                <div class="verification-notice">
                    <i class="fas fa-shield-alt"></i>
                    <div>
                        <h6>Document Verification</h6>
                        <p>Your documents will be securely stored and verified by branch administrators. You'll receive a notification once verified.</p>
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
                        <div class="step active">
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

                <div class="document-checklist">
                    <h6>Required Documents:</h6>
                    <div class="checklist-items">
                        <?php foreach($required_docs as $field => $label): ?>
                        <div class="checklist-item" id="checklist-<?php echo $field; ?>">
                            <i class="fas fa-circle"></i>
                            <span><?php echo $label; ?></span>
                        </div>
                        <?php endforeach; ?>
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

        <!-- Right side - Document Upload Form -->
        <div class="auth-right">
            <div class="auth-card register-card">
                <div class="auth-header">
                    <div class="auth-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <h4 class="mb-2">Document Upload</h4>
                    <p class="text-muted mb-0">Step 4: Upload your documents</p>
                </div>

                <div class="auth-body">
                    <!-- Error Alerts -->
                    <?php if ($error = flash('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i><?php echo $error; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($upload_errors = flash('upload_errors')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <h6 class="mb-2">Upload Errors:</h6>
                            <ul class="mb-0">
                                <?php foreach($upload_errors as $field => $errors): ?>
                                    <?php foreach($errors as $error): ?>
                                        <li><?php echo ucfirst($field) . ': ' . $error; ?></li>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Progress Bar -->
                    <div class="progress-container mb-4">
                        <div class="progress-info">
                            <span>Step 4 of 5</span>
                            <span>80% Complete</span>
                        </div>
                        <div class="progress-bar-custom">
                            <div class="progress-fill" style="width: 80%"></div>
                        </div>
                    </div>
                    
                    <!-- Info Alert -->
                    <div class="info-box mb-4">
                        <i class="fas fa-info-circle me-2"></i>
                        <span>Upload the required documents. All files must be in JPG, PNG, or PDF format and max 5MB each.</span>
                    </div>
                    
                    <form method="POST" action="<?php echo url('register/step4'); ?>" enctype="multipart/form-data" class="auth-form" id="uploadForm">
                        <?php echo csrf_field(); ?>
                        
                        <div class="documents-grid">
                            <?php foreach($required_docs as $field => $label): ?>
                            <div class="document-card" id="doc-card-<?php echo $field; ?>">
                                <div class="document-header">
                                    <h5 class="document-title"><?php echo $label; ?></h5>
                                    <span class="required-badge">Required</span>
                                </div>
                                
                                <p class="document-description">
                                    <?php
                                    $descriptions = [
                                        'school_id' => 'Upload your school ID card (front and back if possible)',
                                        'passport' => 'Recent passport photograph (white background)',
                                        'birth_cert' => 'Birth certificate or age declaration',
                                        'consent_form' => 'Parent/Guardian consent form (signed)',
                                        'student_id' => 'Valid student ID card from your institution',
                                        'admission_letter' => 'Admission letter from your institution',
                                        'certificate' => 'Degree certificate or statement of result',
                                        'nysc' => 'NYSC discharge certificate or exemption letter',
                                        'id_document' => 'Valid ID document (passport, driver\'s license, national ID)',
                                        'proof_address' => 'Proof of address (utility bill, bank statement)'
                                    ];
                                    echo $descriptions[$field] ?? 'Upload required document';
                                    ?>
                                </p>
                                
                                <div class="upload-area" 
                                     onclick="document.getElementById('<?php echo $field; ?>').click()">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <div class="upload-text">
                                        <span class="primary-text">Click to upload</span>
                                        <span class="secondary-text">or drag and drop</span>
                                    </div>
                                    <div class="file-info">
                                        <span class="file-types">JPG, PNG, PDF</span>
                                        <span class="file-size">Max 5MB</span>
                                    </div>
                                </div>
                                
                                <input type="file" class="d-none" id="<?php echo $field; ?>" 
                                       name="<?php echo $field; ?>" accept=".jpg,.jpeg,.png,.pdf"
                                       onchange="updateFileInfo(this, '<?php echo $field; ?>')">
                                
                                <div id="<?php echo $field; ?>-info" class="file-info-display"></div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        
                        <div class="verification-warning">
                            <i class="fas fa-exclamation-triangle"></i>
                            <div>
                                <h6>Document Verification</h6>
                                <p>Your documents will be verified by the branch admin. You will be notified once verified. This process typically takes 1-2 business days.</p>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <a href="<?php echo url('register/step3'); ?>" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back
                            </a>
                            <button type="submit" class="btn btn-primary" id="submitBtn">
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

/* Upload Requirements */
.upload-requirements {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    justify-content: center;
    margin-bottom: 2rem;
}

.requirement-item {
    background: rgba(255,255,255,0.1);
    padding: 0.5rem 1rem;
    border-radius: 30px;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.9rem;
}

.requirement-item i {
    color: var(--secondary-color);
}

/* Verification Notice */
.verification-notice {
    background: rgba(0,0,0,0.2);
    border-radius: 16px;
    padding: 1.5rem;
    margin-bottom: 2rem;
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    text-align: left;
}

.verification-notice i {
    font-size: 2rem;
    color: var(--secondary-color);
}

.verification-notice h6 {
    color: white;
    margin-bottom: 0.25rem;
    font-size: 1rem;
}

.verification-notice p {
    color: rgba(255,255,255,0.8);
    font-size: 0.85rem;
    margin: 0;
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

/* Document Checklist */
.document-checklist {
    background: rgba(255,255,255,0.1);
    border-radius: 16px;
    padding: 1.5rem;
    margin-bottom: 2rem;
    text-align: left;
}

.document-checklist h6 {
    color: var(--secondary-color);
    margin-bottom: 1rem;
    font-size: 1rem;
}

.checklist-items {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.checklist-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 0.9rem;
    color: rgba(255,255,255,0.9);
}

.checklist-item i {
    font-size: 0.6rem;
    color: var(--gray-400);
    transition: all 0.3s ease;
}

.checklist-item.completed i {
    color: var(--success);
    content: "\f00c";
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
    max-width: 900px;
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

/* Documents Grid */
.documents-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.document-card {
    background: var(--gray-50);
    border: 2px solid var(--gray-200);
    border-radius: 16px;
    padding: 1.5rem;
    transition: all 0.3s ease;
}

.document-card:hover {
    border-color: var(--primary-color);
    box-shadow: 0 10px 20px rgba(27, 77, 62, 0.1);
}

.document-card.uploaded {
    border-color: var(--success);
    background: var(--success-light);
}

.document-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.75rem;
}

.document-title {
    color: var(--dark-color);
    font-size: 1rem;
    font-weight: 600;
    margin: 0;
}

.required-badge {
    background: var(--primary-color);
    color: white;
    font-size: 0.7rem;
    padding: 0.25rem 0.5rem;
    border-radius: 20px;
}

.document-description {
    color: var(--gray-500);
    font-size: 0.85rem;
    margin-bottom: 1rem;
    line-height: 1.5;
}

/* Upload Area */
.upload-area {
    background: white;
    border: 2px dashed var(--gray-300);
    border-radius: 12px;
    padding: 1.5rem;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-bottom: 0.5rem;
}

.upload-area:hover {
    border-color: var(--primary-color);
    background: var(--green-50);
    transform: translateY(-2px);
}

.upload-area i {
    font-size: 2rem;
    color: var(--primary-color);
    margin-bottom: 0.5rem;
    transition: transform 0.3s ease;
}

.upload-area:hover i {
    transform: translateY(-5px);
}

.upload-text {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
    margin-bottom: 0.5rem;
}

.primary-text {
    color: var(--dark-color);
    font-weight: 500;
}

.secondary-text {
    color: var(--gray-500);
    font-size: 0.85rem;
}

.file-info {
    display: flex;
    justify-content: center;
    gap: 1rem;
    font-size: 0.75rem;
    color: var(--gray-400);
}

.file-types, .file-size {
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
}

.file-types::before {
    content: "📄";
    font-size: 0.7rem;
}

.file-size::before {
    content: "⚖️";
    font-size: 0.7rem;
}

/* File Info Display */
.file-info-display {
    margin-top: 0.5rem;
    padding: 0.5rem;
    background: var(--success-light);
    border-radius: 8px;
    color: var(--success);
    font-size: 0.85rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
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

/* Verification Warning */
.verification-warning {
    background: var(--warning-light);
    border: 1px solid var(--warning);
    border-radius: 12px;
    padding: 1rem;
    margin-bottom: 2rem;
    display: flex;
    align-items: flex-start;
    gap: 1rem;
}

.verification-warning i {
    font-size: 1.5rem;
    color: var(--warning);
}

.verification-warning h6 {
    color: var(--dark-color);
    font-size: 0.95rem;
    font-weight: 600;
    margin-bottom: 0.25rem;
}

.verification-warning p {
    color: var(--gray-600);
    font-size: 0.85rem;
    margin: 0;
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

.d-none {
    display: none;
}

/* Responsive */
@media (max-width: 1200px) {
    .documents-grid {
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

    .welcome-stats,
    .registration-steps,
    .document-checklist {
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

    .upload-requirements {
        flex-direction: column;
        align-items: center;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // File upload handler
    window.updateFileInfo = function(input, fieldName) {
        const infoDiv = document.getElementById(fieldName + '-info');
        const card = document.getElementById('doc-card-' + fieldName);
        const checklistItem = document.getElementById('checklist-' + fieldName);
        
        if (input.files && input.files[0]) {
            const file = input.files[0];
            const fileSize = (file.size / 1024 / 1024).toFixed(2);
            const fileType = file.name.split('.').pop().toUpperCase();
            
            infoDiv.innerHTML = `
                <i class="fas fa-check-circle"></i>
                <div>
                    <div><strong>${file.name}</strong></div>
                    <small>${fileType} • ${fileSize} MB</small>
                </div>
            `;
            
            // Mark card as uploaded
            card.classList.add('uploaded');
            
            // Update checklist
            if (checklistItem) {
                checklistItem.classList.add('completed');
                checklistItem.querySelector('i').className = 'fas fa-check-circle';
            }
        } else {
            infoDiv.innerHTML = '';
            card.classList.remove('uploaded');
            if (checklistItem) {
                checklistItem.classList.remove('completed');
                checklistItem.querySelector('i').className = 'fas fa-circle';
            }
        }
        
        // Check if all required files are uploaded
        checkAllFilesUploaded();
    };

    // Check if all required files are uploaded
    function checkAllFilesUploaded() {
        const requiredFields = <?php echo json_encode(array_keys($required_docs)); ?>;
        let allUploaded = true;
        
        requiredFields.forEach(field => {
            const input = document.getElementById(field);
            if (!input || !input.files || !input.files[0]) {
                allUploaded = false;
            }
        });
        
        const submitBtn = document.getElementById('submitBtn');
        if (submitBtn) {
            if (allUploaded) {
                submitBtn.disabled = false;
                submitBtn.title = '';
            } else {
                submitBtn.disabled = true;
                submitBtn.title = 'Please upload all required documents';
            }
        }
    }

    // Drag and drop functionality
    document.querySelectorAll('.upload-area').forEach(area => {
        area.addEventListener('dragover', (e) => {
            e.preventDefault();
            area.style.backgroundColor = 'var(--green-50)';
            area.style.borderColor = 'var(--primary-color)';
        });
        
        area.addEventListener('dragleave', (e) => {
            e.preventDefault();
            area.style.backgroundColor = 'white';
            area.style.borderColor = 'var(--gray-300)';
        });
        
        area.addEventListener('drop', (e) => {
            e.preventDefault();
            area.style.backgroundColor = 'white';
            area.style.borderColor = 'var(--gray-300)';
            
            const files = e.dataTransfer.files;
            const inputId = area.parentElement.querySelector('input[type="file"]').id;
            const input = document.getElementById(inputId);
            
            if (files.length > 0) {
                input.files = files;
                updateFileInfo(input, inputId);
            }
        });
    });

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
    const form = document.getElementById('uploadForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            const requiredFields = <?php echo json_encode(array_keys($required_docs)); ?>;
            let missingFiles = [];
            
            requiredFields.forEach(field => {
                const input = document.getElementById(field);
                if (!input || !input.files || !input.files[0]) {
                    missingFiles.push(field);
                }
            });
            
            if (missingFiles.length > 0) {
                e.preventDefault();
                
                // Highlight missing files
                missingFiles.forEach(field => {
                    const card = document.getElementById('doc-card-' + field);
                    if (card) {
                        card.style.borderColor = 'var(--danger)';
                        setTimeout(() => {
                            card.style.borderColor = '';
                        }, 3000);
                    }
                });
                
                alert('Please upload all required documents before continuing.');
            }
        });
    }

    // Initial check
    checkAllFilesUploaded();
});
</script>