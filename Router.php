<?php

namespace MVC;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    public function comprobarRutas()
    {
        // Proteger Rutas...
        session_start();

        // Arreglo de rutas protegidas...        
        $rutas_protegidas = ['/admin', '/admin/crear', '/admin/actualizar', '/admin/eliminar', '/admin/ventas', '/admin/products', '/admin/entregar'];

        $isAdmin = $_SESSION['admin'] ?? null;

        if (isset($_SERVER['PATH_INFO'])) {
            $currentUrl = $_SERVER['PATH_INFO'] ?? '/';
        } else {
            $currentUrl = $_SERVER['REQUEST_URI'] === '' ? '/' : $_SERVER['REQUEST_URI'];
        }
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl] ?? null;
        } else {
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }

        //Proteger las rutas
        if (in_array($currentUrl, $rutas_protegidas) && !$isAdmin) { //Si la urlActual está en el arreglo y el usuario no esta autenticado
            header('Location: /');
        }

        if ($fn) {
            // Call user fn va a llamar una función cuando no sabemos cual sera
            call_user_func($fn, $this); // This es para pasar argumentos
        } else {
            header('Location: /');
        }
    }

    public function render($view, $datos = [])
    {

        // Leer lo que le pasamos  a la vista
        foreach ($datos as $key => $value) {
            $$key = $value;  // Doble signo de dolar significa: variable variable, básicamente nuestra variable sigue siendo la original, pero al asignarla a otra no la reescribe, mantiene su valor, de esta forma el nombre de la variable se asigna dinamicamente
        }

        ob_start(); // Almacenamiento en memoria durante un momento...

        // entonces incluimos la vista en el layout
        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); // Limpia el Buffer
        include_once __DIR__ . '/views/layout.php';
    }
}
