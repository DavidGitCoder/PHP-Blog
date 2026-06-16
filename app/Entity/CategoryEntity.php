<?php

namespace App\Entity;

use Core\Entity\Entity;

class CategoryEntity extends Entity
{
    public $category;

    public function __construct()
    {
        $this->category=$this->id;
    }
public function getUrl()
{
    return 'index.php?p=article.category&id='.$this->id;
}
}