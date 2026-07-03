<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Routes affichage
$routes->get('/', 'Equipements::index');
$routes->get('equipements/new', 'Equipements::new');
$routes->get('equipements/edit/(:num)', 'Equipements::edit/$1');

// Routes de traitement des donnes
$routes->post('equipements/create', 'Equipements::create');
$routes->put('equipements/update/(:num)', 'Equipements::update/$1');
$routes->delete('equipements/delete/(:num)', 'Equipements::delete/$1');
