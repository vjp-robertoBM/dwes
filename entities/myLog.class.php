<?php
class MyLog {
    private $log;

    public function __constructor (string $filename) {
        $this->log=new Monolog\Logger('name');
        $this->log->pushHandler{
            new Monolog\handler\StreamHandler($filename, Monolog\Logger::INFO)};
    }

    public static function load(string $filename) {
        return new MyLog($filename);
    }

    public function add(string $message):void {
        $this->log->info($message);
    }
}