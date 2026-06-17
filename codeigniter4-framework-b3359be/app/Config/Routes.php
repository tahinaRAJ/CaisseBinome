<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
    
$routes->get('/caisse', 'CaisseController::index');
$routes->post('/caisse/select', 'CaisseController::select');
$routes->get('/achats', 'AchatController::index');
$routes->post('/achats/ajouter', 'AchatController::ajouter');
$routes->post('/achats/cloturer', 'AchatController::cloturer');

$routes->get('/login', 'AuthController::showLoginForm');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');