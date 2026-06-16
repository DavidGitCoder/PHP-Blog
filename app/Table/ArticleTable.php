<?php

namespace App\Table;

use Core\Table\Table;

class ArticleTable extends Table
{

    public function allWithCategory(): array
    {

        return $this->query("
                            select a.*, c.id as category_id, c.title as category_title
                            from article a left join category c 
                               on a.category_id = c.id
                            order by a.date desc
                            ");
    }
    public function find(string $id): array
    {
        return $this->query("
                            select a.*, c.id as category_id, c.title as category_title
                            from article a left join category c 
                               on a.category_id = c.id
                            where a.id=?
                            ", [$id]);
    }
    public function findByCategory(string $id): array
    {
        return $this->query("select * from article where category_id=?", [$id]);
    }

}