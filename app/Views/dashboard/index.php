<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - SCMS-1</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('favicon.ico') ?>">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js for charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --success-color: #51cf66;
            --danger-color: #ff6b6b;
            --warning-color: #ffd43b;
            --info-color: #74c0fc;
            --dark-color: #343a40;
            --light-color: #f8f9fa;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--light-color);
        }
        
        .sidebar {
            background: linear-gradient(180deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            min-height: 100vh;
            color: white;
            position: fixed;
            width: 250px;
            z-index: 1000;
            transition: all 0.3s ease;
        }
        
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 15px 25px;
            margin: 5px 15px;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .sidebar .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: left 0.5s;
        }
        
        .sidebar .nav-link:hover::before,
        .sidebar .nav-link.active::before {
            left: 100%;
        }
        
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.15);
            transform: translateX(8px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        
        .sidebar .nav-link i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
        }
        
        .main-content {
            margin-left: 250px;
            min-height: 100vh;
            transition: all 0.3s ease;
        }
        
        .top-nav {
            background: white;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 20px 30px;
            position: sticky;
            top: 0;
            z-index: 999;
            backdrop-filter: blur(10px);
        }
        
        .stats-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            position: relative;
            overflow: hidden;
        }
        
        .stats-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        }
        
        .stats-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }
        
        .stats-icon {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        
        .stats-card:hover .stats-icon {
            transform: scale(1.1) rotate(5deg);
        }
        
        .bg-primary-gradient {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        }
        
        .bg-success-gradient {
            background: linear-gradient(135deg, var(--success-color) 0%, #40c057 100%);
        }
        
        .bg-warning-gradient {
            background: linear-gradient(135deg, var(--warning-color) 0%, #fcc419 100%);
        }
        
        .bg-info-gradient {
            background: linear-gradient(135deg, var(--info-color) 0%, #4dabf7 100%);
        }
        
        .user-info {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            border: none;
        }
        
        .user-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            color: white;
            margin: 0 auto 25px;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
            transition: all 0.3s ease;
        }
        
        .user-avatar:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
        }
        
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            border-radius: 20px 20px 0 0 !important;
            border: none;
            padding: 20px 25px;
        }
        
        .timeline-item {
            padding: 15px 0;
            border-left: 2px solid #e9ecef;
            padding-left: 20px;
            position: relative;
        }
        
        .timeline-item:last-child {
            border-left: none;
        }
        
        .timeline-marker {
            position: absolute;
            left: -8px;
            top: 20px;
            width: 16px;
            height: 16px;
            border: 3px solid white;
            box-shadow: 0 0 0 3px var(--primary-color);
        }
        
        .btn-toggle-sidebar {
            display: none;
            background: var(--primary-color);
            border: none;
            color: white;
            padding: 10px 15px;
            border-radius: 10px;
        }
        
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--danger-color);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 100%;
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .btn-toggle-sidebar {
                display: block;
            }
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: var(--secondary-color);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="text-center mb-4 pt-3">
            <h4 class="mb-2"><i class="fas fa-fire me-2 text-warning"></i>SCMS-1</h4>
            <p class="mb-0 opacity-75 small">System Control Management</p>
            <hr class="my-3 opacity-25">
        </div>
        
        <nav class="nav flex-column">
            <a class="nav-link active" href="<?= base_url('dashboard') ?>">
                <i class="fas fa-tachometer-alt"></i>Dashboard
            </a>
            <a class="nav-link" href="#">
                <i class="fas fa-users"></i>Users Management
                <span class="badge bg-danger ms-auto">3</span>
            </a>
            <a class="nav-link" href="#">
                <i class="fas fa-chart-bar"></i>Analytics
            </a>
            <a class="nav-link" href="#">
                <i class="fas fa-cog"></i>Settings
            </a>
            <a class="nav-link" href="#">
                <i class="fas fa-file-alt"></i>Reports
            </a>
            <a class="nav-link" href="#">
                <i class="fas fa-bell"></i>Notifications
                <span class="notification-badge">5</span>
            </a>
            <hr class="my-3 opacity-25">
            <a class="nav-link" href="<?= base_url('logout') ?>">
                <i class="fas fa-sign-out-alt"></i>Logout
            </a>
        </nav>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navigation -->
        <div class="top-nav d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <button class="btn-toggle-sidebar me-3" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
                <h4 class="mb-0">Dashboard</h4>
            </div>
            <div class="d-flex align-items-center">
                <div class="dropdown me-3">
                    <button class="btn btn-outline-primary position-relative" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-bell me-1"></i>Notifications
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">5</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><h6 class="dropdown-header">Recent Notifications</h6></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user-plus me-2 text-success"></i>New user registered</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-exclamation-triangle me-2 text-warning"></i>System maintenance scheduled</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-bell me-2"></i>View all notifications</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle me-1"></i><?= $user['name'] ?? 'User' ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>My Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?= base_url('logout') ?>"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Dashboard Content -->
        <div class="p-4">
            <!-- Welcome Section -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card bg-primary text-white">
                        <div class="card-body p-4">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h3 class="mb-2">Welcome back, <?= $user['name'] ?? 'User' ?>! 👋</h3>
                                    <p class="mb-0 opacity-75">Here's what's happening with your system today.</p>
                                </div>
                                <div class="col-md-4 text-md-end">
                                    <i class="fas fa-chart-line fa-3x opacity-50"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Stats Cards -->
            <div class="row mb-4">
                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="stats-card animate-fade-in-up">
                        <div class="stats-icon bg-primary-gradient">
                            <i class="fas fa-users text-white"></i>
                        </div>
                        <h3 class="mb-1">1,234</h3>
                        <p class="text-muted mb-0">Total Users</p>
                        <small class="text-success"><i class="fas fa-arrow-up me-1"></i>12% increase</small>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="stats-card animate-fade-in-up" style="animation-delay: 0.1s;">
                        <div class="stats-icon bg-success-gradient">
                            <i class="fas fa-check-circle text-white"></i>
                        </div>
                        <h3 class="mb-1">856</h3>
                        <p class="text-muted mb-0">Active Users</p>
                        <small class="text-success"><i class="fas fa-arrow-up me-1"></i>8% increase</small>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="stats-card animate-fade-in-up" style="animation-delay: 0.2s;">
                        <div class="stats-icon bg-warning-gradient">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                        <h3 class="mb-1">378</h3>
                        <p class="text-muted mb-0">Pending</p>
                        <small class="text-warning"><i class="fas fa-arrow-down me-1"></i>3% decrease</small>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="stats-card animate-fade-in-up" style="animation-delay: 0.3s;">
                        <div class="stats-icon bg-info-gradient">
                            <i class="fas fa-chart-line text-white"></i>
                        </div>
                        <h3 class="mb-1">92%</h3>
                        <p class="text-muted mb-0">Success Rate</p>
                        <small class="text-success"><i class="fas fa-arrow-up me-1"></i>5% increase</small>
                    </div>
                </div>
            </div>
            
            <!-- Charts and User Info -->
            <div class="row">
                <div class="col-lg-8 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="fas fa-chart-line me-2"></i>System Performance</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="performanceChart" height="100"></canvas>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 mb-4">
                    <div class="user-info">
                        <div class="user-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <h5 class="text-center mb-3"><?= $user['name'] ?? 'User Name' ?></h5>
                        <div class="text-center mb-3">
                            <span class="badge bg-primary fs-6"><?= ucfirst($user['role'] ?? 'User') ?></span>
                        </div>
                        <div class="row text-center mb-3">
                            <div class="col-6">
                                <h6 class="mb-1 text-muted">Email</h6>
                                <small class="text-muted"><?= $user['email'] ?? 'user@example.com' ?></small>
                            </div>
                            <div class="col-6">
                                <h6 class="mb-1 text-muted">Last Login</h6>
                                <small class="text-muted"><?= $user['last_login'] ?? 'Never' ?></small>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-outline-primary">
                                <i class="fas fa-edit me-2"></i>Edit Profile
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Activity and Quick Actions -->
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="fas fa-history me-2"></i>Recent Activity</h5>
                        </div>
                        <div class="card-body">
                            <div class="timeline">
                                <div class="timeline-item">
                                    <div class="timeline-marker bg-primary"></div>
                                    <div>
                                        <h6 class="mb-1">User Login</h6>
                                        <p class="text-muted mb-0"><?= $user['name'] ?? 'User' ?> logged in successfully</p>
                                        <small class="text-muted">Just now</small>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-marker bg-success"></div>
                                    <div>
                                        <h6 class="mb-1">System Update</h6>
                                        <p class="text-muted mb-0">System updated to version 2.1.0</p>
                                        <small class="text-muted">2 hours ago</small>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <div class="timeline-marker bg-warning"></div>
                                    <div>
                                        <h6 class="mb-1">New User Registration</h6>
                                        <p class="text-muted mb-0">New user registered: john@example.com</p>
                                        <small class="text-muted">5 hours ago</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="fas fa-bolt me-2"></i>Quick Actions</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-6">
                                    <button class="btn btn-outline-primary w-100 h-100 py-3">
                                        <i class="fas fa-user-plus fa-2x mb-2 d-block"></i>
                                        Add User
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-outline-success w-100 h-100 py-3">
                                        <i class="fas fa-file-export fa-2x mb-2 d-block"></i>
                                        Export Data
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-outline-warning w-100 h-100 py-3">
                                        <i class="fas fa-cog fa-2x mb-2 d-block"></i>
                                        Settings
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-outline-info w-100 h-100 py-3">
                                        <i class="fas fa-chart-bar fa-2x mb-2 d-block"></i>
                                        Reports
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
    
    <script>
        // Toggle sidebar on mobile
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }
        
        // Performance Chart
        const ctx = document.getElementById('performanceChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'System Performance',
                    data: [85, 88, 92, 89, 95, 91],
                    borderColor: '#667eea',
                    backgroundColor: 'rgba(102, 126, 234, 0.1)',
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
                        max: 100
                    }
                }
            }
        });
        
        // Add hover effects to stats cards
        document.querySelectorAll('.stats-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
        
        // Auto-refresh notifications count (simulate real-time updates)
        setInterval(() => {
            const notificationBadge = document.querySelector('.notification-badge');
            if (notificationBadge) {
                const currentCount = parseInt(notificationBadge.textContent);
                if (currentCount > 0) {
                    notificationBadge.textContent = currentCount - 1;
                }
            }
        }, 30000); // Every 30 seconds
    </script>
</body>
</html>
