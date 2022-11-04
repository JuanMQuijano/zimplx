<?php

namespace Controllers;

use MVC\Router;

class MenuController
{
    public static function index(Router $router)
    {
        isNotLogged();
        $router->render('menu/index', [
            'titulo' => 'Menú'
        ]);
    }
}
