<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
// $routes->post('/login', 'Home::validateLogin');
// $routes->get('/logout', 'Home::logout');

// ------------------------TSANTA----------------------------------




































// -----------------------------------------------------------------
$routes->get('/', 'AuthController::index');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');