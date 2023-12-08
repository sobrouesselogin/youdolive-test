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

// service('auth')->routes($routes);
//sobrescreve logout padrão do shield (apenas para adicionar filtro de autenticação)
//solução baseada na documentação https://codeigniter4.github.io/shield/customization/route_config/
service('auth')->routes($routes, ['except' => ['logout']]);
$routes->get('logout', [AuthController::class, 'userLogout'], ['filter'=>'checkApiAuth']);
