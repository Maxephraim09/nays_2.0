<?php
// ========================================
// APPLICATION CONSTANTS
// ========================================

defined('NAYS_ACCESS') or define('NAYS_ACCESS', true);

// Member types
define('MEMBER_TYPES', [
    'secondary' => 'Secondary School',
    'tertiary' => 'Tertiary Student',
    'alumni' => 'Alumni',
    'diaspora' => 'Diaspora',
    'honorary' => 'Honorary'
]);

// Branch types
define('BRANCH_TYPES', [
    'secondary' => 'Secondary Branch',
    'tertiary' => 'Tertiary Branch',
    'alumni' => 'Alumni Chapter',
    'diaspora' => 'Diaspora Branch'
]);

// Membership fees
define('FEE_SECONDARY', 1000);
define('FEE_TERTIARY', 2000);
define('FEE_ALUMNI_YEARLY', 5000);
define('FEE_ALUMNI_LIFETIME', 50000);
define('FEE_DIASPORA', 20); // USD
define('FEE_PAGEANT_ENTRY', 5000);
define('VOTE_PRICE', 100);

// Document types
define('DOCUMENT_TYPES', [
    'id_card' => 'ID Card',
    'admission_letter' => 'Admission Letter',
    'certificate' => 'Certificate',
    'photo' => 'Passport Photo',
    'birth_cert' => 'Birth Certificate',
    'consent_form' => 'Parent Consent Form',
    'nysc' => 'NYSC Certificate'
]);

// Election statuses
define('ELECTION_STATUSES', [
    'draft' => 'Draft',
    'nomination' => 'Nomination',
    'campaign' => 'Campaign',
    'voting' => 'Voting',
    'completed' => 'Completed',
    'cancelled' => 'Cancelled'
]);

// Project categories
define('PROJECT_CATEGORIES', [
    'education' => 'Education Support',
    'community' => 'Community Development',
    'health' => 'Health & Sanitation',
    'infrastructure' => 'Infrastructure',
    'skills' => 'Skills Acquisition',
    'culture' => 'Cultural Preservation'
]);

// Notification types
define('NOTIFICATION_TYPES', [
    'election' => 'Election',
    'project' => 'Project',
    'forum' => 'Forum',
    'announcement' => 'Announcement',
    'achievement' => 'Achievement',
    'reminder' => 'Reminder',
    'message' => 'Message'
]);

// Academy subjects
define('ACADEMY_SUBJECTS', [
    'english' => 'English Language',
    'mathematics' => 'Mathematics',
    'physics' => 'Physics',
    'chemistry' => 'Chemistry',
    'biology' => 'Biology',
    'economics' => 'Economics',
    'government' => 'Government',
    'literature' => 'Literature',
    'crk' => 'CRK',
    'irk' => 'IRK',
    'geography' => 'Geography'
]);

// Payment methods
define('PAYMENT_METHODS', [
    'card' => 'Card Payment',
    'transfer' => 'Bank Transfer',
    'cash' => 'Cash',
    'ussd' => 'USSD'
]);

// File upload limits
define('MAX_FILE_SIZE', 5242880); // 5MB
define('ALLOWED_IMAGES', ['jpg', 'jpeg', 'png', 'gif']);
define('ALLOWED_DOCUMENTS', ['pdf', 'doc', 'docx']);
define('ALLOWED_VIDEOS', ['mp4', 'avi', 'mov']);