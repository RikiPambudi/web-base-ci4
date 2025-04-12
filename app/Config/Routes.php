<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('home/calculate', 'Home::calculate');

$routes->get('/setpesan/(:alpha)', 'Home::setPesan/$1');

$routes->get('/about', 'Page::about');

// auth module start
$routes->get('/register', 'AuthController::register');
$routes->post('/register/store', 'AuthController::store');

$routes->get('/login', 'AuthController::login');
$routes->post('/login/attempt', 'AuthController::attemptLogin');

$routes->get('/logout', 'AuthController::logout');

// Dashboard
$routes->get('/dashboard', 'Home::index', ['filter' => 'auth']);
$routes->get('/admin', 'AdminController::index', ['filter' => 'auth:admin']);
// auth module stop

$routes->group('barang', function ($routes) {
    $routes->get('/', 'Barang::index');
    $routes->get('create', 'Barang::create');
    $routes->post('store', 'Barang::store');
    $routes->get('edit/(:num)', 'Barang::edit/$1');
    $routes->post('update/(:num)', 'Barang::update/$1');
    $routes->get('hapus/(:num)', 'Barang::delete/$1');
    $routes->get('show/(:num)', 'Barang::show/$1');
});