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
$routes->get('/logout', 'Main::logout');

// new Task 
$routes->get('/new_task', 'Main::new_task');
$routes->post('/new_task_submit', 'Main::new_task_submit');

// temp
$routes->get('/sessao', 'Main::sessao');