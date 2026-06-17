<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/caisse', 'CaisseController::index');
$routes->post('/caisse/select', 'CaisseController::select');
$routes->get('/achat', 'AchatController::index');
