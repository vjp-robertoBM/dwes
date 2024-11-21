<?php
require 'entities/imagenGaleria.class.php';
require 'entities/asociado.class.php';
require 'utils/utils.php';

$arrayImg = [];
for ($i = 1; $i < 13; $i++) {
    $r1 = rand(1000, 5000);
    $r2 = rand(100, 500);
    $r3 = rand(10, 200);
    $img = new ImagenGaleria($i . '.jpg', 'Descripción imagen ' . $i, $r1, $r2, $r3);

    array_push($arrayImg, $img);
}

$arrayAsociados = [
    new Asociado("Asociado 1", "log1.jpg", "Descripción 1"),
    new Asociado("Asociado 2", "log2.jpg", "Descripción 2"),
    new Asociado("Asociado 3", "log3.jpg", "Descripción 3"),
];

$asociados = extraerAsociados($arrayAsociados);

require 'views/index.view.php';
