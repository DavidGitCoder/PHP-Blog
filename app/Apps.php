<?php

namespace App;

class Apps
{
    public string $title = 'My super site';
    private static $_instance;

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Apps();
        }
        return self::$_instance;
    }

    private function __construct()
    {

    }

}