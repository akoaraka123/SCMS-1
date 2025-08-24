<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SCMS-1</title>
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
        }
        
        body {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
            overflow-x: hidden;
            padding: 20px 0;
        }
        
        /* Animated background elements */
        body::before,
        body::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 6s ease-in-out infinite;
        }
        
        body::before {
            top: -150px;
            left: -150px;
            animation-delay: 0s;
        }
        
        body::after {
            bottom: -150px;
            right: -150px;
            animation-delay: 3s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        
        .register-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 25px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            width: 100%;
            max-width: 550px;
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: slideInUp 0.8s ease-out;
        }
        
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .register-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .register-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }
        
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        .register-header h3 {
            margin: 0;
            font-weight: 700;
            font-size: 1.8rem;
            position: relative;
            z-index: 1;
        }
        
        .register-header p {
            margin: 15px 0 0 0;
            opacity: 0.9;
            font-size: 1rem;
            position: relative;
            z-index: 1;
        }
        
        .register-body {
            padding: 50px 40px;
        }
        
        .form-floating {
            margin-bottom: 25px;
            position: relative;
        }
        
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 15px;
            padding: 15px 20px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: rgba(255, 255, 255, 0.9);
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.3rem rgba(102, 126, 234, 0.15);
            transform: translateY(-2px);
        }
        
        .form-floating label {
            padding: 15px 20px;
            color: #6c757d;
        }
        
        .btn-register {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            border-radius: 25px;
            padding: 15px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .btn-register::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .btn-register:hover::before {
            left: 100%;
        }
        
        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(102, 126, 234, 0.4);
        }
        
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .password-strength {
            height: 6px;
            border-radius: 10px;
            margin-top: 10px;
            transition: all 0.3s ease;
            background: #e9ecef;
            overflow: hidden;
            position: relative;
        }
        
        .password-strength::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 0;
            transition: all 0.3s ease;
            border-radius: 10px;
        }
        
        .strength-weak::before { 
            background: var(--danger-color);
            width: 33.33%;
        }
        
        .strength-medium::before { 
            background: var(--warning-color);
            width: 66.66%;
        }
        
        .strength-strong::before { 
            background: var(--success-color);
            width: 100%;
        }
        
        .strength-text {
            font-size: 0.8rem;
            margin-top: 5px;
            font-weight: 500;
        }
        
        .strength-weak + .strength-text { color: var(--danger-color); }
        .strength-medium + .strength-text { color: var(--warning-color); }
        .strength-strong + .strength-text { color: var(--success-color); }
        
        .alert {
            border-radius: 15px;
            border: none;
            margin-bottom: 25px;
            animation: slideInDown 0.5s ease-out;
        }
        
        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .alert-danger {
            background: linear-gradient(135deg, var(--danger-color) 0%, #ee5a24 100%);
            color: white;
        }
        
        .alert-success {
            background: linear-gradient(135deg, var(--success-color) 0%, #40c057 100%);
            color: white;
        }
        
        .form-check {
            margin-bottom: 25px;
        }
        
        .form-check-label {
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .form-check-label a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }
        
        .form-check-label a:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }
        
        .login-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .login-link:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }
        
        /* Responsive design */
        @media (max-width: 576px) {
            .register-container {
                margin: 20px;
                max-width: none;
            }
            
            .register-body {
                padding: 30px 25px;
            }
            
            .register-header {
                padding: 30px 25px;
            }
        }
        
        /* Loading state */
        .btn-loading {
            pointer-events: none;
            opacity: 0.7;
        }
        
        .btn-loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            top: 50%;
            left: 50%;
            margin: -10px 0 0 -10px;
            border: 2px solid transparent;
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Progress steps indicator */
        .progress-steps {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            position: relative;
        }
        
        .progress-steps::before {
            content: '';
            position: absolute;
            top: 15px;
            left: 0;
            right: 0;
            height: 2px;
            background: #e9ecef;
            z-index: 1;
        }
        
        .step {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: white;
            border: 2px solid #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 600;
            color: #6c757d;
            position: relative;
            z-index: 2;
            transition: all 0.3s ease;
        }
        
        .step.active {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }
        
        .step.completed {
            background: var(--success-color);
            border-color: var(--success-color);
            color: white;
        }
    </style>
