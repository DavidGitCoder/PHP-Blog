<?php

namespace App\Table;

use App\Apps;

class Table
{
    protected static $table;

    public static function query(string $statement, array $attributes=null): array
    {
        if($attributes){
            return Apps::getDb()->prepare($statement, $attributes, get_called_class());
        }
        return Apps::getDb()->query($statement, get_called_class());
    }

//    private static function getTable(): string
//    {
//        // static:: will get the attribute from the called class, self::$table references the attribute from this class only
//        if (static::$table === null) {
//            $class_name = explode('\\', get_called_class());
//            static::$table = strtolower(end($class_name));
//        }
//        return static::$table;
//    }

    public static function getAll(): array
    {
        $table = static::$table;
        return self::query("SELECT * FROM $table");
    }

    public function __get($key)
    {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

    public static function find(string $id): array
    {
        return self::query("select * from " . static::$table . " where id= ?", [$id]);
    }
}