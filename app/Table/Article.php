<?php

namespace App\Table;

class Article extends Table
{
    protected static $table="article";
    public static function find(string $id): array
    {
        return self::query("
                            select  c.id as category_id, c.title as category_title, a.id,a.title,a.content, a.date
                            from article a left join category c 
                               on a.category_id = c.id
                            where a.id=?
                            ", [$id]);
    }
    public static function getLast(): array
    {
        return self::query("
                            select a.*, c.title as category_title 
                            from article a left join category c 
                               on a.category_id = c.id
                            order by a.date desc
                            ");
    }

    public function getExtrait(): string
    {
        $words = explode(' ', $this->content);
        $excerpt = implode(' ', array_slice($words, 0, 30));
        $html = <<<HTML
            <p>
            $excerpt
            ...
            </p>
            <a href="{$this->getUrl()}">Voir la suite</a>
            HTML;
        return $html;
    }

    /**
     * @return mixed
     */
    public function getUrl(): string
    {

        return 'index.php?p=article&id=' . $this->id;
    }
    public function getCategoryUrl(): string
    {

        return 'index.php?p=category&id=' . $this->category_id;
    }

    public static function lastByCategory($category_id): array
    {
        return self::query("
                            select c.id as category_id, c.title as category_title, a.id,a.title,a.content, a.date 
                            from category c 
                            join article a on c.id=a.category_id 
                            where a.category_id = ?
                            order by a.date desc
                           ", [$category_id]);
    }
}