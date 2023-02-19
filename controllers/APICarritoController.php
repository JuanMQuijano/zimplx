<?php

namespace Controllers;

use Model\Cart;
use Model\Product;
use Model\Sales;
use Model\ProductCart;

class APICarritoController
{
    public static function index()
    {
        $id = $_GET['id'];

        if (!$id) header('Location: /carrito');

        $products_cart = ProductCart::select($id);

        if (!$products_cart) {
            header('Location: /carrito');
        }

        echo json_encode($products_cart);
    }

    public static function crear()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $compra = new Sales($_POST);

            $product = Product::find($_POST['idProduct_Car']);
            $product->quantity = $product->quantity - 1;
            $product->guardar();

            $resultado = $compra->guardar();

            echo json_encode($resultado);
        }
    }

    public static function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cart = new Cart();
            $cart->idProduct = $_POST['idProduct'];
            $cart->idUser = $_POST['idUser'];            

            $resultado = $cart->guardar();

            echo json_encode($resultado);
        }
    }
}
