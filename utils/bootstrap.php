<?php
require_once 'entities/app.class.php';
require_once 'entities/request.class.php';
require_once 'entities/router.class.php';
require_once 'vendor/autoload.php';
require_once 'entities/myLog.class.php';
$config = require_once 'app/config.php';
App::bind('config', $config);
App::bind('router', Router::load('utils/routes.php'));
App::bind('logger', MyLog::load('logs/proyecto.log'));
