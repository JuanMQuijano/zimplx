<?php

namespace Controllers;

use Model\Cart;
use Model\Product;
use Model\ProductCart;
use Model\User;
use MVC\Router;

class CarritoController
{
    // public static function store(Router $router)
    // {
    //     $products_format = [];
    //     $products = Product::all();

    //     foreach ($products as $product) {
    //         if ($product->type === "cerveza") {
    //             $products_format['cervezas'][] = $product;
    //         }
    //         if ($product->type === "aguardiente") {
    //             $products_format['aguardiente'][] = $product;
    //         }
    //         if ($product->type === "ron") {
    //             $products_format['ron'][] = $product;
    //         }
    //         if ($product->type === "smirnoff") {
    //             $products_format['smirnoff'][] = $product;
    //         }
    //     }
    //     $alertas = [];


    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $cart = new Cart;
    //         $cart->idProduct = $_POST['id'];
    //         $cart->idUser = session_id();

    //         $resultado = $cart->guardar();

    //         if ($resultado) {
    //             $alertas = Cart::setAlerta('exito', 'Producto Agregado al carrito');                
    //         }
    //     }

    //     $alertas = Cart::getAlertas();
    //     $router->render('index', [
    //         'titulo' => 'Inicio',
    //         'alertas' => $alertas,
    //         'products' => $products_format
    //     ]);
    // }

    public static function limpiar()
    {
        $cart = new Cart;
        $resultado = $cart->limpiar(session_id());

        if ($resultado) {
            header('Location: /carrito');
        }
    }

    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            ProductCart::delete($_POST['idProduct'], session_id());
        }

        header('Location: /carrito');
    }
}
