<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/caisse', 'CaisseController::index');
$routes->get('/caisse/search', 'CaisseController::search');
