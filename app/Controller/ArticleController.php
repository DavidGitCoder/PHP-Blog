<?php
namespace App\Controller;

use Core\Controller\AppController;
use \App;
class ArticleController extends AppController
{
    public function index()
    {
        $posts = App::getInstance()->getTable('Article')->allWithCategory();
        $categories = App::getInstance()->getTable('Category')->all();
        $this->render('articles.index', compact('posts','categories'));
    }

    public function category()
    {

        require ROOT.'\pages\articles\category.php';

    }

    public function show()
    {
        require ROOT.'\pages\articles\show.php';

    }
}