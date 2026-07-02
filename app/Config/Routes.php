<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('equipements', 'Equipements::index');
$routes->get('equipements/new', 'Equipements::new');
$routes->post('equipements/create', 'Equipements::create');