<?php
require 'utils/utils.php';

$errores = [];
$descripcion = '';
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $mensaje = 'Datos enviados';
    } catch (FileException $exception) {
    }
}

require 'views/galeria.view.php';
