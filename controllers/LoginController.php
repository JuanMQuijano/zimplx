<?php

namespace Controllers;

use Classes\Email;
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
                    //Está confirmado                    
                    if ($user->confirmado === "1") {
                        $passwordVerify = password_verify($auth->password, $user->password);

                        if (!$passwordVerify) {
                            User::setAlerta('error', 'Contraseña Incorrecta');
                        } else {
                            session_start();
                            $_SESSION['nombre'] = $user->nombre;
                            $_SESSION['login'] = true;

                            header('Location: /menu');
                        }
                    } else {
                        User::setAlerta('error', 'Debes confirmar tu cuenta');
                    }
                }
            }
        }

        $alertas = User::getAlertas();
        $router->render('auth/index', [
            'titulo' => 'Iniciar Sesión',
            'alertas' => $alertas
        ]);
    }

    public static function crear_cuenta(Router $router)
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
                    $usuario->generarToken();

                    $resultado = $usuario->guardar();

                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);

                    $email->enviarConfirmacion();

                    if ($resultado) {
                        header('Location: /mensaje');
                    }
                } else {
                    User::setAlerta('error', 'El usuario ya se encuentra registrado');
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

    public static function confirmar(Router $router)
    {
        isLogged();
        $alertas = [];
        $token = $_GET['token'];
        $confirmado = false;

        if (!$token) header('Location: /');

        $usuario = User::where('token', $token);

        if (!$usuario) {
            User::setAlerta('error', 'El Token es invalido');
        } else {
            $usuario->token = '';
            $usuario->confirmado = "1";
            $usuario->guardar();

            $confirmado = true;
            User::setAlerta('exito', 'Cuenta Confirmada');
        }

        $alertas = User::getAlertas();
        $router->render('auth/confirmar', [
            'alertas' => $alertas,
            'confirmado' => $confirmado,
            'titulo' => 'Confirmar Cuenta'
        ]);
    }

    public static function olvide(Router $router)
    {
        isLogged();

        $alertas = [];
        $recover = new User();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $recover = new User($_POST);

            $alertas = $recover->validarEmail();

            if (empty($alertas)) {
                $user = User::where('email', $recover->email);

                if ($user && $user->confirmado === "1") {
                    $user->generarToken();
                    $user->guardar();

                    $email = new Email($user->email, $user->nombre, $user->token);
                    $email->olvidePassword();

                    User::setAlerta('exito', 'Hemos enviado las instrucciones a tu email');
                } else {
                    User::setAlerta('error', 'El usuario no existe o no está confirmado');
                }
            }
        }


        $alertas = User::getAlertas();
        $router->render('auth/olvide', [
            'alertas' => $alertas,
            'titulo' => 'Olvidé mi Password'
        ]);
    }

    public static function reestablecer(Router $router)
    {
        isLogged();
        $alertas = [];
        $token = $_GET['token'];
        $valido = false;

        if (!$token) header('Location: /');

        $usuario = User::where('token', $token);

        if (!$usuario) {
            User::setAlerta('error', 'El Token es invalido');
        } else {
            $valido = true;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarPassword();

            if (empty($alertas)) {
                $usuario->hashearPassword();
                $usuario->token = '';
                $resultado = $usuario->guardar();

                if ($resultado) {
                    header('Location: /');
                }
            }
        }

        $alertas = User::getAlertas();
        $router->render('auth/reestablecer', [
            'alertas' => $alertas,
            'valido' => $valido,
            'titulo' => 'Reestablecer Password'
        ]);
    }

    public static function mensaje(Router $router)
    {
        isLogged();
        $router->render('auth/mensaje');
    }

    public static function cerrar_sesion()
    {
        $_SESSION = [];

        header('Location: /');
    }
}
