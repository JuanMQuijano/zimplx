<?php

namespace Controllers;

use Model\User;
use MVC\Router;

class LoginController
{

    public static function index(Router $router)
    {
        isLogged();

        $alertas = [];
        $auth = new User();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new User($_POST);

            $alertas = $auth->validarLogin();

            if (empty($alertas)) {
                $user = User::where('email', $auth->email);

                if (!$user) {
                    User::setAlerta('error', 'Email no encontrado');
                } else {

                    $passwordVerify = password_verify($auth->password, $user->password);

                    if (!$passwordVerify) {
                        User::setAlerta('error', 'Contraseña Incorrecta');
                    } else {
                        session_start();
                        $_SESSION['id'] = $user->id;
                        $_SESSION['nombre'] = $user->name . " " . $user->lastname;
                        $_SESSION['email'] = $user->email;
                        $_SESSION['login'] = true;

                        if ($user->tipo === "1") {
                            $_SESSION['admin'] = true;
                            header('Location: /admin');
                        } else {
                            header('Location: /');
                        }
                    }
                }
            }
        }

        $alertas = User::getAlertas();
        $router->render('auth/index', [
            'titulo' => 'Iniciar Sesión',
            'alertas' => $alertas,
            'auth' => $auth
        ]);
    }

    public static function logout()
    {
        $_SESSION = [];

        header('Location: /');
    }
}
