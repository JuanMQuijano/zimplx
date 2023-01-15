<?php

namespace Controllers;

use MVC\Router;
use Model\Product;
use Intervention\Image\ImageManagerStatic as Image;


class ProductoController
{
    public static function index(Router $router)
    {

        $alertas = [];
        $product = new Product;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            /*** SUBIDA DE ARCHIVOS ***/
            if (!empty($_FILES['image']['tmp_name'])) {
                //Si una carpeta existe o no
                if (!is_dir(CARPETA_IMAGENES)) {
                    //Si no existe, crearla
                    mkdir(CARPETA_IMAGENES, 0777, true);
                }

                //Realiza un resize a la imagen con intervention
                $imagen =  Image::make($_FILES['image']['tmp_name'])->fit(800, 800)->encode('webp', 80);

                //Generamos un nombre único para la imagen
                $nombreImagen = md5(uniqid(rand(), true));

                $product->setImagen($nombreImagen);
            }
            $product->sincronizar($_POST);
            $alertas = $product->validar();

            if (empty($alertas)) {
                //Guarda la imagen en el servidor
                $imagen->save(CARPETA_IMAGENES . $nombreImagen . ".webp");
                $product->guardar();

                header('Location: /admin');
            }
        }

        $alertas = Product::getAlertas();
        $router->render('admin/crear', [
            'titulo' => 'Agregar Producto',
            'alertas' => $alertas,
            'product' => $product
        ]);
    }

    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product = Product::find($_POST['id']);

            $product->eliminar();

            header('Location: /admin');
        }
    }
}
