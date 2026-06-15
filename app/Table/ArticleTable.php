<?php

namespace App\Table;

use Core\Table\Table;

class ArticleTable extends Table
{
    public function all(): array
    {
        return $this->query("
                            select a.*, c.title as category_title 
                            from article a left join category c 
                               on a.category_id = c.id
                            order by a.date desc
                            ");
    }
}