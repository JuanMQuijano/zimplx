<?php

namespace Controllers;

use MVC\Router;
use Model\Sales;
use Model\Product;
use Model\AdminSale;

class AdminController
{

    public static function index(Router $router)
    {
        isAdmin();
        $sales = Sales::all();

        $fecha = $_GET['fecha'] ?? date('Y-m-d');

        $fechas = explode('-', $fecha);

        if (!checkdate($fechas[1], $fechas[2], $fechas[0])) {
            header('Location: /404');
        }

        //Consultar DB
        $consulta = "SELECT sales.id, sales.date, sales.name as cliente, ";
        $consulta .= " sales.phone, sales.address, sales.idUser, sales.status, products.name as productos, products.price, sales.total_price  ";
        $consulta .= " FROM sales  ";
        $consulta .= " LEFT OUTER JOIN products ";
        $consulta .= " ON sales.idProduct_Car=products.id ";
        $consulta .= " WHERE date =  '{$fecha}' ";

        $sales = AdminSale::SQL($consulta);

        $sales_format = [];
        foreach ($sales as $sale) {
            if ($sale->status === "Espera") {
                $sales_format['Espera'][] = $sale;
            }
        }

        $router->render('admin/index', [
            'titulo' => 'Pedidos',
            'sales' => $sales_format
        ]);
    }

    public static function products(Router $router)
    {
        isAdmin();
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

        $router->render('admin/products', [
            'titulo' => 'Productos',
            'products' => $products_format
        ]);
    }

    public static function ventas(Router $router)
    {
        isAdmin();
        $sales = Sales::all();

        $fecha = $_GET['fecha'] ?? date('Y-m-d');

        $fechas = explode('-', $fecha);

        if (!checkdate($fechas[1], $fechas[2], $fechas[0])) {
            header('Location: /404');
        }

        //Consultar DB
        $consulta = "SELECT sales.id, sales.date, sales.name as cliente, ";
        $consulta .= " sales.phone, sales.address, sales.idUser, sales.status, products.name as productos, products.price, sales.total_price  ";
        $consulta .= " FROM sales  ";
        $consulta .= " LEFT OUTER JOIN products ";
        $consulta .= " ON sales.idProduct_Car=products.id ";
        $consulta .= " WHERE date =  '{$fecha}' AND status = 'Entregado' ";

        $sales = AdminSale::SQL($consulta);

        $sales_format = [];
        foreach ($sales as $sale) {
            if ($sale->status === "Entregado") {
                $sales_format['Entregado'][] = $sale;
            }
        }

        $router->render('admin/ventas', [
            'titulo' => 'Ventas',
            'sales' => $sales_format,
            'fecha' => $fecha
        ]);
    }

    public static function entregar()
    {
        isAdmin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sales = Sales::where_all('idUser', $_POST['id']);
            foreach ($sales as $sale) {
                $sale->status = 'Entregado';
                $sale->guardar();
            }

            header('Location: /admin');
        }
    }
}
