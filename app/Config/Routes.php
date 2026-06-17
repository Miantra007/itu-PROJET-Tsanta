<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/login', 'Home::validateLogin');
$routes->get('/logout', 'Home::logout');

// ===== ADMIN ROUTES =====
$routes->get('/admin/dashboard', 'AdminController::dashboard');
$routes->get('/admin/employes', 'AdminController::employes');
$routes->post('/admin/employes/create', 'AdminController::createEmploye');
$routes->post('/admin/employes/update/(:num)', 'AdminController::updateEmploye/$1');
$routes->post('/admin/employes/toggle/(:num)', 'AdminController::toggleEmploye/$1');
$routes->get('/admin/departements', 'AdminController::departements');
$routes->post('/admin/departements/create', 'AdminController::createDepartement');
$routes->post('/admin/departements/update/(:num)', 'AdminController::updateDepartement/$1');
$routes->post('/admin/departements/delete/(:num)', 'AdminController::deleteDepartement/$1');
$routes->get('/admin/types-conge', 'AdminController::typesConge');
$routes->post('/admin/types-conge/create', 'AdminController::createTypeConge');
$routes->post('/admin/types-conge/update/(:num)', 'AdminController::updateTypeConge/$1');
$routes->post('/admin/types-conge/delete/(:num)', 'AdminController::deleteTypeConge/$1');
$routes->get('/admin/soldes', 'AdminController::soldes');
$routes->post('/admin/soldes/update', 'AdminController::updateSoldes');
$routes->get('/admin/demandes', 'AdminController::demandes');
$routes->get('/admin/statMois','AdminController::showStatistiqueMois');
$routes->get('/admin/statJours','AdminController::showStatistiqueJours');

// ===== RH ROUTES =====
$routes->get('/espaceRH', 'CongeController::index');

// Soldes employés (année courante)
$routes->get('/espaceRH/soldes', 'CongeController::soldesEmployes');

// Actions RH (côté serveur)
$routes->post('/espaceRH/approuver/(:num)', 'CongeController::approuver/$1');
$routes->post('/espaceRH/refuser/(:num)', 'CongeController::refuser/$1');

// ===== EMPLOYE ROUTES =====
$routes->get('/employe/dashboard', 'EmployeController::dashboard');
$routes->get('/dashboard-employe', 'EmployeController::dashboard');
$routes->get('/form-conge', 'EmployeController::nouvelleDemande');
$routes->post('/form-conge', 'EmployeController::soumettreConge');
$routes->get('/mes-conges', 'EmployeController::mesConges');
$routes->post('/mes-conges/annuler/(:num)', 'EmployeController::annulerConge/$1');
$routes->get('/profil-employe', 'EmployeController::profil');
$routes->post('/profil-employe', 'EmployeController::updateProfil');

// ===== CONGE & OTHER ROUTES =====
$routes->get('/dashboard', 'EmployeController::index');
$routes->get('/mes-conges', 'EmployeController::mesConges');
$routes->get('/employe/conges/nouveau', 'EmployeController::nouvelleDemande');
$routes->post('/employe/conges', 'EmployeController::soumettreConge');
$routes->get('/employe/conges', 'EmployeController::mesConges');
$routes->post('/employe/conges/annuler/(:num)', 'EmployeController::annulerConge/$1');
$routes->get('/statistique', 'EmployeController::showStatistique');

// ===== CALENDRIER CONGEES =====
$routes->get('/calendrier-congees', 'CalendrierCongees::index');

// ===== STATISTIQUES =====
$routes->get('/statistique', 'EmployeController::showStatistique');






























// ---------------------------------------------------------------------rivaldo
$routes->post('/login', 'Home::validateLogin');