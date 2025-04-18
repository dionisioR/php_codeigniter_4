<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('rota', 'Controller::MétodoDoController');
// $routes->get('/', 'Home::index');
$routes->get('/', 'Main::index');
$routes->get('/login', 'Main::login');
$routes->post('/login_submit', 'Main::login_submit');
