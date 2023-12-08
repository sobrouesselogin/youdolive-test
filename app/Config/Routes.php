<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Api\AuthController;
use App\Controllers\Api\ApiController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/logged-out', [AuthController::class, 'loggedOut']);
$routes->post('/user_login', [AuthController::class, 'userLogin']);
$routes->get('/users', [ApiController::class, 'getUsers'], ['filter'=>'checkApiAuth']);


service('auth')->routes($routes);
