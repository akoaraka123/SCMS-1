<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;

class Auth extends BaseController
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = session();
    }

    public function login()
    {
        // If user is already logged in, redirect to dashboard
        if ($this->session->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }
        
        return view('auth/login');
    }

    public function loginSubmit(): RedirectResponse
    {
        // CSRF protection is handled automatically by CodeIgniter
        // No need for manual validation here

        // Get form data
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $remember = $this->request->getPost('remember');

        // Basic validation
        if (empty($email) || empty($password)) {
            $this->session->setFlashdata('error', 'Please fill in all fields.');
            return redirect()->back();
        }

        // Email format validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->session->setFlashdata('error', 'Please enter a valid email address.');
            return redirect()->back();
        }

        // Check for brute force attempts
        $attempts = $this->session->get('login_attempts') ?? 0;
        if ($attempts >= 5) {
            $this->session->setFlashdata('error', 'Too many login attempts. Please try again later.');
            return redirect()->back();
        }

        try {
            // Find user by email
            $user = $this->userModel->where('email', $email)->first();

            if (!$user) {
                $this->incrementLoginAttempts();
                $this->session->setFlashdata('error', 'Invalid email or password.');
                return redirect()->back();
            }

            // Verify password (temporarily using plain text for testing)
            if ($password !== $user['password']) {
                $this->incrementLoginAttempts();
                $this->session->setFlashdata('error', 'Invalid email or password.');
                return redirect()->back();
            }

            // Check if user is active (you can add an 'active' field to your users table)
            if (isset($user['active']) && !$user['active']) {
                $this->session->setFlashdata('error', 'Your account is deactivated. Please contact administrator.');
                return redirect()->back();
            }

            // Reset login attempts on successful login
            $this->session->remove('login_attempts');

            // Set session data
            $sessionData = [
                'user_id'    => $user['id'],
                'user_name'  => $user['name'] ?? $user['email'],
                'user_email' => $user['email'],
                'isLoggedIn' => true,
                'login_time' => time()
            ];

            // Add role if exists
            if (isset($user['role'])) {
                $sessionData['user_role'] = $user['role'];
            }

            $this->session->set($sessionData);

            // Set remember me cookie if requested
            if ($remember) {
                $this->setRememberMeCookie($user['id']);
            }

            // Log successful login
            log_message('info', "User {$user['email']} logged in successfully from IP: " . $this->request->getIPAddress());

            $this->session->setFlashdata('success', 'Welcome back, ' . ($user['name'] ?? $user['email']) . '!');
            return redirect()->to('/dashboard');

        } catch (\Exception $e) {
            log_message('error', 'Login error: ' . $e->getMessage());
            $this->session->setFlashdata('error', 'An error occurred. Please try again.');
            return redirect()->back();
        }
    }

    public function logout(): RedirectResponse
    {
        // Log logout
        if ($this->session->get('user_email')) {
            log_message('info', "User {$this->session->get('user_email')} logged out");
        }

        // Clear remember me cookie
        $this->clearRememberMeCookie();

        // Destroy session
        $this->session->destroy();
        
        $this->session->setFlashdata('success', 'You have been logged out successfully.');
        return redirect()->to('/login');
    }

    public function forgotPassword()
    {
        return view('auth/forgot_password');
    }

    public function resetPassword()
    {
        return "Reset password process...";
    }

    public function register()
    {
        // If user is already logged in, redirect to dashboard
        if ($this->session->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }
        
        return view('auth/register');
    }

    public function registerSubmit(): RedirectResponse
    {
        // Get form data
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'confirm_password' => $this->request->getPost('confirm_password'),
            'role' => 'user', // Default role for new registrations
            'active' => 1
        ];

        // Validation
        if (empty($data['name']) || empty($data['email']) || empty($data['password'])) {
            $this->session->setFlashdata('error', 'Please fill in all fields.');
            return redirect()->back();
        }

        if ($data['password'] !== $data['confirm_password']) {
            $this->session->setFlashdata('error', 'Passwords do not match.');
            return redirect()->back();
        }

        if (strlen($data['password']) < 8) {
            $this->session->setFlashdata('error', 'Password must be at least 8 characters long.');
            return redirect()->back();
        }

        try {
            // Check if email already exists
            $existingUser = $this->userModel->where('email', $data['email'])->first();
            if ($existingUser) {
                $this->session->setFlashdata('error', 'Email already registered.');
                return redirect()->back();
            }

            // Create user
            $this->userModel->insert([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'], // Will be hashed by model
                'role' => $data['role'],
                'active' => $data['active']
            ]);

            $this->session->setFlashdata('success', 'Registration successful! Please log in.');
            return redirect()->to('/login');

        } catch (\Exception $e) {
            log_message('error', 'Registration error: ' . $e->getMessage());
            $this->session->setFlashdata('error', 'Registration failed. Please try again.');
            return redirect()->back();
        }
    }

    /**
     * Increment login attempts counter
     */
    private function incrementLoginAttempts(): void
    {
        $attempts = $this->session->get('login_attempts') ?? 0;
        $this->session->set('login_attempts', $attempts + 1);
        
        // Set timeout for attempts (15 minutes)
        if ($attempts >= 4) {
            $this->session->set('login_timeout', time() + 900);
        }
    }

    /**
     * Set remember me cookie
     */
    private function setRememberMeCookie(int $userId): void
    {
        $token = bin2hex(random_bytes(32));
        $expires = time() + (30 * 24 * 60 * 60); // 30 days
        
        // Store token in database (you'll need to create a remember_tokens table)
        // For now, we'll just set a cookie
        
        $cookie = new \CodeIgniter\Cookie\Cookie(
            'remember_token',
            $token,
            [
                'expires' => $expires,
                'secure' => true,
                'httponly' => true,
                'samesite' => 'Strict'
            ]
        );
        
        $this->response->setCookie($cookie);
    }

    /**
     * Clear remember me cookie
     */
    private function clearRememberMeCookie(): void
    {
        $this->response->deleteCookie('remember_token');
    }
}
