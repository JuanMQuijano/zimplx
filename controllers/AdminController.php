<?php

namespace Controllers;

use Model\Product;
use MVC\Router;

class AdminController
{

    public static function index(Router $router)
    {
        $products = Product::all();

        $router->render('admin/index', [
            'titulo' => 'Admin',
            'products' => $products
        ]);
    }
}
