<?php

use Core\Config;
use Core\Database\MySqlDatabase;
use Core\Table\Table;

class App
{
    public string $title = 'My super site';
    private $db_instance;
    private static $_instance;

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
//            echo "I'm a new App Instance!";
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public static function load()
    {
        session_start();
        require ROOT . '\app\Autoloader.php';
        App\Autoloader::register();
        require ROOT . '\core\Autoloader.php';
        Core\Autoloader::register();
    }

    public function getTable($name): Table
    {
        $class_name = 'App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
    }

    public function getDb()
    {
        if (is_null($this->db_instance)) {
            $config = Config::getInstance(ROOT . '\config\config.php');
            $this->db_instance = new MySqlDatabase($config->get("db_name"), $config->get("db_host"), $config->get("db_port"), $config->get("db_user"), $config->get("db_pass"));
        }
        return $this->db_instance;
    }
    public static function notFound()
    {
        header('HTTP/1.0 403 Forbidden');
        die('Page Not Found');

    }
    function forbidden()
    {
        header('HTTP/1.0 403 Forbidden');
        die('Forbidden Access');
    }

}