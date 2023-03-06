<?php

$db = mysqli_connect('zimplx.com', 'u425383455_zimplx_deploy', 'Juanma20', 'u425383455_zimplx_deploy');

if (!$db) {
    echo "Error: No se pudo conectar a MySQL.";
    echo "errno de depuración: " . mysqli_connect_errno();
    echo "error de depuración: " . mysqli_connect_error();
    exit;
}
