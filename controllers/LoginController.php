<?php

namespace Controllers;

use Model\User;
use MVC\Router;

class LoginController
{

    public static function index(Router $router)
    {
        $router->render('auth/index', [
            'titulo' => 'Iniciar Sesión'
        ]);
    }

    public static function crear_cuenta(Router $router)
    {
        $alertas = [];
        $usuario = new User();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);

            $alertas = $usuario->validar();

            if (empty($alertas)) {
                $usuario->hashearPassword();
                $usuario->generarToken();

                $resultado = $usuario->guardar();

                if ($resultado) {
                    header('Location: /');
                }
            }
        }

        $alertas = User::getAlertas();
        $router->render('auth/crear-cuenta', [
            'titulo' => 'Crear Cuenta',
            'alertas' => $alertas,
            'usuario' => $usuario
        ]);
    }
}
