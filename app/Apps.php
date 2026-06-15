<?php

namespace App;

use Core\Config;
use Core\Database\MySqlDatabase;
use core\Table\Table;

class Apps
{
    public string $title = 'My super site';
    private $db_instance;
    private static $_instance;

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Apps();
        }
        return self::$_instance;
    }

    public function getTable($name):Table
    {
        $class_name='App\\Table\\'.ucfirst($name).'Table';
        return new $class_name($this->getDb());
    }

    public function getDb()
    {
        if(is_null($this->db_instance)){
            $config=Config::getInstance();
            $this->db_instance= new MySqlDatabase($config->get("db_name"),$config->get("db_host"),$config->get("db_port"),$config->get("db_user"),$config->get("db_pass"));
        }
        return $this->db_instance;
    }

}