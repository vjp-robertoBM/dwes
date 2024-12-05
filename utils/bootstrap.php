<?php
require 'entities/app.class.php';
require 'entities/request.class.php';
require 'entities/router.class.php';
$config = require_once 'app/config.php';
App::bind('config', $config);
