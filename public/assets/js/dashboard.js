// ========================================
// NAYS 2.0 DASHBOARD JAVASCRIPT
// ========================================

document.addEventListener('DOMContentLoaded', function() {
    // Tab switching functionality
    initializeTabs();

    // Mobile menu functionality
    initializeMobileMenu();

    // Notification dropdown functionality
    initializeNotifications();

    // Profile dropdown functionality
    initializeProfileDropdown();

    // Initialize charts if Chart.js is available
    if (typeof Chart !== 'undefined') {
        initializeCharts();
    }

    // Auto-refresh functionality for live data
    initializeAutoRefresh();
});

// ========================================
// TAB SWITCHING FUNCTIONALITY
// ========================================

function initializeTabs() {
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabPanes = document.querySelectorAll('.tab-pane');

    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const tabId = this.getAttribute('data-tab');

            // Remove active class from all buttons and panes
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabPanes.forEach(pane => pane.classList.remove('active'));

            // Add active class to clicked button and corresponding pane
            this.classList.add('active');
            const targetPane = document.getElementById(tabId);
            if (targetPane) {
                targetPane.classList.add('active');
            }

            // Re-initialize charts in the active tab
            if (typeof Chart !== 'undefined') {
                setTimeout(() => initializeChartsInTab(tabId), 100);
            }
        });
    });
}

// ========================================
// MOBILE MENU FUNCTIONALITY
// ========================================

function initializeMobileMenu() {
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const sidebar = document.querySelector('.dashboard-sidebar');

    if (mobileMenuToggle && sidebar) {
        mobileMenuToggle.addEventListener('click', function() {
            sidebar.classList.toggle('mobile-open');

            // Close sidebar when clicking outside
            document.addEventListener('click', function closeSidebar(e) {
                if (!sidebar.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
                    sidebar.classList.remove('mobile-open');
                    document.removeEventListener('click', closeSidebar);
                }
            });
        });
    }
}

// ========================================
// NOTIFICATION DROPDOWN
// ========================================

function initializeNotifications() {
    const notificationBtn = document.querySelector('.notification-btn');
    const notificationDropdown = document.querySelector('.notification-dropdown-menu');

    if (notificationBtn && notificationDropdown) {
        notificationBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            notificationDropdown.classList.toggle('show');

            // Close when clicking outside
            document.addEventListener('click', function closeDropdown(e) {
                if (!notificationDropdown.contains(e.target) && !notificationBtn.contains(e.target)) {
                    notificationDropdown.classList.remove('show');
                    document.removeEventListener('click', closeDropdown);
                }
            });
        });
    }
}

// ========================================
// PROFILE DROPDOWN
// ========================================

function initializeProfileDropdown() {
    const profileBtn = document.querySelector('.profile-btn');
    const profileDropdown = document.querySelector('.profile-dropdown-menu');

    if (profileBtn && profileDropdown) {
        profileBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            profileDropdown.classList.toggle('show');

            // Close when clicking outside
            document.addEventListener('click', function closeDropdown(e) {
                if (!profileDropdown.contains(e.target) && !profileBtn.contains(e.target)) {
                    profileDropdown.classList.remove('show');
                    document.removeEventListener('click', closeDropdown);
                }
            });
        });
    }
}

// ========================================
// CHART.JS INTEGRATION
// ========================================

function initializeCharts() {
    // Initialize all charts on page load
    initializeUserGrowthChart();
    initializeBranchActivityChart();
    initializeMemberGrowthChart();
    initializeProjectCompletionChart();
    initializeRevenueChart();
    initializeDonationSourcesChart();
    initializeBudgetChart();
    initializePaymentMethodsChart();
    initializeEngagementChart();
    initializeMentorshipChart();
    initializeJobPostingsChart();
    initializeEventAttendanceChart();
    initializeTurnoutChart();
    initializeIntegrityChart();
    initializeReportsChart();
    initializeIncidentsChart();
}

function initializeChartsInTab(tabId) {
    // Re-initialize charts when switching to a tab
    switch(tabId) {
        case 'analytics':
            initializeUserGrowthChart();
            initializeBranchActivityChart();
            break;
        case 'reports':
            initializeMemberGrowthChart();
            initializeProjectCompletionChart();
            break;
        case 'analytics':
            if (document.getElementById('revenueChart')) {
                initializeRevenueChart();
                initializeDonationSourcesChart();
                initializeBudgetChart();
                initializePaymentMethodsChart();
            }
            break;
        case 'analytics':
            if (document.getElementById('engagementChart')) {
                initializeEngagementChart();
                initializeMentorshipChart();
                initializeJobPostingsChart();
                initializeEventAttendanceChart();
            }
            break;
        case 'analytics':
            if (document.getElementById('turnoutChart')) {
                initializeTurnoutChart();
                initializeIntegrityChart();
                initializeReportsChart();
                initializeIncidentsChart();
            }
            break;
    }
}

