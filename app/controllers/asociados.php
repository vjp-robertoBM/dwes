<?php
use proyecto\entities\AsociadoRepositorio;
use proyecto\entities\Asociado;
use proyecto\entities\File;
use proyecto\entities\FileException;
use proyecto\entities\App;
use proyecto\entities\AppException;
use proyecto\entities\QueryException;
use PDOException;

$errores = [];
$descripcion = "";
$mensaje = "";
try {
    $config = require_once 'app/config.php';
    App::bind('config', $config);
    $asociadoRepositorio = new AsociadoRepositorio();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $nombre = trim(htmlspecialchars($_POST['nombre']));
        $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
        $logo = new File('imagen', $tiposAceptados);
        $logo->saveUploadFile(Asociado::RUTA_LOGO);
        $asociado = new Asociado($nombre,$logo,$descripcion);
        $asociadoRepositorio->save($asociado);
        $descripcion = '';
        $mensaje = 'Imagen guardada';
    }
} catch (FileException $exception) {
    $errores[] = $exception->getMessage();
} catch (QueryException $exception) {
    $errores[] = $exception->getMessage();
} catch (AppException $exception) {
    $errores[] = $exception->getMessage();
} catch (PDOException $exception) {
    $errores[] = $exception->getMessage();
} finally {
    $asociados = $asociadoRepositorio->findAll();
}


require 'app/views/asociados.view.php';
