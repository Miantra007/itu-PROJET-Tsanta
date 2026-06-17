<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
// $routes->post('/login', 'Home::validateLogin');
// $routes->get('/logout', 'Home::logout');

// ------------------------TSANTA----------------------------------
$routes->get('/caisse', 'CaisseController::index');
$routes->post('/caisse/selectionner', 'CaisseController::selectionner');
$routes->get('/Achats', 'AchatController::index');








































// -----------------------------------------------------------------
$routes->get('/', 'AuthController::index');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');
$routes->post('/achat/valider', 'AchatController::valider');