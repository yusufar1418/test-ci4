<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Employee::index');


$routes->get('/admin', 'Admin::index');
$routes->get('/admin/create', 'Admin::create');
$routes->post('/admin/save', 'Admin::save');
$routes->delete('/admin/(:num)', 'Admin::delete/$1');
$routes->get('/admin/edit/(:any)', 'Admin::edit/$1');
$routes->post('/admin/update/(:num)', 'Admin::update/$1');

$routes->get('/admin/(:any)', 'Admin::detail/$1');


$routes->get('/employee', 'Employee::index');
$routes->get('/employee/create', 'Employee::create');
$routes->post('/employee/save', 'Employee::save');
$routes->delete('/employee/(:num)', 'Employee::delete/$1');
$routes->get('/employee/edit/(:any)', 'Employee::edit/$1');
$routes->post('/employee/update/(:num)', 'Employee::update/$1');

$routes->get('/employee/(:any)', 'Employee::detail/$1');