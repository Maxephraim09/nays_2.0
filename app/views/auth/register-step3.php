<div class="auth-page">
    <div class="auth-container register-container">
        <!-- Left side - Branding -->
        <div class="auth-left">
            <div class="welcome-content">
                <div class="brand-section">
                    <h1 class="brand-title">NAYS 2.0</h1>
                    <p class="brand-subtitle">National Association of Yung Students</p>
                </div>

                <div class="member-type-indicator">
                    <div class="member-type-badge">
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
                        <span><?php echo ucfirst($member_type); ?> Member</span>
                    </div>
                </div>

                <div class="welcome-features">
                    <?php if ($member_type == 'secondary'): ?>
                        <div class="feature-item">
                            <i class="fas fa-school"></i>
                            <span>Secondary Education Details</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-book"></i>
                            <span>Subject Selection</span>
                        </div>
                    <?php elseif ($member_type == 'tertiary'): ?>
                        <div class="feature-item">
                            <i class="fas fa-university"></i>
                            <span>Higher Education Details</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-graduation-cap"></i>
                            <span>Course & Level Information</span>
                        </div>
                    <?php elseif ($member_type == 'alumni'): ?>
                        <div class="feature-item">
                            <i class="fas fa-user-graduate"></i>
                            <span>Alumni Information</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-briefcase"></i>
                            <span>Professional Details</span>
                        </div>
                    <?php elseif ($member_type == 'diaspora'): ?>
                        <div class="feature-item">
                            <i class="fas fa-globe"></i>
                            <span>International Location</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-passport"></i>
                            <span>Residency Information</span>
                        </div>
                    <?php endif; ?>
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
                        <div class="step active">
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
                    <i class="fas fa-info-circle"></i>
                    <div class="info-content">
                        <h6><?php echo ucfirst($member_type); ?> Membership</h6>
                        <p>
                            <?php
                            $descriptions = [
                                'secondary' => 'For students in JSS1-SSS3. Access to academy and mentorship.',
                                'tertiary' => 'For university, polytechnic, and college students. Full platform access.',
                                'alumni' => 'For graduates. Mentorship opportunities and network access.',
                                'diaspora' => 'For Yungur students abroad. Global community access.',
                                'honorary' => 'For supporters and partners. Limited privileges.'
                            ];
                            echo $descriptions[$member_type] ?? 'Complete your registration';
                            ?>
                        </p>
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
                        <i class="fas 
                            <?php 
                            $icons = [
                                'secondary' => 'fa-school',
                                'tertiary' => 'fa-university',
                                'alumni' => 'fa-user-graduate',
                                'diaspora' => 'fa-globe',
                                'honorary' => 'fa-star'
                            ];
                            echo $icons[$member_type] ?? 'fa-user-graduate';
                            ?>">
                        </i>
                    </div>
                    <h4 class="mb-2"><?php echo ucfirst($member_type); ?> Information</h4>
                    <p class="text-muted mb-0">Step 3: Enter your educational details</p>
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
                    
                    <!-- Progress Bar -->
                    <div class="progress-container mb-4">
                        <div class="progress-info">
                            <span>Step 3 of 5</span>
                            <span>60% Complete</span>
                        </div>
                        <div class="progress-bar-custom">
                            <div class="progress-fill" style="width: 60%"></div>
                        </div>
                    </div>
                    
                    <form method="POST" action="<?php echo url('register/step3'); ?>" class="auth-form" id="registrationForm">
                        <?php echo csrf_field(); ?>
                        
                        <?php if ($member_type == 'secondary'): ?>
                            <!-- Secondary School Form -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-school me-2"></i>School Information
                                </h5>
                                
                                <div class="form-group">
                                    <label for="current_school" class="form-label">
                                        <i class="fas fa-building me-2"></i>Current School Name *
                                    </label>
                                    <input type="text" class="form-control" id="current_school" name="current_school" 
                                           value="<?php echo old('current_school'); ?>" required placeholder="Enter your school name">
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="school_type" class="form-label">
                                            <i class="fas fa-school me-2"></i>School Type *
                                        </label>
                                        <select class="form-select" id="school_type" name="school_type" required>
                                            <option value="">Select School Type</option>
                                            <option value="public" <?php echo old('school_type') == 'public' ? 'selected' : ''; ?>>Public</option>
                                            <option value="private" <?php echo old('school_type') == 'private' ? 'selected' : ''; ?>>Private</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="current_class" class="form-label">
                                            <i class="fas fa-layer-group me-2"></i>Current Class *
                                        </label>
                                        <select class="form-select" id="current_class" name="current_class" required>
                                            <option value="">Select Class</option>
                                            <?php 
                                            $classes = ['JSS1', 'JSS2', 'JSS3', 'SS1', 'SS2', 'SS3'];
                                            foreach($classes as $class): ?>
                                                <option value="<?php echo $class; ?>" <?php echo old('current_class') == $class ? 'selected' : ''; ?>>
                                                    <?php echo $class; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="student_id" class="form-label">
                                            <i class="fas fa-id-card me-2"></i>Student ID/Registration Number *
                                        </label>
                                        <input type="text" class="form-control" id="student_id" name="student_id" 
                                               value="<?php echo old('student_id'); ?>" required placeholder="Enter your student ID">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="expected_graduation" class="form-label">
                                            <i class="fas fa-calendar-check me-2"></i>Expected Graduation Year *
                                        </label>
                                        <input type="number" class="form-control" id="expected_graduation" name="expected_graduation" 
                                               value="<?php echo old('expected_graduation', date('Y') + 3); ?>" 
                                               min="<?php echo date('Y'); ?>" max="<?php echo date('Y') + 6; ?>" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-book-open me-2"></i>Subjects Offering
                                </h5>
                                <p class="section-subtitle">Select the subjects you are currently studying</p>
                                
                                <div class="subjects-grid">
                                    <?php 
                                    $subjects = ['English', 'Mathematics', 'Physics', 'Chemistry', 'Biology', 'Economics', 'Government', 'Literature', 'CRK/IRK', 'Geography', 'History', 'Commerce'];
                                    foreach($subjects as $subject): ?>
                                    <div class="subject-checkbox">
                                        <input type="checkbox" name="subjects[]" value="<?php echo $subject; ?>" 
                                               id="subject_<?php echo $subject; ?>"
                                               <?php echo is_array(old('subjects')) && in_array($subject, old('subjects')) ? 'checked' : ''; ?>>
                                        <label for="subject_<?php echo $subject; ?>"><?php echo $subject; ?></label>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            
                        <?php elseif ($member_type == 'tertiary'): ?>
                            <!-- Tertiary Student Form -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-university me-2"></i>Institution Information
                                </h5>
                                
                                <div class="form-group">
                                    <label for="institution_name" class="form-label">
                                        <i class="fas fa-building me-2"></i>Institution Name *
                                    </label>
                                    <input type="text" class="form-control" id="institution_name" name="institution_name" 
                                           value="<?php echo old('institution_name'); ?>" required placeholder="Enter your institution name">
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="institution_type" class="form-label">
                                            <i class="fas fa-tag me-2"></i>Institution Type *
                                        </label>
                                        <select class="form-select" id="institution_type" name="institution_type" required>
                                            <option value="">Select Type</option>
                                            <?php 
                                            $institution_types = ['University', 'Polytechnic', 'College of Education', 'Other'];
                                            foreach($institution_types as $type): ?>
                                                <option value="<?php echo $type; ?>" <?php echo old('institution_type') == $type ? 'selected' : ''; ?>>
                                                    <?php echo $type; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="faculty" class="form-label">
                                            <i class="fas fa-building me-2"></i>Faculty/Department *
                                        </label>
                                        <input type="text" class="form-control" id="faculty" name="faculty" 
                                               value="<?php echo old('faculty'); ?>" required placeholder="e.g., Faculty of Science">
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="course_of_study" class="form-label">
                                            <i class="fas fa-book me-2"></i>Course of Study *
                                        </label>
                                        <input type="text" class="form-control" id="course_of_study" name="course_of_study" 
                                               value="<?php echo old('course_of_study'); ?>" required placeholder="e.g., Computer Science">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="current_level" class="form-label">
                                            <i class="fas fa-layer-group me-2"></i>Current Level *
                                        </label>
                                        <select class="form-select" id="current_level" name="current_level" required>
                                            <option value="">Select Level</option>
                                            <?php 
                                            $levels = ['100', '200', '300', '400', '500', '600'];
                                            foreach($levels as $level): ?>
                                                <option value="<?php echo $level; ?>" <?php echo old('current_level') == $level ? 'selected' : ''; ?>>
                                                    <?php echo $level; ?> Level
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="matric_number" class="form-label">
                                            <i class="fas fa-id-card me-2"></i>Matriculation Number *
                                        </label>
                                        <input type="text" class="form-control" id="matric_number" name="matric_number" 
                                               value="<?php echo old('matric_number'); ?>" required placeholder="Enter your matric number">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="admission_year" class="form-label">
                                            <i class="fas fa-calendar-alt me-2"></i>Admission Year *
                                        </label>
                                        <input type="number" class="form-control" id="admission_year" name="admission_year" 
                                               value="<?php echo old('admission_year', date('Y')); ?>" 
                                               min="2000" max="<?php echo date('Y'); ?>" required>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="expected_graduation" class="form-label">
                                            <i class="fas fa-calendar-check me-2"></i>Expected Graduation Year *
                                        </label>
                                        <input type="number" class="form-control" id="expected_graduation" name="expected_graduation" 
                                               value="<?php echo old('expected_graduation', date('Y') + 4); ?>" 
                                               min="<?php echo date('Y'); ?>" max="<?php echo date('Y') + 10; ?>" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="cgpa_range" class="form-label">
                                            <i class="fas fa-chart-line me-2"></i>CGPA Range (Optional)
                                        </label>
                                        <select class="form-select" id="cgpa_range" name="cgpa_range">
                                            <option value="">Select Range</option>
                                            <option value="4.5-5.0" <?php echo old('cgpa_range') == '4.5-5.0' ? 'selected' : ''; ?>>4.5 - 5.0</option>
                                            <option value="4.0-4.49" <?php echo old('cgpa_range') == '4.0-4.49' ? 'selected' : ''; ?>>4.0 - 4.49</option>
                                            <option value="3.5-3.99" <?php echo old('cgpa_range') == '3.5-3.99' ? 'selected' : ''; ?>>3.5 - 3.99</option>
                                            <option value="3.0-3.49" <?php echo old('cgpa_range') == '3.0-3.49' ? 'selected' : ''; ?>>3.0 - 3.49</option>
                                            <option value="2.5-2.99" <?php echo old('cgpa_range') == '2.5-2.99' ? 'selected' : ''; ?>>2.5 - 2.99</option>
                                            <option value="2.0-2.49" <?php echo old('cgpa_range') == '2.0-2.49' ? 'selected' : ''; ?>>2.0 - 2.49</option>
                                            <option value="below-2.0" <?php echo old('cgpa_range') == 'below-2.0' ? 'selected' : ''; ?>>Below 2.0</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                        <?php elseif ($member_type == 'alumni'): ?>
                            <!-- Alumni Form -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-graduation-cap me-2"></i>Graduation Information
                                </h5>
                                
                                <div class="form-group">
                                    <label for="grad_institution" class="form-label">
                                        <i class="fas fa-building me-2"></i>Graduation Institution *
                                    </label>
                                    <input type="text" class="form-control" id="grad_institution" name="grad_institution" 
                                           value="<?php echo old('grad_institution'); ?>" required placeholder="Enter your alma mater">
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="graduation_year" class="form-label">
                                            <i class="fas fa-calendar-alt me-2"></i>Graduation Year *
                                        </label>
                                        <input type="number" class="form-control" id="graduation_year" name="graduation_year" 
                                               value="<?php echo old('graduation_year'); ?>" min="1950" max="<?php echo date('Y'); ?>" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="degree_obtained" class="form-label">
                                            <i class="fas fa-certificate me-2"></i>Degree Obtained *
                                        </label>
                                        <input type="text" class="form-control" id="degree_obtained" name="degree_obtained" 
                                               value="<?php echo old('degree_obtained'); ?>" placeholder="e.g., B.Sc. Computer Science" required>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="class_of_degree" class="form-label">
                                            <i class="fas fa-star me-2"></i>Class of Degree *
                                        </label>
                                        <select class="form-select" id="class_of_degree" name="class_of_degree" required>
                                            <option value="">Select Class</option>
                                            <?php 
                                            $degree_classes = ['First Class', 'Second Class Upper', 'Second Class Lower', 'Third Class', 'Pass'];
                                            foreach($degree_classes as $class): ?>
                                                <option value="<?php echo $class; ?>" <?php echo old('class_of_degree') == $class ? 'selected' : ''; ?>>
                                                    <?php echo $class; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="employment_status" class="form-label">
                                            <i class="fas fa-briefcase me-2"></i>Employment Status *
                                        </label>
                                        <select class="form-select" id="employment_status" name="employment_status" required>
                                            <option value="">Select Status</option>
                                            <?php 
                                            $employment_status = ['Employed', 'Self-Employed', 'Unemployed', 'Retired'];
                                            foreach($employment_status as $status): ?>
                                                <option value="<?php echo $status; ?>" <?php echo old('employment_status') == $status ? 'selected' : ''; ?>>
                                                    <?php echo $status; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div id="employmentFields" style="display: <?php echo (old('employment_status') != 'Unemployed' && old('employment_status') != 'Retired') ? 'block' : 'none'; ?>;">
                                <div class="form-section">
                                    <h5 class="section-title">
                                        <i class="fas fa-briefcase me-2"></i>Professional Information
                                    </h5>
                                    
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="employer" class="form-label">
                                                <i class="fas fa-building me-2"></i>Current Employer/Company
                                            </label>
                                            <input type="text" class="form-control" id="employer" name="employer" 
                                                   value="<?php echo old('employer'); ?>" placeholder="Enter your employer name">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="job_title" class="form-label">
                                                <i class="fas fa-user-tie me-2"></i>Job Title/Position
                                            </label>
                                            <input type="text" class="form-control" id="job_title" name="job_title" 
                                                   value="<?php echo old('job_title'); ?>" placeholder="Enter your job title">
                                        </div>
                                    </div>
                                    
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="industry" class="form-label">
                                                <i class="fas fa-chart-pie me-2"></i>Industry
                                            </label>
                                            <input type="text" class="form-control" id="industry" name="industry" 
                                                   value="<?php echo old('industry'); ?>" placeholder="e.g., Technology, Education">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="expertise" class="form-label">
                                                <i class="fas fa-microchip me-2"></i>Professional Expertise
                                            </label>
                                            <input type="text" class="form-control" id="expertise" name="expertise" 
                                                   value="<?php echo old('expertise'); ?>" placeholder="e.g., Software Development">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        <?php elseif ($member_type == 'diaspora'): ?>
                            <!-- Diaspora Form -->
                            <div class="form-section">
                                <h5 class="section-title">
                                    <i class="fas fa-globe me-2"></i>Location Information
                                </h5>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="country" class="form-label">
                                            <i class="fas fa-map-marker-alt me-2"></i>Country of Residence *
                                        </label>
                                        <select class="form-select" id="country" name="country" required>
                                            <option value="">Select Country</option>
                                            <?php 
                                            $countries = ['USA', 'UK', 'Canada', 'Germany', 'France', 'Australia', 'Other'];
                                            foreach($countries as $country): ?>
                                                <option value="<?php echo $country; ?>" <?php echo old('country') == $country ? 'selected' : ''; ?>>
                                                    <?php echo $country; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="city" class="form-label">
                                            <i class="fas fa-city me-2"></i>City *
                                        </label>
                                        <input type="text" class="form-control" id="city" name="city" 
                                               value="<?php echo old('city'); ?>" required placeholder="Enter your city">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="immigration_status" class="form-label">
                                        <i class="fas fa-passport me-2"></i>Immigration Status *
                                    </label>
                                    <input type="text" class="form-control" id="immigration_status" name="immigration_status" 
                                           value="<?php echo old('immigration_status'); ?>" placeholder="e.g., Student Visa, Permanent Resident, Citizen" required>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="current_status" class="form-label">
                                            <i class="fas fa-user-graduate me-2"></i>Current Status *
                                        </label>
                                        <select class="form-select" id="current_status" name="current_status" required>
                                            <option value="">Select Status</option>
                                            <?php 
                                            $status_options = ['Student', 'Working Professional', 'Both', 'Other'];
                                            foreach($status_options as $option): ?>
                                                <option value="<?php echo $option; ?>" <?php echo old('current_status') == $option ? 'selected' : ''; ?>>
                                                    <?php echo $option; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group" id="institutionField" style="display: <?php echo (old('current_status') != 'Other') ? 'block' : 'none'; ?>;">
                                        <label for="institution_company" class="form-label">
                                            <i class="fas fa-building me-2"></i>Institution/Company Name
                                        </label>
                                        <input type="text" class="form-control" id="institution_company" name="institution_company" 
                                               value="<?php echo old('institution_company'); ?>" placeholder="Enter name">
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="how_heard" class="form-label">
                                            <i class="fas fa-question-circle me-2"></i>How did you hear about NAYS? *
                                        </label>
                                        <input type="text" class="form-control" id="how_heard" name="how_heard" 
                                               value="<?php echo old('how_heard'); ?>" required placeholder="e.g., Social media, Friend">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="emergency_contact" class="form-label">
                                            <i class="fas fa-phone-alt me-2"></i>Emergency Contact in Nigeria *
                                        </label>
                                        <input type="text" class="form-control" id="emergency_contact" name="emergency_contact" 
                                               value="<?php echo old('emergency_contact'); ?>" placeholder="Name and Phone Number" required>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <div class="form-actions">
                            <a href="<?php echo url('register/step2'); ?>" class="btn btn-outline-secondary">
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

