<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Public routes (no authentication required)
$routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::loginSubmit');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::registerSubmit');
$routes->get('/forgot-password', 'Auth::forgotPassword');
$routes->post('/reset-password', 'Auth::resetPassword');

// Protected routes (authentication required)
$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/dashboard', 'Dashboard::index');
    $routes->get('/logout', 'Auth::logout');
    
    // Admin only routes
    $routes->group('', ['filter' => 'auth:admin'], function($routes) {
        $routes->get('/admin', 'Admin::index');
        $routes->get('/admin/users', 'Admin::users');
    });
    
    // Manager routes
    $routes->group('', ['filter' => 'auth:manager'], function($routes) {
        $routes->get('/manager', 'Manager::index');
    });
});

// Catch-all route for 404
$routes->set404Override('App\Controllers\Errors::show404');
