<?php
namespace proyecto\entities;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
class MyLog
{
    private $log;

    public function __constructor(string $filename)
    {
        $this->log = new Logger('name');
        $this->log->pushHandler(
            new StreamHandler($filename, Logger::INFO));
    }

    public static function load(string $filename)
    {
        return new MyLog($filename);
    }

    public function add(string $message): void
    {
        $this->log->info($message);
    }
}
