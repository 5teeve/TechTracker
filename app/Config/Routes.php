<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Equipements::index');
$routes->get('equipements/new', 'Equipements::new');
$routes->post('equipements/create', 'Equipements::create');