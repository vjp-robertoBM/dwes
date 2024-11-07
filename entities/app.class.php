<?php
require_once 'entities/appException.class.php';
require_once 'utils/const.php';
class App
{
    public static $container = [];
    public static function bind($clave, $valor)
    {
        static::$container[$clave] = $valor;
    }

    public static function get(string $key)
    {
        if (!array_key_exists($key, static::$container)) {
            throw new AppException(ERROR_STRINGS[ERROR_APP_CORE]);
        }
        return static::$container[$key];
    }

    public static function getConnection()
    {
        if (!array_key_exists('connection', static::$container)) {
            static::$container['connection'] = Connection::make();
        }
        return static::$container['connection'];
    }
}
