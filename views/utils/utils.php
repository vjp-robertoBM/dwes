<?php
    function esOpcionMenuActiva(string $opcion): bool{
        if ($_SERVER['REQUEST_URI']==$opcion) {
            return true;
        } else {
            return false;
        }
        
    };

    function existeOpcionMenuActivaArray(...$array) {
        foreach ($array as $key) {
            if (esOpcionMenuActiva($key)) {
                return true;
            } else {
                return false;
            }
        }
    }
?>