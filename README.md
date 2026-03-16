# NAYS 2.0 - National Association of Yung Students

[![Version](https://img.shields.io/badge/version-2.0.0-blue.svg)](https://github.com/maxwell-ephraim/nays-project)
[![PHP](https://img.shields.io/badge/PHP-8.0+-purple.svg)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-5.7+-orange.svg)](https://mysql.com)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3.0-blue.svg)](https://getbootstrap.com)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)
[![Author](https://img.shields.io/badge/author-Maxwell%20Ephraim%20Halilu-red.svg)](https://www.mgtechs.com.ng)

**A comprehensive digital ecosystem for student governance, education, and community engagement.** NAYS 2.0 unifies 14+ integrated modules into a seamless platform serving 7 distinct user roles across multiple branches and chapters worldwide.

> **Built by [Maxwell Ephraim Halilu](tel:08161595906) | [MG Techs](https://www.mgtechs.com.ng)**  
> *Empowering Yungur students through technology*

---

## 📋 Table of Contents
- [Overview](#-overview)
- [Core Features](#-core-features)
- [User Roles & Permissions](#-user-roles--permissions)
- [Technical Architecture](#-technical-architecture)
- [Quick Start](#-quick-start)
- [Database Schema](#-database-schema)
- [API Reference](#-api-reference)
- [Security](#-security)
- [Deployment](#-deployment)
- [Contact & Support](#-contact--support)
- [License](#-license)

---

## 🎯 Overview

NAYS 2.0 is a modern, feature-rich platform designed to transform how student associations operate in the digital age. Built on a robust PHP MVC architecture by **Maxwell Ephraim Halilu** of **MG Techs**, it provides:

| Feature | Description |
|---------|-------------|
| **Digital Identity** | QR-based member verification with lifetime history tracking |
| **Transparent Governance** | End-to-end encrypted elections with public audit trails |
| **Educational Empowerment** | Gamified JAMB/WAEC CBT preparation with branch competitions |
| **Cultural Preservation** | Community-contributed Yungur archive and language tools |
| **Sustainable Funding** | Integrated donation management and project tracking |
| **Lifelong Engagement** | Seamless student-to-alumni transition with mentorship |

---

## ✨ Core Features

### 🆔 Digital Identity System
- **Unique NAYS ID Generation** with format: `NAYS-[TYPE]-[YEAR]-[SEQUENCE]`
- **QR Code Integration** containing member profile, status, and verification URL
- **Multi-format Digital Card** (downloadable, Apple/Google Wallet compatible)
- **Instant Verification** via QR scanning at events and branch meetings
- **Lifetime Member History** tracking all activities, achievements, and contributions

### 🗳️ Election Management
- **End-to-end Encrypted Voting** with blockchain-ready audit trails
- **Multi-factor Authentication** for all voters
- **Real-time Monitoring** for election observers
- **Fraud Detection** algorithms for pagentry voting
- **Automated Results Tallying** with public verification
- **Vote Receipt System** for personal verification

### 📚 NAYS Academy
- **Full JAMB/WAEC CBT Simulator** with timed examinations
- **Adaptive Learning Algorithms** identifying weak areas
- **Branch vs Branch Competitions** with live leaderboards
- **Performance Analytics** with predictive scoring
- **Achievement Badges** and rewards system
- **Peer Rankings** at branch, state, and national levels

### 🎭 Talent & Culture Hub
- **Multimedia Portfolio Showcase** for artists, tech innovators, and academics
- **Digital Yungur Archive** preserving language, folklore, and history
- **Mentorship Matching Algorithm** connecting students with alumni
- **Job and Opportunity Board** for internships and careers
- **Cultural Preservation Workflows** with elder interview programs

### 💰 Projects & Donations
- **Crowdfunding Campaign Management** with goal tracking
- **Transparent Project Updates** with photo/video documentation
- **Multi-tier Donor Recognition** with public donor wall
- **Real-time Financial Dashboard** for fund allocation
- **Automated Tax Receipt Generation** for donors
- **Impact Reporting** showing project outcomes

### 📢 Communication Suite
- **Multi-channel Announcements** (in-app, email, SMS, push notifications)
- **Priority-based Delivery System** (urgent, important, normal)
- **Blog Platform** with editorial workflow and member contributions
- **Forum System** with topic categorization and moderation
- **Real-time Notifications** for all platform activities

---

## 👥 User Roles & Permissions

### Role Hierarchy
```
                      ┌─────────────────┐
                      │  SUPER ADMIN    │
                      │ (System Owner)  │
                      └────────┬────────┘
                               │
               ┌───────────────┴───────────────┐
               │         NATIONAL ADMIN         │
               └───────────────┬───────────────┘
                               │
        ┌──────────────────────┼──────────────────────┐
        │                      │                      │
┌───────▼───────┐      ┌───────▼───────┐      ┌───────▼───────┐
│  BRANCH       │      │  FINANCE      │      │  ELECTION     │
│  ADMIN        │      │  ADMIN        │      │  COMMISSION   │
└───────┬───────┘      └───────┬───────┘      └───────┬───────┘
        │                      │                      │
┌───────▼───────┐      ┌───────▼───────┐      ┌───────▼───────┐
│ BRANCH        │      │  ALUMNI       │      │  ELECTION     │
│ EXECUTIVES    │      │  ADMIN        │      │  OBSERVERS    │
└───────┬───────┘      └───────────────┘      └───────────────┘
        │
┌───────▼───────┐
│   REGULAR     │
│   MEMBERS     │
└───────────────┘
```

### Detailed Permissions Matrix

| Role | Member Management | Elections | Finance | Content | System |
|------|------------------|-----------|---------|---------|--------|
| **Super Admin** | Full control | Full control | Full access | Full moderation | Configure |
| **National Admin** | Full control | Manage national | View only | Moderate all | View logs |
| **Finance Admin** | View only | No access | Manage | No access | View reports |
| **Alumni Admin** | Manage alumni | No access | View donations | Moderate alumni | No access |
| **Branch Admin** | Manage branch | Manage branch | View branch | Moderate branch | No access |
| **Election Observer** | No access | Monitor only | No access | No access | No access |
| **Member** | Self only | Vote only | Donate | Create content | No access |

---

## 🏗️ Technical Architecture

### System Design
```
┌─────────────────────────────────────────────────────┐
│                    FRONTEND LAYER                    │
│  ┌──────────┐ ┌──────────┐ ┌──────────┐           │
│  │Bootstrap │ │  jQuery  │ │ Chart.js │  FontAwesome│
│  │   5.3    │ │   3.6    │ │   4.4    │     6.5    │
│  └──────────┘ └──────────┘ └──────────┘           │
├─────────────────────────────────────────────────────┤
│                   APPLICATION LAYER                  │
│  ┌────────────┐ ┌────────────┐ ┌────────────┐     │
│  │   Auth     │ │   Users    │ │  Branch    │     │
│  │Controller  │ │ Controller │ │ Controller │     │
│  ├────────────┤ ├────────────┤ ├────────────┤     │
│  │  Election  │ │  Academy   │ │  Portfolio │     │
│  │Controller  │ │ Controller │ │ Controller │     │
│  ├────────────┤ ├────────────┤ ├────────────┤     │
│  │  Project   │ │  Donation  │ │   Forum    │     │
│  │Controller  │ │ Controller │ │ Controller │     │
│  └────────────┘ └────────────┘ └────────────┘     │
├─────────────────────────────────────────────────────┤
│                       CORE LAYER                     │
│  ┌─────────┐ ┌─────────┐ ┌─────────┐ ┌─────────┐  │
│  │ Router  │ │Database │ │Session  │ │  Auth   │  │
│  │         │ │         │ │         │ │         │  │
│  ├─────────┤ ├─────────┤ ├─────────┤ ├─────────┤  │
│  │Validator│ │Uploader │ │ Mailer  │ │   Log   │  │
│  │         │ │         │ │         │ │         │  │
│  └─────────┘ └─────────┘ └─────────┘ └─────────┘  │
├─────────────────────────────────────────────────────┤
│                    DATABASE LAYER                    │
│              ┌─────────────────────┐                │
│              │  MySQL 5.7+ with    │                │
│              │  Foreign Key Constraints             │
│              │  24+ Tables, Optimized Indexing      │
│              └─────────────────────┘                │
└─────────────────────────────────────────────────────┘
```

### Technology Stack

| Layer | Technology | Purpose |
|-------|------------|---------|
| **Backend** | PHP 8.0+ (MVC) | Server-side logic |
| | MySQL 5.7+ | Data persistence |
| | Composer | Dependency management |
| | PDO | Secure database access |
| **Frontend** | Bootstrap 5.3 | Responsive UI framework |
| | jQuery 3.6 | DOM manipulation |
| | Chart.js 4.4 | Data visualization |
| | Font Awesome 6.5 | Icon library |
| **Security** | Bcrypt (cost 10) | Password hashing |
| | JWT | API authentication |
| | CSRF tokens | Form protection |
| | Prepared statements | SQL injection prevention |
| **Development** | XAMPP/WAMP | Local development |
| | Git | Version control |
| | PHPUnit | Testing |

---

## 🚀 Quick Start

### Prerequisites
```bash
# Required
PHP >= 8.0 (with extensions: mysqli, pdo_mysql, gd, mbstring, json)
MySQL >= 5.7
Composer >= 2.0
Apache/Nginx with mod_rewrite

# Recommended
Git
XAMPP/WAMP for local development
Node.js (for asset compilation, optional)
```

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/maxwell-ephraim/nays-project.git
   cd nays-project
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Configure environment**
   ```bash
   cp .env.example .env
   # Edit .env with your credentials
   ```

4. **Set up database**
   ```bash
   # Create database
   mysql -u root -p -e "CREATE DATABASE nays_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
   
   # Import schema
   mysql -u root -p nays_db < database/schema.sql
   ```

5. **Configure web server**

   **For Apache** (in .htaccess):
   ```apache
   <IfModule mod_rewrite.c>
       RewriteEngine On
       RewriteCond %{REQUEST_FILENAME} !-f
       RewriteCond %{REQUEST_FILENAME} !-d
       RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]
   </IfModule>
   ```

   **For Nginx**:
   ```nginx
   location / {
       try_files $uri $uri/ /index.php?$query_string;
   }
   ```

6. **Set permissions**
   ```bash
   chmod -R 755 storage/ public/uploads/
   chmod -R 644 .env
   ```

7. **Create super admin**
   ```bash
   # Generate password hash
   php -r "echo password_hash('YourPassword123!', PASSWORD_BCRYPT, ['cost' => 10]);"
   
   # Run SQL (replace hash with your generated hash)
   mysql -u root -p nays_db -e "
   INSERT INTO users (uuid, email, password_hash, first_name, last_name, member_type, status, email_verified) 
   VALUES (UUID(), 'admin@nays.ng', '\$2y\$10\$YourHashedPassword', 'Super', 'Admin', 'alumni', 'active', TRUE);
   
   INSERT INTO branch_members (user_id, branch_id, role_id, is_primary_branch)
   SELECT u.id, 1, r.id, TRUE FROM users u, roles r 
   WHERE u.email = 'admin@nays.ng' AND r.name = 'super_admin';"
   ```

8. **Start development server**
   ```bash
   php -S localhost:8000 -t public
   ```

9. **Access the application**
   - **Frontend**: http://localhost:8000
   - **Admin Login**: http://localhost:8000/login
   - **Email**: `admin@nays.ng`
   - **Password**: `YourPassword123!` (or whatever you set)

---

## 📁 Project Structure

```
nays-project/
├── .htaccess                    # URL rewriting rules
├── index.php                    # Application entry point
├── composer.json                # PHP dependencies
├── .env.example                 # Environment template
├── .gitignore                   # Git ignore rules
│
├── app/                         # Application core
│   ├── config/                  # Configuration files
│   │   ├── app.php             # App settings
│   │   ├── database.php        # Database config
│   │   ├── mail.php            # Email settings
│   │   └── constants.php       # App constants
│   │
│   ├── controllers/             # MVC Controllers
│   │   ├── AuthController.php
│   │   ├── DashboardController.php
│   │   ├── AdminController.php
│   │   ├── FinanceController.php
│   │   ├── AlumniController.php
│   │   ├── BranchController.php
│   │   ├── ObserverController.php
│   │   ├── UserController.php
│   │   ├── ElectionController.php
│   │   ├── AcademyController.php
│   │   ├── PortfolioController.php
│   │   ├── ProjectController.php
│   │   ├── DonationController.php
│   │   ├── ForumController.php
│   │   ├── AnnouncementController.php
│   │   └── HomeController.php
│   │
│   ├── models/                  # Data models
│   │   ├── User.php
│   │   ├── Branch.php
│   │   ├── Role.php
│   │   ├── BranchMember.php
│   │   ├── MemberDoc.php
│   │   ├── Election.php
│   │   ├── Candidate.php
│   │   ├── Vote.php
│   │   ├── AcademyQuestion.php
│   │   ├── UserProgress.php
│   │   ├── Portfolio.php
│   │   ├── PortfolioItem.php
│   │   ├── Project.php
│   │   ├── ProjectUpdate.php
│   │   ├── Campaign.php
│   │   ├── Donation.php
│   │   ├── Forum.php
│   │   ├── ForumTopic.php
│   │   ├── ForumComment.php
│   │   ├── Announcement.php
│   │   ├── Notification.php
│   │   └── AuditLog.php
│   │
│   ├── views/                   # Template files
│   │   ├── layouts/
│   │   ├── auth/
│   │   ├── home/
│   │   ├── dashboard/
│   │   ├── user/
│   │   ├── branch/
│   │   ├── election/
│   │   ├── academy/
│   │   ├── portfolio/
│   │   ├── project/
│   │   ├── donation/
│   │   ├── forum/
│   │   ├── announcement/
│   │   └── errors/
│   │
│   ├── core/                    # Framework core
│   │   ├── App.php
│   │   ├── Controller.php
│   │   ├── Model.php
│   │   ├── View.php
│   │   ├── Database.php
│   │   ├── Router.php
│   │   ├── Session.php
│   │   ├── Auth.php
│   │   ├── Mailer.php
│   │   ├── Validator.php
│   │   └── Uploader.php
│   │
│   ├── middleware/              # Route middleware
│   │   ├── AuthMiddleware.php
│   │   ├── GuestMiddleware.php
│   │   ├── RoleMiddleware.php
│   │   ├── BranchAdminMiddleware.php
│   │   └── CsrfMiddleware.php
│   │
│   ├── helpers/                 # Helper functions
│   │   ├── functions.php
│   │   ├── auth_helper.php
│   │   └── form_helper.php
│   │
│   └── libraries/               # Third-party integrations
│       ├── PaymentGateway.php
│       ├── SmsGateway.php
│       └── PdfGenerator.php
│
├── public/                      # Web root
│   ├── .htaccess
│   ├── index.php
│   ├── assets/
│   │   ├── css/
│   │   ├── js/
│   │   └── images/
│   └── uploads/
│
├── database/                    # Database files
│   ├── migrations/              # 23 migration files
│   │   ├── 001_create_users_table.sql
│   │   ├── 002_create_branches_table.sql
│   │   ├── 003_create_roles_table.sql
│   │   └── ... (up to 023)
│   └── seeds/                   # Seed data
│
├── routes/                      # Route definitions
│   └── web.php
│
├── storage/                     # File storage
│   ├── logs/
│   ├── cache/
│   └── backups/
│
├── tests/                       # Test files
│   ├── controllers/
│   ├── models/
│   └── unit/
│
├── bootstrap/                   # Application bootstrap
│   └── app.php
│
└── vendor/                      # Composer dependencies
```

---

## 🗄️ Database Schema

### Entity Relationship Diagram

```
┌─────────────────┐       ┌─────────────────┐       ┌─────────────────┐
│     users       │       │    branches     │       │    roles        │
├─────────────────┤       ├─────────────────┤       ├─────────────────┤
│ id (PK)         │───────│ id (PK)         │       │ id (PK)         │
│ uuid            │       │ name            │       │ name            │
│ email           │       │ type            │       │ permissions     │
│ password_hash   │       │ location        │       │ created_at      │
│ first_name      │       │ parent_branch_id│       └─────────────────┘
│ last_name       │       │ created_at      │                │
│ phone           │       └─────────────────┘                │
│ date_of_birth   │                │                         │
│ member_type     │                │                         │
│ status          │                │                         │
└─────────────────┘                │                         │
         │                         │                         │
         │                ┌────────▼────────┐               │
         │                │  branch_members │               │
         │                ├─────────────────┤               │
         │                │ id (PK)         │               │
         │                │ user_id (FK)    │───────────────┘
         │                │ branch_id (FK)  │
         │                │ role_id (FK)    │
         │                │ joined_date     │
         │                │ is_active       │
         │                └─────────────────┘
         │
         │
┌────────▼────────┐     ┌─────────────────┐     ┌─────────────────┐
│  member_docs    │     │   elections     │     │   candidates    │
├─────────────────┤     ├─────────────────┤     ├─────────────────┤
│ id (PK)         │     │ id (PK)         │─────│ id (PK)         │
│ user_id (FK)    │     │ title           │     │ election_id (FK)│
│ document_type   │     │ branch_id (FK)  │     │ user_id (FK)    │
│ document_url    │     │ start_date      │     │ manifesto       │
│ verified        │     │ end_date        │     │ status          │
└─────────────────┘     │ status          │     └─────────────────┘
                        └─────────────────┘              │
                                                          │
                        ┌─────────────────┐              │
                        │     votes       │              │
                        ├─────────────────┤              │
                        │ id (PK)         │              │
                        │ election_id (FK)│──────────────┘
                        │ candidate_id (FK)│
                        │ user_id (FK)    │
                        │ voted_at        │
                        │ receipt_hash    │
                        └─────────────────┘
```

### Key Tables Description

| Table | Records (Est.) | Purpose |
|-------|---------------|---------|
| **users** | 5,000+ | Member profiles and authentication |
| **branches** | 50+ | Organizational units (secondary, tertiary, alumni) |
| **roles** | 7 | Permission definitions |
| **branch_members** | 10,000+ | User-branch-role assignments |
| **elections** | 100+/year | Election campaigns |
| **votes** | 50,000+/year | Encrypted vote storage |
| **academy_questions** | 5,000+ | CBT practice questions |
| **user_progress** | 500,000+ | Learning analytics |
| **donations** | 1,000+/year | Financial transactions |
| **audit_logs** | 100,000+ | Complete activity trail |

---

## 🔌 API Reference

### Base URL
```
https://api.nays.ng/v1
```

### Authentication
All API requests require a Bearer token:
```http
Authorization: Bearer <your_jwt_token>
```

### Rate Limits
| Endpoint Type | Limit |
|---------------|-------|
| Public | 60 requests/minute |
| Authenticated | 120 requests/minute |
| Admin | 300 requests/minute |

### Core Endpoints

#### Authentication
```
POST   /auth/login          - {email, password, mfa_code?}
POST   /auth/register       - Multi-step registration
POST   /auth/logout         - Invalidate token
POST   /auth/refresh        - Refresh expired token
POST   /auth/verify-email   - {token}
POST   /auth/forgot-password - {email}
POST   /auth/reset-password  - {token, password}
GET    /auth/me             - Get current user
```

#### Users
```
GET    /users               - List (paginated, filterable)
GET    /users/:id           - Get profile with relations
PUT    /users/:id           - Update profile
DELETE /users/:id           - Soft delete (admin)
GET    /users/:id/documents - Get verification docs
POST   /users/:id/documents - Upload document
POST   /users/:id/verify    - Verify user (admin)
```

#### Elections
```
GET    /elections           - List with status
POST   /elections           - Create (admin)
GET    /elections/:id       - Get with candidates
POST   /elections/:id/nominate - Apply as candidate
GET    /elections/:id/candidates - List candidates
POST   /elections/:id/vote  - Cast vote {candidate_id}
GET    /elections/:id/results - Get results
GET    /elections/:id/audit  - Get audit trail
```

#### Academy
```
GET    /academy/questions    - {subject?, difficulty?, limit}
POST   /academy/practice/submit - {question_id, answer, time_spent}
GET    /academy/progress/:userId - Get learning progress
GET    /academy/leaderboard   - {branch?, subject?, period}
GET    /academy/stats         - Personal analytics
```

#### Projects & Donations
```
GET    /projects            - List with progress
POST   /projects            - Create proposal
GET    /projects/:id        - Get details
POST   /projects/:id/updates - Add update
GET    /campaigns           - List active
POST   /campaigns/:id/donate - {amount, payment_method}
GET    /donations/receipt/:id - Generate PDF receipt
```

### Response Format
```json
{
  "status": "success",
  "data": {},
  "meta": {
    "timestamp": "2026-03-15T10:30:00Z",
    "version": "2.0.0"
  }
}
```

---

## 🔒 Security

### Security Architecture
```
┌─────────────────────────────────────────────────┐
│                   SECURITY LAYERS                │
├─────────────────────────────────────────────────┤
│  Application Layer                               │
│  ├── CSRF Protection (Tokens on all forms)      │
│  ├── XSS Prevention (Output encoding)           │
│  ├── SQL Injection (Prepared statements)        │
│  └── Input Validation (Whitelist approach)      │
├─────────────────────────────────────────────────┤
│  Authentication Layer                            │
│  ├── Bcrypt Hashing (cost factor 10)           │
│  ├── JWT Tokens (15-minute expiry)             │
│  ├── Refresh Tokens (7-day validity)           │
│  └── MFA Support (TOTP, SMS, Email)            │
├─────────────────────────────────────────────────┤
│  Authorization Layer                             │
│  ├── RBAC (7 roles, granular permissions)      │
│  ├── Middleware (Route-level checks)           │
│  └── Resource Ownership Verification           │
├─────────────────────────────────────────────────┤
│  Infrastructure Layer                            │
│  ├── HTTPS (TLS 1.3)                           │
│  ├── Rate Limiting (Per IP/User)               │
│  ├── File Upload Scanning (ClamAV)             │
│  └── Audit Logging (All critical actions)      │
└─────────────────────────────────────────────────┘
```

### Security Headers
```apache
# .htaccess security headers
Header set X-Frame-Options "SAMEORIGIN"
Header set X-Content-Type-Options "nosniff"
Header set X-XSS-Protection "1; mode=block"
Header set Referrer-Policy "strict-origin-when-cross-origin"
Header set Content-Security-Policy "default-src 'self'; script-src 'self' 'unsafe-inline' https://code.jquery.com; style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net"
```

### Password Policy
- Minimum 8 characters
- At least 1 uppercase letter
- At least 1 lowercase letter
- At least 1 number
- At least 1 special character
- Password history (last 5 passwords prevented)

---

## 🚢 Deployment

### Production Requirements

| Resource | Minimum | Recommended |
|----------|---------|-------------|
| **CPU** | 2 cores | 4+ cores |
| **RAM** | 4 GB | 8+ GB |
| **Storage** | 20 GB SSD | 50+ GB SSD |
| **Bandwidth** | 100 GB/month | 500+ GB/month |
| **PHP Workers** | 10 | 20+ |
| **MySQL Connections** | 50 | 100+ |

### Deployment Checklist

- [ ] **Environment**: Set `APP_ENV=production`, `APP_DEBUG=false`
- [ ] **SSL**: Install valid SSL certificate, force HTTPS
- [ ] **Permissions**: Secure file permissions (755 for dirs, 644 for files)
- [ ] **Optimization**: Enable OPcache, configure MySQL query cache
- [ ] **Backups**: Set up automated daily backups with rotation
- [ ] **Monitoring**: Configure uptime monitoring and error tracking
- [ ] **CDN**: Set up Cloudflare or similar for static assets
- [ ] **Caching**: Implement Redis/Memcached for sessions
- [ ] **Queue**: Set up background job processor for emails
- [ ] **Firewall**: Configure WAF, restrict admin access by IP

### Deployment Script
```bash
#!/bin/bash
# deploy.sh - Production deployment script

echo "🚀 Deploying NAYS 2.0 to production..."

# 1. Pull latest code
git pull origin main

# 2. Install dependencies
composer install --no-dev --optimize-autoloader

# 3. Run database migrations
php migration.php

# 4. Clear cache
rm -rf storage/cache/*

# 5. Set permissions
chmod -R 755 storage/ public/uploads/
chown -R www-data:www-data storage/ public/uploads/

# 6. Restart services
sudo systemctl restart php8.0-fpm
sudo systemctl reload nginx

echo "✅ Deployment complete!"
```

### Environment Variables (.env)
```env
# Application
APP_NAME="NAYS 2.0"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://nays.ng

# Database
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=nays_prod
DB_USERNAME=nays_user
DB_PASSWORD=strong_password_here

# Redis (for sessions/cache)
REDIS_HOST=localhost
REDIS_PORT=6379
REDIS_PASSWORD=

# Mail
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=noreply@nays.ng
MAIL_PASSWORD=app_password
MAIL_ENCRYPTION=tls

# Payment Gateway (Paystack)
PAYSTACK_PUBLIC_KEY=pk_live_xxx
PAYSTACK_SECRET_KEY=sk_live_xxx

# SMS (Twilio)
TWILIO_SID=ACxxx
TWILIO_TOKEN=xxx
TWILIO_FROM=+1234567890

# Security
JWT_SECRET=32-character-random-string
BCRYPT_ROUNDS=10
CSRF_TOKEN_EXPIRY=7200
```

---

## 📊 Performance Optimization

### Database Indexing Strategy
```sql
-- Critical indexes for performance
CREATE INDEX idx_users_email ON users(email);
CREATE INDEX idx_users_status ON users(status);
CREATE INDEX idx_branch_members_user ON branch_members(user_id);
CREATE INDEX idx_branch_members_branch ON branch_members(branch_id);
CREATE INDEX idx_votes_election ON votes(election_id);
CREATE INDEX idx_votes_user ON votes(user_id);
CREATE INDEX idx_notifications_user ON notifications(user_id, is_read);
CREATE INDEX idx_audit_logs_user ON audit_logs(user_id);
CREATE INDEX idx_audit_logs_created ON audit_logs(created_at);
```

### Caching Strategy
| Data Type | Cache Method | TTL |
|-----------|--------------|-----|
| User sessions | Redis | 24 hours |
| Branch lists | Redis | 1 hour |
| Election results | File cache | 5 minutes |
| Academy questions | OPcache | N/A |
| Static assets | Browser cache | 1 year |
| API responses | Redis | 10 minutes |

---

## 🤝 Contributing

We welcome contributions from the community!

### Development Workflow
```
1. Fork repository
2. Create feature branch (git checkout -b feature/amazing)
3. Commit changes (git commit -m 'Add amazing feature')
4. Push to branch (git push origin feature/amazing)
5. Open Pull Request
```

### Coding Standards
- **PHP**: Follow PSR-12
- **JavaScript**: ESLint with Airbnb config
- **CSS**: Bootstrap conventions
- **Database**: Use migrations for schema changes
- **Testing**: Write PHPUnit tests for new features

### Commit Message Format
```
type(scope): subject

body (optional)

footer (optional)
```

**Types**: feat, fix, docs, style, refactor, test, chore  
**Example**: `feat(election): add vote receipt verification`

---

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

## 📞 Contact & Support

### Developer
**Maxwell Ephraim Halilu**  
*Lead Developer & Solutions Architect*  
**MG Techs** - *Experience it*

| Contact | Information |
|---------|-------------|
| 📱 **Phone** | [08161595906](tel:08161595906) |
| 📧 **Email** | [mgtechs09@gmail.com](mailto:mgtechs09@gmail.com) |
| 🌐 **Website** | [www.mgtechs.com.ng](https://www.mgtechs.com.ng) |
| 💼 **GitHub** | [@maxwell-ephraim](https://github.com/Maxephraim09) |
| 🔗 **LinkedIn** | [Maxwell Ephraim Halilu](https://linkedin.com/in/maxwell-ephraim) |

### Official Support Channels
- **Documentation**: [https://docs.nays.ng](https://docs.nays.ng)
- **Issue Tracker**: [GitHub Issues](https://github.com/Maxephraim09/nays_2.0//issues)
- **Community Forum**: [https://community.nays.ng](https://mgtechs.com.ng)
- **Email Support**: [support@nays.ng](mailto:mgtechs09@gmail.com)

### Professional Services
MG Techs offers:
- Custom development and feature additions
- Deployment and server configuration
- Training and documentation
- 24/7 enterprise support
- Security audits and penetration testing

---

## 🙏 Acknowledgments

- **NAYS Leadership** for vision and requirements
- **Yungur Community** for cultural preservation contributions
- **Beta Testers** for invaluable feedback
- **Open Source Community** for amazing tools and libraries

---

## 🏆 Version History

| Version | Date | Highlights |
|---------|------|------------|
| **2.0.0** | March 2026 | Complete rewrite, 14 modules, RBAC, API-first |
| **1.5.0** | Dec 2025 | Added Academy and Talent Hub |
| **1.0.0** | Sep 2025 | Initial release with basic membership |

---

*Built with ❤️ by Maxwell Ephraim Halilu for the National Association of Yung Students (NAYS)*

**Version 2.0.0** | [View Demo](https://mgtechs.com.ng) | [Report Bug](https://github.com/Maxephraim09/nays_2.0/issues) | [Request Feature](https://github.com/Maxephraim09/nays_2.0/issues)

---

## 🎨 Quick Preview

### Dashboard Views
| Role | Preview |
|------|---------|
| **Super Admin** | Full system metrics, user management, configuration |
| **Member** | Personalized feed, academy progress, upcoming events |
| **Branch Admin** | Member roster, pending approvals, branch projects |
| **Finance Admin** | Transaction history, donation analytics, reports |

### Color Scheme
```css
:root {
  --primary: #2E7D32;  /* Forest Green - Growth */
  --secondary: #1565C0; /* Royal Blue - Trust */
  --accent: #FF6F00;    /* Amber - Energy */
  --success: #2E7D32;
  --info: #0288D1;
  --warning: #FFA000;
  --danger: #C62828;
}
```

---

**MG Techs** - *Empowering communities through technology*  
© 2026 Maxwell Ephraim Halilu. All rights reserved.
