<?php

namespace Core\Database;
// DESIGN PATTERN: FLUENT
class QueryBuilder
{
    private $fields=[];
    private $from=[];
    private $conditions=[];

    public function select()
    {
        foreach (func_get_args() as $field){
            array_push($this->fields, $field);

        }
        return $this;
    }
    public function from($table,$alias="")
    {
        if($alias){
            $this->from="$table AS $alias";
        }
        else{
            $this->from="$table";
    }
        return $this;
    }
    public function where()
    {
        foreach (func_get_args() as $condition){
            array_push($this->conditions, $condition);

    }
        return $this;
    }

    public function __toString()
    {
        return  'SELECT ' . implode(', ', $this->fields)
                . ' FROM ' . $this->from
                . ' WHERE ' . implode(' AND ', $this->conditions);
    }
}