// Admin Dashboard Charts
function initializeUserGrowthChart() {
    const canvas = document.getElementById('userGrowthChart');
    if (!canvas) return;

    new Chart(canvas, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'New Members',
                data: [120, 150, 180, 200, 250, 300],
                borderColor: '#10b981',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    }
                },
                x: {
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    }
                }
            }
        }
    });
}

function initializeBranchActivityChart() {
    const canvas = document.getElementById('branchActivityChart');
    if (!canvas) return;

    new Chart(canvas, {
        type: 'bar',
        data: {
            labels: ['Lagos', 'Abuja', 'Kano', 'PH', 'Ibadan'],
            datasets: [{
                label: 'Active Members',
                data: [450, 380, 320, 290, 280],
                backgroundColor: '#3b82f6',
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    }
                }
            }
        }
    });
}

// Branch Admin Charts
function initializeMemberGrowthChart() {
    const canvas = document.getElementById('memberGrowthChart');
    if (!canvas) return;

    new Chart(canvas, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Branch Members',
                data: [140, 145, 152, 155, 158, 156],
                borderColor: '#10b981',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: false,
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    }
                }
            }
        }
    });
}

function initializeProjectCompletionChart() {
    const canvas = document.getElementById('projectCompletionChart');
    if (!canvas) return;

    new Chart(canvas, {
        type: 'doughnut',
        data: {
            labels: ['Completed', 'In Progress', 'Planning'],
            datasets: [{
                data: [8, 3, 2],
                backgroundColor: ['#10b981', '#f97316', '#3b82f6'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
}

// Finance Admin Charts
function initializeRevenueChart() {
    const canvas = document.getElementById('revenueChart');
    if (!canvas) return;

    new Chart(canvas, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Monthly Revenue',
                data: [35000, 42000, 38000, 45000, 48000, 52000],
                borderColor: '#10b981',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '₦' + (value / 1000) + 'K';
                        }
                    },
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    }
                }
            }
        }
    });
}

function initializeDonationSourcesChart() {
    const canvas = document.getElementById('donationSourcesChart');
    if (!canvas) return;

    new Chart(canvas, {
        type: 'pie',
        data: {
            labels: ['Individual', 'Corporate', 'Events', 'Fundraisers'],
            datasets: [{
                data: [45, 30, 15, 10],
                backgroundColor: ['#10b981', '#3b82f6', '#f97316', '#06b6d4'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
}

function initializeBudgetChart() {
    const canvas = document.getElementById('budgetChart');
    if (!canvas) return;

    new Chart(canvas, {
        type: 'bar',
        data: {
            labels: ['Allocated', 'Spent', 'Remaining'],
            datasets: [{
                label: 'Budget (₦)',
                data: [500000, 390000, 110000],
                backgroundColor: ['#3b82f6', '#ef4444', '#10b981'],
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '₦' + (value / 1000) + 'K';
                        }
                    }
                }
            }
        }
    });
}

function initializePaymentMethodsChart() {
    const canvas = document.getElementById('paymentMethodsChart');
    if (!canvas) return;

    new Chart(canvas, {
        type: 'doughnut',
        data: {
            labels: ['Bank Transfer', 'Card', 'USSD', 'Wallet'],
            datasets: [{
                data: [40, 35, 15, 10],
                backgroundColor: ['#10b981', '#3b82f6', '#f97316', '#06b6d4'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
}

// Alumni Admin Charts
function initializeEngagementChart() {
    const canvas = document.getElementById('engagementChart');
    if (!canvas) return;

    new Chart(canvas, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Active Alumni',
                data: [850, 920, 880, 950, 1020, 1100],
                borderColor: '#10b981',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: false,
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    }
                }
            }
        }
    });
}

function initializeMentorshipChart() {
    const canvas = document.getElementById('mentorshipChart');
    if (!canvas) return;

    new Chart(canvas, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Mentorship Pairs',
                data: [25, 28, 32, 35, 38, 42],
                backgroundColor: '#3b82f6',
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    }
                }
            }
        }
    });
}

