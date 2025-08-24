<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;

class Profile extends BaseController
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = session();
    }

    public function index()
    {
        // Check if user is logged in
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userId = $this->session->get('user_id');
        $user = $this->userModel->find($userId);

        $data = [
            'title' => 'Profile',
            'user' => $user
        ];

        return view('profile/index', $data);
    }

    public function update(): RedirectResponse
    {
        // Check if user is logged in
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userId = $this->session->get('user_id');
        
        // Get form data
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email')
        ];

        // Validation
        if (empty($data['name']) || empty($data['email'])) {
            $this->session->setFlashdata('error', 'Please fill in all fields.');
            return redirect()->back();
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->session->setFlashdata('error', 'Please enter a valid email address.');
            return redirect()->back();
        }

        try {
            // Check if email already exists for other users
            $existingUser = $this->userModel->where('email', $data['email'])->where('id !=', $userId)->first();
            if ($existingUser) {
                $this->session->setFlashdata('error', 'Email already registered by another user.');
                return redirect()->back();
            }

            // Update user
            $this->userModel->update($userId, $data);

            // Update session data
            $this->session->set('user_name', $data['name']);
            $this->session->set('user_email', $data['email']);

            $this->session->setFlashdata('success', 'Profile updated successfully!');
            return redirect()->to('/profile');

        } catch (\Exception $e) {
            log_message('error', 'Profile update error: ' . $e->getMessage());
            $this->session->setFlashdata('error', 'Profile update failed. Please try again.');
            return redirect()->back();
        }
    }

    public function changePassword(): RedirectResponse
    {
        // Check if user is logged in
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userId = $this->session->get('user_id');
        $user = $this->userModel->find($userId);
        
        // Get form data
        $currentPassword = $this->request->getPost('current_password');
        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        // Validation
        if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
            $this->session->setFlashdata('error', 'Please fill in all password fields.');
            return redirect()->back();
        }

        if ($newPassword !== $confirmPassword) {
            $this->session->setFlashdata('error', 'New passwords do not match.');
            return redirect()->back();
        }

        if (strlen($newPassword) < 8) {
            $this->session->setFlashdata('error', 'New password must be at least 8 characters long.');
            return redirect()->back();
        }

        // Verify current password
        if (!password_verify($currentPassword, $user['password'])) {
            $this->session->setFlashdata('error', 'Current password is incorrect.');
            return redirect()->back();
        }

        try {
            // Update password
            $this->userModel->update($userId, ['password' => $newPassword]);

            $this->session->setFlashdata('success', 'Password changed successfully!');
            return redirect()->to('/profile');

        } catch (\Exception $e) {
            log_message('error', 'Password change error: ' . $e->getMessage());
            $this->session->setFlashdata('error', 'Password change failed. Please try again.');
            return redirect()->back();
        }
    }
}
