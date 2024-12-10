<?php
use proyecto\entities\CategoriaRepositorio;
use proyecto\entities\ImagenGaleriaRepositorio;
use proyecto\entities\AsociadoRepositorio;
use proyecto\entities\App;
use proyecto\entities\AppException;
use proyecto\entities\QueryException;
use proyecto\utils;

$erroresImagenes = [];
$arrayImg = [];
try {
    $config = require_once 'app/config.php';
    App::bind('config', $config);
    $imagenRepositorio = new ImagenGaleriaRepositorio();
    $categoriaRepositorio = new CategoriaRepositorio();
    $arrayImg = $imagenRepositorio->findAll();
} catch (QueryException $exception) {
    $erroresAsociados[] = $exception->getMessage();
} catch (PDOException $exception) {
    $erroresAsociados[] = $exception->getMessage();
} catch (AppException $exception) {
    $erroresAsociados[] = $exception->getMessage();
} finally {
    $arrayImg = $imagenRepositorio->findAll();
}

$erroresAsociados = [];
$arrayAsociados = [];

try {
    $config = require_once 'app/config.php';
    App::bind('config', $config);
    $asociadoRepositorio = new AsociadoRepositorio();
    $arrayAsociados = $asociadoRepositorio->findAll();
} catch (QueryException $exception) {
    $erroresAsociados[] = $exception->getMessage();
} catch (PDOException $exception) {
    $erroresAsociados[] = $exception->getMessage();
} catch (AppException $exception) {
    $erroresAsociados[] = $exception->getMessage();
} finally {
    $arrayAsociados = $asociadoRepositorio->findAll();
}

$asociados = utils\extraerAsociados($arrayAsociados);

require 'app/views/index.view.php';
