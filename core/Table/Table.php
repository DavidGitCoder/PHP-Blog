<?php

namespace Core\Table;

use Core\Database\Database;

class Table
{
    protected $table;
    protected ?Database $db;

    public function __construct(Database $db = null) // Dependency Injection
    {
        $this->db = isset($db) ? $this->db = $db : null;
        if (is_null($this->table)) {
            $array = explode('\\', get_class($this));
            $this->table = strtolower(str_replace('Table', '', end($array)));
        }
    }

    public function query(string $statement, array $attributes = null): array
    {
        $class_name = str_replace('Table', 'Entity', get_called_class());
        if ($attributes) {
            return $this->db->prepare($statement, $attributes, $class_name);
        }
        return $this->db->query("$statement", $class_name);
    }

    public function all(): array
    {
        return $this->query("select * from {$this->table}");
    }

    public function find(string $id): array
    {
        return $this->query("select * from {$this->table} where id=?", [$id]);
    }

    public function update($id, $data)
    {
        $fields = [];
        $values = [];

        foreach ($data as $key => $val) {
            $fields[] = "$key = ?";
            $values[] = $val;
        }
        $values[] = $id;
        $fields = implode(',', $fields);
        return $this->query("update {$this->table} set $fields where id=?", $values);
    }

    public function create($data)
    {

        $fields = [];
        $values = [];
        $params = [];

        foreach ($data as $key => $val) {
            $fields[] = $key;
            $values[] = '?';
            $params[] = $val;
        }
        $fields = implode(',', $fields);
        $values = implode(',', $values);
        return $this->query("insert into {$this->table} ($fields) values($values)", $params);
    }
}