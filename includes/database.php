<?php

$db = mysqli_connect('portafolio-juanquijano.online', 'u425383455_juan', 'Juanma20', 'u425383455_zimplx');

if (!$db) {
    echo "Error: No se pudo conectar a MySQL.";
    echo "errno de depuración: " . mysqli_connect_errno();
    echo "error de depuración: " . mysqli_connect_error();
    exit;
}
