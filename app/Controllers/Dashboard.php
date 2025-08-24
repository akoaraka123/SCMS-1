<?php

namespace App\Controllers;

use App\Models\UserModel;

class Dashboard extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('user_id');
        $user = $this->userModel->find($userId);

        // Update last login time
        $this->userModel->updateLastLogin($userId);

        $data = [
            'title' => 'Dashboard',
            'user' => $user
        ];

        return view('dashboard/index', $data);
    }
} 