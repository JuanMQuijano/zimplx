<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use MVC\Router;

$router = new Router();

//Auth
$router->get('/', [LoginController::class, 'index']);
$router->post('/', [LoginController::class, 'index']);

$router->get('/crear-cuenta', [LoginController::class, 'crear_cuenta']);
$router->post('/crear-cuenta', [LoginController::class, 'crear_cuenta']);

$router->get('/confirmar', [LoginController::class, 'confirmar']);
$router->post('/confirmar', [LoginController::class, 'confirmar']);

$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);

$router->get('/reestablecer', [LoginController::class, 'reestablecer']);
$router->post('/reestablecer', [LoginController::class, 'reestablecer']);

$router->get('/mensaje', [LoginController::class, 'mensaje']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
