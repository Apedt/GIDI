<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Route untuk halaman depan
$routes->get('/', 'DashboardController::index');

// Route untuk Dashboard umum (misalnya, untuk pengguna yang sudah login)
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'authfilter']);

// Route untuk Register
$routes->get('/register', 'Auth::register');
$routes->post('/auth/doRegister', 'Auth::doRegister');

// Route untuk Login
$routes->get('/login', 'Auth::login');
$routes->post('/auth/doLogin', 'Auth::doLogin');

// Route untuk Logout
$routes->get('/auth/logout', 'Auth::logout');

// **Group untuk Admin** (akses hanya untuk role admin)

$routes->group('schedules', ['filter' => 'authfilter'], function($routes) {
     // Manajemen Jadwal Ibadah
     $routes->get('', 'ScheduleController::index');
     $routes->get('create', 'ScheduleController::create');
     $routes->post('store', 'ScheduleController::store');
     $routes->get('edit/(:num)', 'ScheduleController::edit/$1');
     $routes->post('update/(:num)', 'ScheduleController::update/$1');
     $routes->get('delete/(:num)', 'ScheduleController::delete/$1');
});
$routes->group('', ['filter' => 'authfilter'], function($routes) {
    
    // Manajemen Jemaat
    $routes->get('/members', 'MemberController::index');
    $routes->get('/members/create', 'MemberController::create');
    $routes->post('/members/store', 'MemberController::store');
    $routes->get('/members/edit/(:num)', 'MemberController::edit/$1');
    $routes->post('/members/update/(:num)', 'MemberController::update/$1');
    $routes->get('/members/delete/(:num)', 'MemberController::delete/$1');

   

    // Manajemen Renungan Harian
    $routes->get('/devotions', 'DevotionController::index');
    $routes->get('/devotions/create', 'DevotionController::create');
    $routes->post('/devotions/store', 'DevotionController::store');
    $routes->get('/devotions/edit/(:num)', 'DevotionController::edit/$1');
    $routes->post('/devotions/update/(:num)', 'DevotionController::update/$1');
    $routes->get('/devotions/delete/(:num)', 'DevotionController::delete/$1');
});

// Group untuk role jemaat
$routes->group('schedules', function ($routes) {
    $routes->get('', 'ScheduleController::index'); // Jadwal Ibadah
    $routes->get('/devotions', 'DevotionController::index'); // Renungan Harian
});

