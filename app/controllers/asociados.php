<?php
require 'utils/utils.php';
require 'entities/file.class.php';
require 'entities/asociado.class.php';
require_once 'entities/queryBuilder.class.php';
require_once 'entities/appException.class.php';
require_once 'entities/repository/asociadoRepositorio.class.php';

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
    $asociados = $asociadoRepositorio->findAll();
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
