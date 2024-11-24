<?php
require 'entities/imagenGaleria.class.php';
require 'entities/asociado.class.php';
require 'entities/connection.class.php';
require 'entities/repository/asociadoRepositorio.class.php';
require 'utils/utils.php';

$arrayImg = [];
for ($i = 1; $i < 13; $i++) {
    $r1 = rand(1000, 5000);
    $r2 = rand(100, 500);
    $r3 = rand(10, 200);
    $img = new ImagenGaleria($i . '.jpg', 'Descripción imagen ' . $i, $r1, $r2, $r3);

    array_push($arrayImg, $img);
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
}

$asociados = extraerAsociados($arrayAsociados);

require 'views/index.view.php';
