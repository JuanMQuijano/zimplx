<?php

namespace Controllers;

use Model\Cart;
use Model\User;
use MVC\Router;
use Model\Product;
use Model\ProductCart;

class PaginasController
{

    public static function index(Router $router)
    {
        $products_format = [];
        $products = Product::all();

        foreach ($products as $product) {
            if ($product->type === "cerveza") {
                $products_format['cervezas'][] = $product;
            }
            if ($product->type === "aguardiente") {
                $products_format['aguardiente'][] = $product;
            }
            if ($product->type === "ron") {
                $products_format['ron'][] = $product;
            }
            if ($product->type === "smirnoff") {
                $products_format['smirnoff'][] = $product;
            }
        }
        $alertas = [];

        $router->render('index', [
            'titulo' => 'Inicio',
            'alertas' => $alertas,
            'products' => $products_format
        ]);
    }

    public static function carrito(Router $router)
    {
        $alertas = [];
        $mostrar = false;
        $products_cart = [];

        $products_cart = ProductCart::select(session_id());

        if (!$products_cart) {
            $mostrar = false;
            $alertas = User::setAlerta('error', 'Aún no tienes productos en el carrito');
        } else {
            $mostrar = true;
        }


        $alertas = User::getAlertas();
        $router->render('paginas/carrito', [
            'titulo' => 'Carrito',
            'mostrar' => $mostrar,
            'products_cart' => $products_cart,
            'alertas' => $alertas,
            'id' => session_id()
        ]);
    }
}