/* Member Type Indicator */
.member-type-indicator {
    margin-bottom: 2rem;
}

.member-type-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    background: rgba(255,255,255,0.2);
    padding: 0.75rem 1.5rem;
    border-radius: 40px;
    border: 2px solid var(--secondary-color);
}

.member-type-badge i {
    font-size: 1.5rem;
    color: var(--secondary-color);
}

.member-type-badge span {
    font-weight: 600;
    text-transform: capitalize;
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

/* Form Sections */
.form-section {
    margin-bottom: 2rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid var(--gray-200);
}

.form-section:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.section-title {
    color: var(--primary-color);
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
}

.section-subtitle {
    color: var(--gray-500);
    font-size: 0.9rem;
    margin-bottom: 1rem;
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

/* Subjects Grid */
.subjects-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
}

.subject-checkbox {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.subject-checkbox input[type="checkbox"] {
    width: 18px;
    height: 18px;
    cursor: pointer;
    accent-color: var(--primary-color);
}

.subject-checkbox label {
    color: var(--gray-700);
    cursor: pointer;
    font-size: 0.95rem;
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
    .form-row,
    .subjects-grid {
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
    // Show/hide employment fields based on employment status
    const employmentStatus = document.getElementById('employment_status');
    if (employmentStatus) {
        employmentStatus.addEventListener('change', function() {
            const status = this.value;
            const employmentFields = document.getElementById('employmentFields');
            if (status != 'Unemployed' && status != 'Retired') {
                employmentFields.style.display = 'block';
                document.getElementById('employer').required = true;
                document.getElementById('job_title').required = true;
                document.getElementById('industry').required = true;
                document.getElementById('expertise').required = true;
            } else {
                employmentFields.style.display = 'none';
                document.getElementById('employer').required = false;
                document.getElementById('job_title').required = false;
                document.getElementById('industry').required = false;
                document.getElementById('expertise').required = false;
            }
        });
    }

    // Show/hide institution field based on current status
    const currentStatus = document.getElementById('current_status');
    if (currentStatus) {
        currentStatus.addEventListener('change', function() {
            const status = this.value;
            const institutionField = document.getElementById('institutionField');
            if (status != 'Other') {
                institutionField.style.display = 'block';
                document.getElementById('institution_company').required = true;
            } else {
                institutionField.style.display = 'none';
                document.getElementById('institution_company').required = false;
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

    // Add validation for number inputs
    document.querySelectorAll('input[type="number"]').forEach(input => {
        input.addEventListener('input', function() {
            const min = parseInt(this.min);
            const max = parseInt(this.max);
            const value = parseInt(this.value);
            
            if (min && value < min) {
                this.setCustomValidity(`Minimum value is ${min}`);
            } else if (max && value > max) {
                this.setCustomValidity(`Maximum value is ${max}`);
            } else {
                this.setCustomValidity('');
            }
        });
    });
});
</script>