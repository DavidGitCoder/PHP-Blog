<?php

namespace App\Entity;
use Core\Entity\Entity;

class ArticleEntity extends Entity
{

    public function getUrl()
    {
        return 'index.php?p=article.show&id=' . $this->id;
    }

    public function getExtrait()
    {
        if (isset($this->content)) {
            $html = '<p>' . substr($this->content, 0, 100) . '...</p>';
            $html .= '<p>' . '<a href="' . $this->getUrl() . '">View More</a></p>';
            return $html;
        }
        return;

    }

    public function getCategoryUrl()
    {
        return 'index.php?p=article.category&id=' . $this->category_id;
    }
}