<?php

namespace App;
class Autoloader
{
    static function register()
    {

        spl_autoload_register([__CLASS__, 'autoload']);
    }

    static function autoload()
    {
        spl_autoload_register(callback: function ($class) {

            if (strpos($class, __NAMESPACE__.'\\') !== false) {
                $class = preg_replace('#^('.__NAMESPACE__.')#', '', $class);
                $file = __DIR__ . '\\' . $class . '.php';
                if (file_exists($file)) {
                    require $file;
                }
            }

        });
    }

}