</head>
<body>
    <div class="register-container animate__animated animate__fadeIn">
        <div class="register-header">
            <h3><i class="fas fa-fire me-2 text-warning"></i>Create Account</h3>
            <p>Join our community today</p>
        </div>
        
        <div class="register-body">
            <!-- Progress Steps -->
            <div class="progress-steps">
                <div class="step active" id="step1">1</div>
                <div class="step" id="step2">2</div>
                <div class="step" id="step3">3</div>
                <div class="step" id="step4">4</div>
            </div>
            
            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <?= session()->getFlashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <form method="post" action="<?= base_url('register') ?>" id="registerForm">
                <?= csrf_field() ?>
                
                <div class="form-floating">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>
                    <label for="name"><i class="fas fa-user me-2"></i>Full Name</label>
                </div>
                
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                    <label for="email"><i class="fas fa-envelope me-2"></i>Email Address</label>
                </div>
                
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password"><i class="fas fa-lock me-2"></i>Password</label>
                    <div class="password-strength" id="passwordStrength"></div>
                    <div class="strength-text" id="strengthText">Enter a password</div>
                </div>
                
                <div class="form-floating">
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                    <label for="confirm_password"><i class="fas fa-lock me-2"></i>Confirm Password</label>
                </div>
                
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                    <label class="form-check-label" for="terms">
                        I agree to the <a href="#" class="text-decoration-none">Terms & Conditions</a> and <a href="#" class="text-decoration-none">Privacy Policy</a>
                    </label>
                </div>
                
                <button type="submit" class="btn btn-primary btn-register" id="registerBtn">
                    <i class="fas fa-user-plus me-2"></i>Create Account
                </button>
            </form>
            
            <div class="text-center mt-4">
                <p class="text-muted mb-0">Already have an account?
                    <a href="<?= base_url('login') ?>" class="login-link">Sign In</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
    
    <script>
        // Password strength indicator with enhanced feedback
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthBar = document.getElementById('passwordStrength');
            const strengthText = document.getElementById('strengthText');
            
            if (password.length === 0) {
                strengthBar.className = 'password-strength';
                strengthText.textContent = 'Enter a password';
                strengthText.className = 'strength-text';
                return;
            }
            
            let strength = 0;
            let feedback = [];
            
            if (password.length >= 8) {
                strength++;
                feedback.push('✓ Length (8+)');
            } else {
                feedback.push('✗ Length (8+)');
            }
            
            if (/[a-z]/.test(password)) {
                strength++;
                feedback.push('✓ Lowercase');
            } else {
                feedback.push('✗ Lowercase');
            }
            
            if (/[A-Z]/.test(password)) {
                strength++;
                feedback.push('✓ Uppercase');
            } else {
                feedback.push('✗ Uppercase');
            }
            
            if (/[0-9]/.test(password)) {
                strength++;
                feedback.push('✓ Number');
            } else {
                feedback.push('✗ Number');
            }
            
            if (/[^A-Za-z0-9]/.test(password)) {
                strength++;
                feedback.push('✓ Special char');
            } else {
                feedback.push('✗ Special char');
            }
            
            strengthBar.className = 'password-strength';
            strengthText.className = 'strength-text';
            
            if (strength <= 2) {
                strengthBar.classList.add('strength-weak');
                strengthText.classList.add('strength-weak');
                strengthText.textContent = 'Weak password';
            } else if (strength <= 3) {
                strengthBar.classList.add('strength-medium');
                strengthText.classList.add('strength-medium');
                strengthText.textContent = 'Medium password';
            } else {
                strengthBar.classList.add('strength-strong');
                strengthText.classList.add('strength-strong');
                strengthText.textContent = 'Strong password';
            }
        });

        // Enhanced form validation with step tracking
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            const terms = document.getElementById('terms').checked;
            const registerBtn = document.getElementById('registerBtn');
            
            // Reset previous validation states
            document.querySelectorAll('.form-control').forEach(input => {
                input.classList.remove('is-invalid');
            });
            
            let isValid = true;
            let currentStep = 1;
            
            // Step 1: Basic info validation
            if (!name || !email) {
                e.preventDefault();
                showAlert('Please fill in your name and email', 'danger');
                updateSteps(currentStep);
                return false;
            }
            currentStep++;
            
            // Step 2: Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                e.preventDefault();
                document.getElementById('email').classList.add('is-invalid');
                showAlert('Please enter a valid email address', 'danger');
                updateSteps(currentStep);
                return false;
            }
            currentStep++;
            
            // Step 3: Password validation
            if (password.length < 8) {
                e.preventDefault();
                document.getElementById('password').classList.add('is-invalid');
                showAlert('Password must be at least 8 characters long', 'danger');
                updateSteps(currentStep);
                return false;
            }
            currentStep++;
            
            // Step 4: Password confirmation and terms
            if (password !== confirmPassword) {
                e.preventDefault();
                document.getElementById('confirm_password').classList.add('is-invalid');
                showAlert('Passwords do not match', 'danger');
                updateSteps(currentStep);
                return false;
            }
            
            if (!terms) {
                e.preventDefault();
                showAlert('Please agree to the Terms & Conditions', 'danger');
                updateSteps(currentStep);
                return false;
            }
            
            // Show loading state
            if (isValid) {
                registerBtn.classList.add('btn-loading');
                registerBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Creating Account...';
                updateSteps(4); // Complete all steps
            }
        });
        
        // Update progress steps
        function updateSteps(activeStep) {
            for (let i = 1; i <= 4; i++) {
                const step = document.getElementById(`step${i}`);
                if (i < activeStep) {
                    step.classList.remove('active');
                    step.classList.add('completed');
                } else if (i === activeStep) {
                    step.classList.remove('completed');
                    step.classList.add('active');
                } else {
                    step.classList.remove('active', 'completed');
                }
            }
        }
        
        // Custom alert function
        function showAlert(message, type) {
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
            alertDiv.innerHTML = `
                <i class="fas fa-${type === 'danger' ? 'exclamation-triangle' : 'check-circle'} me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            
            const form = document.getElementById('registerForm');
            form.insertBefore(alertDiv, form.firstChild);
            
            // Auto-hide after 5 seconds
            setTimeout(() => {
                if (alertDiv.parentNode) {
                    alertDiv.remove();
                }
            }, 5000);
        }
        
        // Auto-hide existing alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
        
        // Add floating label animation
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.parentElement.classList.remove('focused');
                }
            });
        });
        
        // Real-time validation feedback
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('input', function() {
                if (this.value) {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                } else {
                    this.classList.remove('is-valid', 'is-invalid');
                }
            });
        });
    </script>
</body>
</html>
