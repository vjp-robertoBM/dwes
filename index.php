<?php
require 'utils/bootstrap.php';

try {
    require Router::load('utils/routes.php')->direct(Request::uri(), Request::method());
} catch (Exception $e) {
    die($e->getMessage());
}
