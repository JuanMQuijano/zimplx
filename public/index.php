<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AdminController;
use Controllers\LoginController;
use Controllers\CarritoController;
use Controllers\PaginasController;
use Controllers\ContactoController;
use Controllers\ProductoController;
use Controllers\RegisterController;
use Controllers\APICarritoController;

$router = new Router();

//App
$router->get('/', [PaginasController::class, 'index']);
// $router->post('/', [CarritoController::class, 'store']);

$router->get('/contacto', [ContactoController::class, 'index']);
$router->post('/contacto', [ContactoController::class, 'store']);

//Carrito
$router->get('/carrito', [PaginasController::class, 'carrito']);
$router->get('/carrito/limpiar', [CarritoController::class, 'limpiar']);
$router->post('/carrito/eliminar', [CarritoController::class, 'eliminar']);

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

$router->get('/admin/actualizar', [ProductoController::class, 'actualizar']);
$router->post('/admin/actualizar', [ProductoController::class, 'actualizar']);

$router->post('/admin/eliminar', [ProductoController::class, 'eliminar']);

$router->get('/admin/ventas', [AdminController::class, 'ventas']);
$router->get('/admin/products', [AdminController::class, 'products']);
$router->post('/admin/entregar', [AdminController::class, 'entregar']);

//API
$router->get('/api/carrito', [APICarritoController::class, 'index']);
$router->post('/api/carrito/agregar', [APICarritoController::class, 'add']);
$router->post('/api/carrito/crear', [APICarritoController::class, 'crear']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();