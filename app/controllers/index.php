<?php
require 'entities/imagenGaleria.class.php';
require 'entities/asociado.class.php';
require 'entities/repository/asociadoRepositorio.class.php';
require 'entities/repository/categoriaRepositorio.class.php';
require 'entities/repository/imagenGaleriaRepositorio.class.php';
require 'utils/utils.php';

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

$asociados = extraerAsociados($arrayAsociados);

require 'app/views/index.view.php';
