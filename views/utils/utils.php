<?php

    $arrayOpciones = ["contact","blog","about","index"];

    function esOpcionMenuActiva(string $opcion): bool{
        $opcionUri=$_SERVER['REQUEST_URI'];
        if (str_contains($opcionUri,$opcion)) {
            return true;
        } else {
            return false;
        }
        
    };

    foreach ($arrayOpciones as $key) {
        print(esOpcionMenuActiva($key));
    }
?>