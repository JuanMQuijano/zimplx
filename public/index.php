<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use Controllers\LoginController;
use Controllers\ProductoController;
use Controllers\RegisterController;
use MVC\Router;

$router = new Router();

//Auth
$router->get('/login', [LoginController::class, 'index']);
$router->post('/login', [LoginController::class, 'index']);

$router->get('/register', [RegisterController::class, 'index']);
$router->post('/register', [RegisterController::class, 'index']);

$router->get('/logout', [LoginController::class, 'logout']);

//Admin Section
$router->get('/admin', [AdminController::class, 'index']);

$router->get('/admin/crear', [ProductoController::class, 'index']);
$router->post('/admin/crear', [ProductoController::class, 'index']);

$router->post('/admin/eliminar', [ProductoController::class, 'eliminar']);

//Menú


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
