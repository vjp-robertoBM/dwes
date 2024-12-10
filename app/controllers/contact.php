<?php
use proyecto\entities\MensajeRepositorio;
use proyecto\entities\Mensaje;
use proyecto\entities\App;
use proyecto\entities\AppException;
use proyecto\entities\QueryException;
use PDOException;

$errores = [];
try {
    $config = require_once 'app/config.php';
    App::bind('config', $config);
    $mensajeRepositorio = new MensajeRepositorio();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = trim(htmlspecialchars($_POST['nombre']));
        $apellidos = trim(htmlspecialchars($_POST['apellidos']));
        $email = $_POST['email'];
        $asunto = trim(htmlspecialchars($_POST['asunto']));
        $texto = trim(htmlspecialchars($_POST['texto']));
        $mensaje = new Mensaje($nombre,$apellidos,$email,$asunto,$texto);
        $mensajeRepositorio->save($mensaje);
    }
} catch (QueryException $exception) {
    $errores[] = $exception->getMessage();
} catch (AppException $exception) {
    $errores[] = $exception->getMessage();
} catch (PDOException $exception) {
    $errores[] = $exception->getMessage();
}

require 'app/views/contact.view.php';
