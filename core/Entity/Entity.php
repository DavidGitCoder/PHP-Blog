<?php

namespace Core\Entity;

class Entity
{
    public function __get(string $attribute)
    {
        if (isset($attribute)) {
            $method = 'get' . ucfirst($attribute);
            return $this->$method();
        }
        return;
    }
}