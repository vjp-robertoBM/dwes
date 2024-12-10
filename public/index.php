<?php
require_once '../utils/bootstrap.php';

use proyecto\entities\Request;
use proyecto\entities\App;

try {
    require App::get('router')->direct(Request::uri(), $_SERVER['REQUEST_METHOD']);
} catch (Exception $e) {
    die($e->getMessage());
}
