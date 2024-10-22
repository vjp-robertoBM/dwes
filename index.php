<?php 
    require 'views/utils/utils.php';
    require 'entities/ImagenGaleria.class.php';
    
    $arrayImg=[];
    for ($i=1; $i < 13; $i++) {
        $r1 = rand(1000,5000);
        $r2 = rand(100,500);
        $r3 = rand(10,200);
        $img = new imagenGaleria($i.'.jpg','Descripción imagen '.$i,$r1,$r2,$r3);

        array_push($arrayImg,$img);
    }

    require 'views/index.view.php';
?>