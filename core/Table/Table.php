<?php

namespace Core\Table;

use Core\Database\Database;

class Table
{
    protected $table;
    protected ?Database $db;

    public function __construct(Database $db=null) // Dependency Injection
    {
       $this->db= isset($db) ? $this->db = $db : null;
        if (is_null($this->table)) {
            $array = explode('\\', get_class($this));
            $this->table = strtolower(str_replace('Table', '', end($array)));
        }
    }

    public function query(string $statement, array $attributes = null): array
    {
         if ($attributes) {
            return $this->db->prepare($statement, $attributes, get_called_class());
        }
        return $this->db->query("$statement", get_called_class());
    }

}