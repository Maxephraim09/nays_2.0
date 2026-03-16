<?php
// ========================================
// PROJECT NAYS 2.0 - WEB ROUTES
// ========================================

// Make sure $router is available
global $router;

if (!$router) {
    die('Router not initialized in routes file');
}

// ========================================
// PUBLIC ROUTES
// ========================================
$router->get('/', 'HomeController@index');
$router->get('/home', 'HomeController@index');
$router->get('/about', 'HomeController@about');
$router->get('/contact', 'HomeController@contact');

// ========================================
// AUTHENTICATION ROUTES
// ========================================
$router->get('/login', 'AuthController@loginForm', ['Guest']);
$router->post('/login', 'AuthController@login', ['Guest']);
$router->get('/logout', 'AuthController@logout', ['Auth']);

// Registration routes
$router->get('/register/step1', 'AuthController@registerStep1', ['Guest']);
$router->post('/register/step1', 'AuthController@registerStep1Post', ['Guest']);
$router->get('/register/step2', 'AuthController@registerStep2', ['Guest']);
$router->post('/register/step2', 'AuthController@registerStep2Post', ['Guest']);
$router->get('/register/step3', 'AuthController@registerStep3', ['Guest']);
$router->post('/register/step3', 'AuthController@registerStep3Post', ['Guest']);
$router->get('/register/step4', 'AuthController@registerStep4', ['Guest']);
$router->post('/register/step4', 'AuthController@registerStep4Post', ['Guest']);
$router->get('/register/step5', 'AuthController@registerStep5', ['Guest']);
$router->post('/register/step5', 'AuthController@registerStep5Post', ['Guest']);
$router->get('/register/complete', 'AuthController@registerComplete', ['Guest']);
$router->get('/register', 'AuthController@redirectToStep1', ['Guest']);

// Password reset
$router->get('/forgot-password', 'AuthController@forgotPasswordForm', ['Guest']);
$router->post('/forgot-password', 'AuthController@forgotPassword', ['Guest']);
$router->get('/reset-password', 'AuthController@resetPasswordForm', ['Guest']);
$router->post('/reset-password', 'AuthController@resetPassword', ['Guest']);
$router->get('/verify-email', 'AuthController@verifyEmail');

// ========================================
// AUTHENTICATED ROUTES
// ========================================
$router->get('/dashboard', 'DashboardController@index', ['Auth']);

// Profile routes
$router->get('/profile', 'UserController@profile', ['Auth']);
$router->post('/profile/update', 'UserController@update', ['Auth']);
$router->post('/profile/upload-photo', 'UserController@uploadPhoto', ['Auth']);
$router->get('/profile/settings', 'UserController@settings', ['Auth']);
$router->post('/profile/settings', 'UserController@updateSettings', ['Auth']);
$router->get('/profile/documents', 'UserController@documents', ['Auth']);
$router->post('/profile/documents/upload', 'UserController@uploadDocument', ['Auth']);

// Branch routes
$router->get('/branches', 'BranchController@index', ['Auth']);
$router->get('/branches/{id}', 'BranchController@view', ['Auth']);
$router->get('/branches/{id}/members', 'BranchController@members', ['Auth']);
$router->post('/branches/{id}/join', 'BranchController@join', ['Auth']);

// Election routes
$router->get('/elections', 'ElectionController@index', ['Auth']);
$router->get('/elections/{id}', 'ElectionController@view', ['Auth']);
$router->get('/elections/{id}/vote', 'ElectionController@voteForm', ['Auth']);
$router->post('/elections/{id}/vote', 'ElectionController@vote', ['Auth']);
$router->get('/elections/{id}/results', 'ElectionController@results', ['Auth']);
$router->get('/elections/{id}/nominate', 'ElectionController@nominateForm', ['Auth']);
$router->post('/elections/{id}/nominate', 'ElectionController@nominate', ['Auth']);

// Academy routes
$router->get('/academy', 'AcademyController@index', ['Auth']);
$router->get('/academy/practice', 'AcademyController@practice', ['Auth']);
$router->post('/academy/submit', 'AcademyController@submitAnswer', ['Auth']);
$router->get('/academy/simulate/{subject}', 'AcademyController@simulation', ['Auth']);
$router->get('/academy/leaderboard', 'AcademyController@leaderboard', ['Auth']);
$router->get('/academy/progress', 'AcademyController@progress', ['Auth']);

// Portfolio routes
$router->get('/portfolio', 'PortfolioController@index', ['Auth']);
$router->get('/portfolio/{id}', 'PortfolioController@view');
$router->get('/portfolio/create', 'PortfolioController@create', ['Auth']);
$router->post('/portfolio/store', 'PortfolioController@store', ['Auth']);
$router->get('/portfolio/edit/{id}', 'PortfolioController@edit', ['Auth']);
$router->post('/portfolio/update/{id}', 'PortfolioController@update', ['Auth']);
$router->post('/portfolio/add-item', 'PortfolioController@addItem', ['Auth']);

