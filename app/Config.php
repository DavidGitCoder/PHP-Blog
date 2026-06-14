<?php

namespace App;
// exemple de Singleton
class Config
{
    private array $settings = [];
    private static $_instance;

    public static function getInstance()
    {
        if(is_null(self::$_instance)){
            self::$_instance=new Config();
        }
        return self::$_instance;
    }

    private function __construct()
    {
        $this->id=uniqid();
        $this->settings = require dirname(__DIR__) . '/config/config.php';
    }
    public function get(string $key){
        return $this->settings[$key] ?? null;
    }
}