<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/student', 'StudentController::index');
$routes->post('/student/insert', 'StudentController::insert');
$routes->get('/student/fetchAll', 'StudentController::fetchAll');
$routes->get('/student/edit/(:num)', 'StudentController::edit/$1');

$routes->post('/student/update/(:num)', 'StudentController::update/$1');
$routes->get('/student/fetchUser/(:num)', 'StudentController::fetchUser/$1');
$routes->delete('student/delete/(:num)', 'StudentController::delete/$1');