function initializeJobPostingsChart() {
    const canvas = document.getElementById('jobPostingsChart');
    if (!canvas) return;

    new Chart(canvas, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Job Postings',
                data: [15, 18, 22, 20, 25, 28],
                borderColor: '#f97316',
                backgroundColor: 'rgba(249, 115, 22, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    }
                }
            }
        }
    });
}

function initializeEventAttendanceChart() {
    const canvas = document.getElementById('eventAttendanceChart');
    if (!canvas) return;

    new Chart(canvas, {
        type: 'bar',
        data: {
            labels: ['Reunion 1', 'Webinar', 'Networking', 'Workshop', 'Reunion 2'],
            datasets: [{
                label: 'Attendees',
                data: [120, 85, 95, 75, 140],
                backgroundColor: '#06b6d4',
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    }
                }
            }
        }
    });
}

// Election Observer Charts
function initializeTurnoutChart() {
    const canvas = document.getElementById('turnoutChart');
    if (!canvas) return;

    new Chart(canvas, {
        type: 'line',
        data: {
            labels: ['Election 1', 'Election 2', 'Election 3', 'Election 4', 'Election 5', 'Election 6'],
            datasets: [{
                label: 'Voter Turnout %',
                data: [72, 78, 75, 82, 79, 85],
                borderColor: '#10b981',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: false,
                    max: 100,
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    }
                }
            }
        }
    });
}

function initializeIntegrityChart() {
    const canvas = document.getElementById('integrityChart');
    if (!canvas) return;

    new Chart(canvas, {
        type: 'radar',
        data: {
            labels: ['Lagos', 'Abuja', 'Kano', 'PH', 'Ibadan'],
            datasets: [{
                label: 'Integrity Score',
                data: [98, 96, 99, 97, 95],
                borderColor: '#10b981',
                backgroundColor: 'rgba(16, 185, 129, 0.2)',
                pointBackgroundColor: '#10b981'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                r: {
                    beginAtZero: true,
                    max: 100,
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    }
                }
            }
        }
    });
}

function initializeReportsChart() {
    const canvas = document.getElementById('reportsChart');
    if (!canvas) return;

    new Chart(canvas, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Reports Submitted',
                data: [8, 12, 15, 10, 14, 16],
                backgroundColor: '#3b82f6',
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    }
                }
            }
        }
    });
}

function initializeIncidentsChart() {
    const canvas = document.getElementById('incidentsChart');
    if (!canvas) return;

    new Chart(canvas, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Incidents Reported',
                data: [2, 1, 3, 0, 1, 2],
                borderColor: '#ef4444',
                backgroundColor: 'rgba(239, 68, 68, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    }
                }
            }
        }
    });
}

// ========================================
// AUTO-REFRESH FUNCTIONALITY
// ========================================

function initializeAutoRefresh() {
    // Auto-refresh dashboard data every 5 minutes
    setInterval(function() {
        // Only refresh if page is visible
        if (!document.hidden) {
            refreshDashboardData();
        }
    }, 300000); // 5 minutes
}

function refreshDashboardData() {
    // Update notification badges
    updateNotificationBadges();

    // Update live stats if available
    updateLiveStats();

    // Update activity feeds
    updateActivityFeeds();
}

function updateNotificationBadges() {
    // This would typically make an AJAX call to get new notification count
    // For now, we'll just simulate it
    const badges = document.querySelectorAll('.notification-badge');
    badges.forEach(badge => {
        const currentCount = parseInt(badge.textContent) || 0;
        // Simulate occasional new notifications
        if (Math.random() < 0.1) { // 10% chance
            badge.textContent = currentCount + 1;
            badge.style.display = 'flex';
        }
    });
}

function updateLiveStats() {
    // Update live election monitoring stats
    const liveStats = document.querySelectorAll('.stat-change');
    liveStats.forEach(stat => {
        if (stat.textContent.includes('Live') || stat.textContent.includes('ago')) {
            // This would update live election data
            // For demo purposes, we'll leave it static
        }
    });
}

function updateActivityFeeds() {
    // Update timestamps in activity feeds
    const timestamps = document.querySelectorAll('.activity-time');
    timestamps.forEach(timestamp => {
        if (timestamp.textContent.includes('ago')) {
            // This would recalculate relative time
            // For demo purposes, we'll leave it static
        }
    });
}

// ========================================
// UTILITY FUNCTIONS
// ========================================

// Format numbers with commas
function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

// Format currency
function formatCurrency(amount, currency = '₦') {
    return currency + formatNumber(amount);
}

// Debounce function for search inputs
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Export functions for global use
window.DashboardUtils = {
    formatNumber,
    formatCurrency,
    debounce,
    refreshDashboardData
};
