<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'name', 
        'email', 
        'password', 
        'role', 
        'active', 
        'last_login', 
        'created_at', 
        'updated_at'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validation
    protected $validationRules = [
        'name' => 'required|min_length[3]|max_length[100]|alpha_space',
        'email' => 'required|valid_email|is_unique[users.email,id,{id}]',
        'password' => 'required|min_length[8]',
        'role' => 'permit_empty|in_list[admin,user,manager]',
        'active' => 'permit_empty|in_list[0,1]'
    ];

    protected $validationMessages = [
        'name' => [
            'required' => 'Name is required',
            'min_length' => 'Name must be at least 3 characters long',
            'max_length' => 'Name cannot exceed 100 characters',
            'alpha_space' => 'Name can only contain letters and spaces'
        ],
        'email' => [
            'required' => 'Email is required',
            'valid_email' => 'Please enter a valid email address',
            'is_unique' => 'This email is already registered'
        ],
        'password' => [
            'required' => 'Password is required',
            'min_length' => 'Password must be at least 8 characters long'
        ],
        'role' => [
            'in_list' => 'Invalid role selected'
        ],
        'active' => [
            'in_list' => 'Invalid active status'
        ]
    ];

    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    /**
     * Hash password before saving
     */
    protected function hashPassword(array $data): array
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

    /**
     * Before insert callback
     */
    protected function beforeInsert(array $data): array
    {
        // Temporarily disabled for testing
        // return $this->hashPassword($data);
        return $data;
    }

    /**
     * Before update callback
     */
    protected function beforeUpdate(array $data): array
    {
        // Temporarily disabled for testing
        // return $this->hashPassword($data);
        return $data;
    }

    /**
     * Find user by email
     */
    public function findByEmail(string $email): ?array
    {
        return $this->where('email', $email)->first();
    }

    /**
     * Find active users only
     */
    public function findActive(): array
    {
        return $this->where('active', 1)->findAll();
    }

    /**
     * Update last login time
     */
    public function updateLastLogin(int $userId): bool
    {
        return $this->update($userId, ['last_login' => date('Y-m-d H:i:s')]);
    }

    /**
     * Get users by role
     */
    public function findByRole(string $role): array
    {
        return $this->where('role', $role)->findAll();
    }

    /**
     * Search users
     */
    public function searchUsers(string $search): array
    {
        return $this->like('name', $search)
                   ->orLike('email', $search)
                   ->findAll();
    }
}
