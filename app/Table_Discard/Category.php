<?php

namespace App\Table_Discard;

class Category extends Table
{
    protected static $table = 'category';

    protected function getUrl():string{
        return 'index.php?p=category&id='.$this->id;
    }


}