// Project routes
$router->get('/projects', 'ProjectController@index', ['Auth']);
$router->get('/projects/{id}', 'ProjectController@view', ['Auth']);
$router->get('/projects/create', 'ProjectController@create', ['Auth']);
$router->post('/projects/store', 'ProjectController@store', ['Auth']);
$router->post('/projects/{id}/update', 'ProjectController@addUpdate', ['Auth']);

// Donation routes
$router->get('/donate', 'DonationController@campaigns', ['Auth']);
$router->get('/donate/{id}', 'DonationController@viewCampaign', ['Auth']);
$router->post('/donate/{id}', 'DonationController@processDonation', ['Auth']);
$router->get('/donations/my', 'DonationController@myDonations', ['Auth']);

// Forum routes
$router->get('/forum', 'ForumController@index', ['Auth']);
$router->get('/forum/{id}', 'ForumController@viewForum', ['Auth']);
$router->get('/topic/{id}', 'ForumController@viewTopic', ['Auth']);
$router->post('/topic/create', 'ForumController@createTopic', ['Auth']);
$router->post('/topic/{id}/reply', 'ForumController@reply', ['Auth']);

// Announcement routes
$router->get('/announcements', 'AnnouncementController@index', ['Auth']);
$router->get('/announcements/{id}', 'AnnouncementController@view', ['Auth']);

// ========================================
// ADMIN ROUTES
// ========================================
$router->get('/admin', 'AdminController@dashboard', ['Auth', 'Role:super_admin,national_admin']);
$router->get('/admin/users', 'AdminController@users', ['Auth', 'Role:super_admin,national_admin']);
$router->get('/admin/branches', 'AdminController@branches', ['Auth', 'Role:super_admin,national_admin']);
$router->post('/admin/branches/create', 'AdminController@createBranch', ['Auth', 'Role:super_admin,national_admin']);
$router->get('/admin/elections', 'AdminController@elections', ['Auth', 'Role:super_admin,national_admin']);
$router->post('/admin/elections/create', 'AdminController@createElection', ['Auth', 'Role:super_admin,national_admin']);
$router->get('/admin/projects', 'AdminController@projects', ['Auth', 'Role:super_admin,national_admin']);
$router->post('/admin/projects/{id}/approve', 'AdminController@approveProject', ['Auth', 'Role:super_admin,national_admin']);

// FINANCE ADMIN ROUTES
// ========================================
$router->get('/finance', 'FinanceController@dashboard', ['Auth', 'Role:finance_admin']);
$router->get('/finance/donations', 'FinanceController@donations', ['Auth', 'Role:finance_admin']);
$router->get('/finance/payments', 'FinanceController@payments', ['Auth', 'Role:finance_admin']);
$router->get('/finance/reports', 'FinanceController@reports', ['Auth', 'Role:finance_admin']);
$router->get('/finance/budget', 'FinanceController@budget', ['Auth', 'Role:finance_admin']);

// ALUMNI ADMIN ROUTES
// ========================================
$router->get('/alumni', 'AlumniController@dashboard', ['Auth', 'Role:alumni_admin']);
$router->get('/alumni/directory', 'AlumniController@directory', ['Auth', 'Role:alumni_admin']);
$router->get('/alumni/jobs', 'AlumniController@jobs', ['Auth', 'Role:alumni_admin']);
$router->post('/alumni/jobs/create', 'AlumniController@createJob', ['Auth', 'Role:alumni_admin']);
$router->get('/alumni/mentorship', 'AlumniController@mentorship', ['Auth', 'Role:alumni_admin']);
$router->get('/alumni/events', 'AlumniController@events', ['Auth', 'Role:alumni_admin']);

// BRANCH ADMIN ROUTES
// ========================================
$router->get('/branch', 'BranchController@dashboard', ['Auth', 'Role:branch_admin']);
$router->get('/branch/members', 'BranchController@members', ['Auth', 'Role:branch_admin']);
$router->get('/branch/elections', 'BranchController@elections', ['Auth', 'Role:branch_admin']);
$router->get('/branch/projects', 'BranchController@projects', ['Auth', 'Role:branch_admin']);
$router->get('/branch/reports', 'BranchController@reports', ['Auth', 'Role:branch_admin']);

// ELECTION OBSERVER ROUTES
// ========================================
$router->get('/observer', 'ObserverController@dashboard', ['Auth', 'Role:election_observer']);
$router->get('/observer/elections', 'ObserverController@elections', ['Auth', 'Role:election_observer']);
$router->get('/observer/reports', 'ObserverController@reports', ['Auth', 'Role:election_observer']);
$router->post('/observer/reports/submit', 'ObserverController@submitReport', ['Auth', 'Role:election_observer']);

// ========================================
// TEST ROUTES (remove in production)
// ========================================
$router->get('/test', 'TestController@index');
$router->get('/test/{id}', 'TestController@param');