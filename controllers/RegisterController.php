<?php

namespace Controllers;

use Model\User;
use MVC\Router;

class RegisterController
{
    public static function index(Router $router)
    {
        isLogged();

        $alertas = [];
        $usuario = new User();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);

            $alertas = $usuario->validar();

            if (empty($alertas)) {

                $resultado = User::where('email', $usuario->email);

                if (!$resultado) {
                    $usuario->hashearPassword();
            
                    $resultado = $usuario->guardar();

                    if ($resultado) {
                        header('Location: /login');
                    }
                } else {
                    User::setAlerta('error', 'El usuario ya se encuentra registrado');
                }
            }
        }

        $alertas = User::getAlertas();
        $router->render('auth/crear-cuenta', [
            'titulo' => 'Registrarme',
            'alertas' => $alertas,
            'usuario' => $usuario
        ]);
    }
}
