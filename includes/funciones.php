<?php

define('CARPETA_IMAGENES', __DIR__ . '/../public/imagenes/');

function debuguear($variable): string
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html): string
{
    $s = strip_tags($html);
    return $s;
}

//Funcion que revisa que el usuario este autenticado
function isLogged(): void
{
    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['login'])) {
        header('Location: /admin');
    }
}

function isNotLogged(): void
{
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['login'])) {
        header('Location: /');
    }
}

function isAdmin(): void
{
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['admin'])) {
        header('Location: /');
    }
}

function esUltimo(string $actual, string $proximo): bool
{
    if ($actual !== $proximo) {
        return true;
    }

    return false;
}