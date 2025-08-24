# CodeIgniter 4 Login System Setup Guide

This guide will help you set up a complete login system for your CodeIgniter 4 project.

## 🚀 Features

- **Beautiful Bootstrap UI** - Modern, responsive login form
- **Secure Authentication** - Password hashing, CSRF protection, brute force protection
- **Role-based Access Control** - Admin, Manager, and User roles
- **Session Management** - Secure session handling with remember me functionality
- **Database Integration** - Automatic migrations and seeders
- **Route Protection** - Middleware-based route protection

## 📋 Prerequisites

- CodeIgniter 4 installed
- PHP 7.4 or higher
- MySQL/MariaDB database
- Composer (for dependencies)

## 🗄️ Database Setup

### 1. Configure Database Connection

Edit `app/Config/Database.php` and update your database credentials:

```php
public $default = [
    'DSN'      => '',
    'hostname' => 'localhost',
    'username' => 'your_username',
    'password' => 'your_password',
    'database' => 'your_database_name',
    'DBDriver' => 'MySQLi',
    'DBPrefix' => '',
    'pConnect' => false,
    'DBDebug'  => (ENVIRONMENT !== 'production'),
    'charset'  => 'utf8',
    'DBCollate' => 'utf8_general_ci',
    'swapPre'  => '',
    'encrypt'  => false,
    'compress' => false,
    'strictOn' => false,
    'failover' => [],
    'port'     => 3306,
];
```

### 2. Run Database Setup

Use the provided CLI command to set up your database:

```bash
php spark db:setup
```

This command will:
- Create the users table
- Add default users for testing

## 👥 Default Users

After running the setup, you'll have these test accounts:

| Email | Password | Role |
|-------|----------|------|
| admin@example.com | admin123 | Admin |
| user@example.com | user123 | User |
| manager@example.com | manager123 | Manager |

## 🔐 How to Use

### 1. Access Login Page

Navigate to: `http://localhost/SCMS-1/login`

### 2. Login Process

1. Enter your email and password
2. Optionally check "Remember me"
3. Click "Sign In"
4. You'll be redirected to the dashboard

### 3. Dashboard Access

After successful login, you'll see:
- User information
- System statistics
- Navigation sidebar
- User dropdown menu

### 4. Logout

Click on your username in the top-right corner and select "Logout"

## 🛡️ Security Features

- **Password Hashing**: Uses PHP's `password_hash()` function
- **CSRF Protection**: Built-in CSRF token validation
- **Brute Force Protection**: Limits login attempts
- **Session Security**: Secure session handling
- **Input Validation**: Server-side validation for all inputs
- **SQL Injection Protection**: Uses CodeIgniter's query builder

## 🚧 Route Protection

### Public Routes (No Login Required)
- `/` - Home page
- `/login` - Login form
- `/forgot-password` - Password reset

### Protected Routes (Login Required)
- `/dashboard` - User dashboard
- `/logout` - Logout functionality

### Role-based Routes
- `/admin/*` - Admin only access
- `/manager/*` - Manager and Admin access

## 🔧 Customization

### Adding New Roles

1. Update the UserModel validation rules in `app/Models/UserModel.php`
2. Modify the AuthFilter in `app/Filters/AuthFilter.php`
3. Update the migration file if needed

### Styling Changes

The login form and dashboard use Bootstrap 5. You can customize:
- Colors in the CSS variables
- Layout in the view files
- Icons from Font Awesome

### Adding New Fields

To add new user fields:
1. Update the migration file
2. Modify the UserModel
3. Update the login form and dashboard views

## 🐛 Troubleshooting

### Common Issues

1. **Database Connection Error**
   - Check your database credentials in `app/Config/Database.php`
   - Ensure your database server is running

2. **Migration Errors**
   - Make sure your database user has CREATE TABLE permissions
   - Check for syntax errors in migration files

3. **Login Not Working**
   - Verify the users table was created
   - Check if the seeder ran successfully
   - Look at the application logs in `writable/logs/`

4. **Session Issues**
   - Check your session configuration in `app/Config/App.php`
   - Ensure the `writable/session/` directory is writable

### Debug Mode

Enable debug mode in `app/Config/Boot/production.php`:

```php
error_reporting(-1);
ini_set('display_errors', '1');
```

## 📁 File Structure

```
app/
├── Controllers/
│   ├── Auth.php              # Authentication controller
│   ├── Dashboard.php         # Dashboard controller
│   └── BaseController.php    # Base controller
├── Models/
│   └── UserModel.php         # User model with validation
├── Views/
│   ├── auth/
│   │   └── login.php         # Beautiful login form
│   └── dashboard/
│       └── index.php         # Dashboard view
├── Filters/
│   └── AuthFilter.php        # Authentication middleware
├── Database/
│   ├── Migrations/
│   │   └── 001_CreateUsersTable.php
│   └── Seeds/
│       └── UserSeeder.php
└── Commands/
    └── SetupDatabase.php     # Database setup command
```

## 🔄 Updates and Maintenance

### Updating the System

1. **Security Updates**: Regularly update CodeIgniter and dependencies
2. **Password Policy**: Consider implementing password expiration
3. **Audit Logging**: Add logging for sensitive operations
4. **Two-Factor Authentication**: Consider adding 2FA for enhanced security

### Monitoring

- Check application logs in `writable/logs/`
- Monitor database performance
- Review failed login attempts
- Keep track of user sessions

## 📞 Support

If you encounter issues:

1. Check the CodeIgniter 4 documentation
2. Review the application logs
3. Verify your configuration files
4. Test with the default credentials

## 🎯 Next Steps

After setting up the basic login system, consider adding:

- User registration
- Email verification
- Password reset functionality
- User profile management
- Activity logging
- API authentication
- Multi-factor authentication

---

**Happy Coding! 🚀**
