<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/login', 'Home::validateLogin');
$routes->get('/logout', 'Home::logout');

// ------------------------TSANTA----------------------------------
$routes->get('/caisse', 'CaisseController::index');
$routes->post('/caisse/selectionner', 'CaisseController::selectionner');
$routes->get('/achat', 'AchatController::index');







































// -----------------------------------------------------------------