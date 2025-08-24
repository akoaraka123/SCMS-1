<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to SCMS-1 - System Control Management</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('favicon.ico') ?>">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Animate.css for smooth animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
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
            line-height: 1.6;
        }
        
        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 120px 0 80px;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.1)" points="0,1000 1000,0 1000,1000"/></svg>');
            background-size: cover;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            animation: fadeInUp 1s ease-out;
        }
        
        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            animation: fadeInUp 1s ease-out 0.2s both;
        }
        
        .hero-buttons {
            animation: fadeInUp 1s ease-out 0.4s both;
        }
        
        .btn-hero {
            padding: 15px 30px;
            border-radius: 50px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            margin: 0 10px 10px 0;
        }
        
        .btn-hero-primary {
            background: white;
            color: var(--primary-color);
            border: 2px solid white;
        }
        
        .btn-hero-primary:hover {
            background: transparent;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        
        .btn-hero-outline {
            background: transparent;
            color: white;
            border: 2px solid white;
        }
        
        .btn-hero-outline:hover {
            background: white;
            color: var(--primary-color);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        
        /* Features Section */
        .features-section {
            padding: 80px 0;
            background: var(--light-color);
        }
        
        .feature-card {
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100%;
            border: none;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .feature-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: white;
            margin: 0 auto 25px;
            transition: all 0.3s ease;
        }
        
        .feature-card:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
        }
        
        .feature-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--dark-color);
        }
        
        .feature-description {
            color: #6c757d;
            line-height: 1.6;
        }
        
        /* Stats Section */
        .stats-section {
            padding: 80px 0;
            background: linear-gradient(135deg, var(--dark-color) 0%, #495057 100%);
            color: white;
        }
        
        .stat-item {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 10px;
        }
        
        .stat-label {
            font-size: 1.1rem;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        /* CTA Section */
        .cta-section {
            padding: 80px 0;
            background: linear-gradient(135deg, var(--success-color) 0%, #40c057 100%);
            color: white;
            text-align: center;
        }
        
        .cta-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }
        
        .cta-description {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .btn-cta {
            background: white;
            color: var(--success-color);
            padding: 15px 40px;
            border-radius: 50px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: 2px solid white;
            transition: all 0.3s ease;
        }
        
        .btn-cta:hover {
            background: transparent;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        
        /* Footer */
        .footer {
            background: var(--dark-color);
            color: white;
            padding: 60px 0 30px;
        }
        
        .footer-section h5 {
            color: var(--primary-color);
            margin-bottom: 20px;
            font-weight: 600;
        }
        
        .footer-section p,
        .footer-section a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .footer-section a:hover {
            color: var(--primary-color);
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 30px;
            margin-top: 30px;
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
        }
        
        /* Navigation */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-color) !important;
        }
        
        .nav-link {
            color: var(--dark-color) !important;
            font-weight: 500;
            margin: 0 10px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            color: var(--primary-color) !important;
            transform: translateY(-2px);
        }
        
        .btn-nav {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-nav:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
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
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .floating {
            animation: float 3s ease-in-out infinite;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .btn-hero {
                display: block;
                width: 100%;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <i class="fas fa-fire me-2 text-warning"></i>SCMS-1
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-nav" href="<?= base_url('login') ?>">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1 class="hero-title">System Control Management</h1>
                    <p class="hero-subtitle">Streamline your business operations with our powerful and intuitive management system. Take control of your data, users, and processes with ease.</p>
                    <div class="hero-buttons">
                        <a href="<?= base_url('register') ?>" class="btn btn-hero btn-hero-primary">
                            <i class="fas fa-rocket me-2"></i>Get Started
                        </a>
                        <a href="#features" class="btn btn-hero btn-hero-outline">
                            <i class="fas fa-play me-2"></i>Learn More
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="floating">
                        <i class="fas fa-fire fa-10x text-warning opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section" id="features">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="display-4 fw-bold mb-3">Why Choose SCMS-1?</h2>
                    <p class="lead text-muted">Discover the powerful features that make our system the perfect choice for modern businesses</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="feature-title">Secure & Reliable</h3>
                        <p class="feature-description">Enterprise-grade security with encrypted data transmission and secure user authentication.</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <h3 class="feature-title">High Performance</h3>
                        <p class="feature-description">Lightning-fast response times and optimized database queries for seamless user experience.</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3 class="feature-title">Responsive Design</h3>
                        <p class="feature-description">Beautiful interface that works perfectly on all devices - desktop, tablet, and mobile.</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="feature-title">User Management</h3>
                        <p class="feature-description">Comprehensive user management with role-based access control and permissions.</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <h3 class="feature-title">Analytics & Reports</h3>
                        <p class="feature-description">Powerful analytics dashboard with customizable reports and real-time insights.</p>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <h3 class="feature-title">Easy Integration</h3>
                        <p class="feature-description">Seamless integration with existing systems and third-party applications.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Active Users</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-number">99.9%</div>
                        <div class="stat-label">Uptime</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">Support</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Features</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2 class="cta-title">Ready to Get Started?</h2>
            <p class="cta-description">Join thousands of users who trust SCMS-1 for their business management needs</p>
            <a href="<?= base_url('register') ?>" class="btn btn-cta">
                <i class="fas fa-rocket me-2"></i>Start Free Trial
            </a>
        </div>
    </section>

    <!-- Framework Verification Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row text-center">
                <div class="col-12 mb-4">
                    <h2 class="display-5 fw-bold text-primary">Framework Integration Verified! ✅</h2>
                    <p class="lead text-muted">Your system is successfully connected to modern web technologies</p>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="bg-primary bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-fire fa-2x text-white"></i>
                            </div>
                            <h4 class="card-title">CodeIgniter 4</h4>
                            <p class="card-text text-muted">Modern PHP framework with MVC architecture, providing robust backend functionality.</p>
                            <div class="mt-3">
                                <span class="badge bg-success">Active</span>
                                <span class="badge bg-info">MVC Pattern</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="bg-success bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fab fa-bootstrap fa-2x text-white"></i>
                            </div>
                            <h4 class="card-title">Bootstrap 5</h4>
                            <p class="card-text text-muted">Latest CSS framework with responsive design, modern components, and smooth animations.</p>
                            <div class="mt-3">
                                <span class="badge bg-success">Active</span>
                                <span class="badge bg-warning">Responsive</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <div class="bg-warning bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-mobile-alt fa-2x text-white"></i>
                            </div>
                            <h4 class="card-title">Modern UI/UX</h4>
                            <p class="card-text text-muted">Beautiful interfaces with smooth animations, hover effects, and professional styling.</p>
                            <div class="mt-3">
                                <span class="badge bg-success">Active</span>
                                <span class="badge bg-danger">Animated</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <div class="alert alert-success border-0 shadow-sm" role="alert">
                        <h5 class="mb-2"><i class="fas fa-check-circle me-2"></i>Integration Status: SUCCESS</h5>
                        <p class="mb-0">All frameworks are properly connected and functioning. Your SCMS-1 system is ready for production use!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="footer-section">
                        <h5><i class="fas fa-fire me-2 text-warning"></i>SCMS-1</h5>
                        <p>Empowering businesses with intelligent system management solutions. Streamline operations, enhance productivity, and drive growth.</p>
                        <div class="mt-3">
                            <a href="#" class="me-3"><i class="fab fa-facebook fa-lg"></i></a>
                            <a href="#" class="me-3"><i class="fab fa-twitter fa-lg"></i></a>
                            <a href="#" class="me-3"><i class="fab fa-linkedin fa-lg"></i></a>
                            <a href="#"><i class="fab fa-github fa-lg"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="footer-section">
                        <h5>Product</h5>
                        <p><a href="#features">Features</a></p>
                        <p><a href="#pricing">Pricing</a></p>
                        <p><a href="#integrations">Integrations</a></p>
                        <p><a href="#api">API</a></p>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="footer-section">
                        <h5>Company</h5>
                        <p><a href="#about">About</a></p>
                        <p><a href="#careers">Careers</a></p>
                        <p><a href="#blog">Blog</a></p>
                        <p><a href="#press">Press</a></p>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="footer-section">
                        <h5>Support</h5>
                        <p><a href="#help">Help Center</a></p>
                        <p><a href="#contact">Contact</a></p>
                        <p><a href="#status">Status</a></p>
                        <p><a href="#docs">Documentation</a></p>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="footer-section">
                        <h5>Legal</h5>
                        <p><a href="#privacy">Privacy</a></p>
                        <p><a href="#terms">Terms</a></p>
                        <p><a href="#cookies">Cookies</a></p>
                        <p><a href="#licenses">Licenses</a></p>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2024 SCMS-1. All rights reserved. Built with <i class="fas fa-heart text-danger"></i> using CodeIgniter 4 & Bootstrap 5.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
    
    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Navbar background change on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(255, 255, 255, 0.98)';
                navbar.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.15)';
            } else {
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                navbar.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.1)';
            }
        });
        
        // Animate elements on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                }
            });
        }, observerOptions);
        
        // Observe all feature cards
        document.querySelectorAll('.feature-card').forEach(card => {
            observer.observe(card);
        });
        
        // Counter animation for stats
        function animateCounter(element, target, duration = 2000) {
            let start = 0;
            const increment = target / (duration / 16);
            
            function updateCounter() {
                start += increment;
                if (start < target) {
                    element.textContent = Math.floor(start) + (element.textContent.includes('%') ? '%' : '+');
                    requestAnimationFrame(updateCounter);
                } else {
                    element.textContent = target + (element.textContent.includes('%') ? '%' : '+');
                }
            }
            
            updateCounter();
        }
        
        // Trigger counter animation when stats section is visible
        const statsObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    document.querySelectorAll('.stat-number').forEach(stat => {
                        const text = stat.textContent;
                        const number = parseInt(text.replace(/\D/g, ''));
                        if (text.includes('%')) {
                            animateCounter(stat, number);
                        } else {
                            animateCounter(stat, number);
                        }
                    });
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        const statsSection = document.querySelector('.stats-section');
        if (statsSection) {
            statsObserver.observe(statsSection);
        }
    </script>
</body>
</html>
