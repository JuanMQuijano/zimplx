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
            if ($product->type === "cerveza" && $product->quantity !== "0") {
                $products_format['cervezas'][] = $product;
            }
            if ($product->type === "aguardiente" && $product->quantity !== "0") {
                $products_format['aguardiente'][] = $product;
            }
            if ($product->type === "ron" && $product->quantity !== "0") {
                $products_format['ron'][] = $product;
            }
            if ($product->type === "smirnoff" && $product->quantity !== "0") {
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
        if (!isset($_SESSION['id'])) {
            $alertas = User::setAlerta('error', 'Debes iniciar sesión');
        } else {
            $products_cart = ProductCart::select($_SESSION['id']);

            if (!$products_cart) {
                $mostrar = false;
                $alertas = User::setAlerta('error', 'Aún no tienes productos en el carrito');
            } else {
                $mostrar = true;
            }
        }

        $alertas = User::getAlertas();
        $router->render('paginas/carrito', [
            'titulo' => 'Inicio',
            'mostrar' => $mostrar,
            'products_cart' => $products_cart,
            'alertas' => $alertas
        ]);
    }
}
