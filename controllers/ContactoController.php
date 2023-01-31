<?php

namespace Controllers;

use GuzzleHttp\Psr7\Message as Psr7Message;
use Model\Message;
use MVC\Router;

class ContactoController
{
    public static function index(Router $router)
    {
        $alertas = [];
        $message = new Message();
        $router->render('paginas/contacto', [
            'titulo' => 'Contactanos',
            'alertas' => $alertas,
            'message' => $message
        ]);
    }

    public static function store(Router $router)
    {
        $alertas = [];
        $message = new Message;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $message->sincronizar($_POST);

            $alertas = $message->validar();

            if (empty($alertas)) {
                $resultado = $message->guardar();

                if ($resultado) {
                    $alertas = Message::setAlerta('exito', 'Mensaje Enviado Correctamente');
                }
            }
        }

        $alertas = Message::getAlertas();

        $router->render('paginas/contacto', [
            'titulo' => 'Contactanos',
            'alertas' => $alertas,
            'message' => $message
        ]);
    }
}
