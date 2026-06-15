<?php

namespace Core;
// exemple de Singleton
class Config
{
    private array $settings = [];
    private static $_instance;

    public static function getInstance(string $file)
    {
        if(is_null(self::$_instance)){
            self::$_instance=new Config($file);
        }
        return self::$_instance;
    }

    private function __construct(string $file)
    {
        $this->settings = require $file;
    }
    public function get(string $key){
        return $this->settings[$key] ?? null;
    }
}