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


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
