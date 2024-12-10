<?php

use proyecto\entities\CategoriaRepositorio;
use proyecto\entities\ImagenGaleriaRepositorio;
use proyecto\entities\ImagenGaleria;
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
    $imagenRepositorio = new ImagenGaleriaRepositorio();
    $categoriaRepositorio = new CategoriaRepositorio();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $categoria = trim(htmlspecialchars($_POST['categoria']));
        $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
        $imagen = new File('imagen', $tiposAceptados);
        $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
        $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);
        $imagenGaleria = new ImagenGaleria($imagen->getFileName(), $descripcion, $categoria);
        $imagenRepositorio->save($imagenGaleria);
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
    $imagenes = $imagenRepositorio->findAll();
    $categorias = $categoriaRepositorio->findAll();
}


require 'app/views/gallery.view.php';
