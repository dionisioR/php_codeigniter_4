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

// search and filter tasks
$routes->post('/search', 'Main::search');
$routes->get('/filter/(:alpha)', 'Main::filter/$1');

// edit task
$routes->get('/edit_task/(:alphanum)', 'Main::edit_task/$1');
$routes->post('/edit_task_submit', 'Main::edit_task_submit');

// delete task
$routes->get('/delete_task/(:alphanum)', 'Main::delete_task/$1');
$routes->get('/delete_task_confirm/(:alphanum)', 'Main::delete_task_confirm/$1');

// task details
$routes->get('/task_details/(:alphanum)', 'Main::task_details/$1');

