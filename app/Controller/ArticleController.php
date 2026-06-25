<?php
namespace App\Controller;

use App;

class ArticleController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Article');
        $this->loadModel('Category');
    }
    public function index()
    {
        $posts = $this->Article->allWithCategory();
        $categories = $this->Category->all();
        $this->render('articles.index', compact('posts','categories'));
    }

    public function category()
    {
        $cat_model =$this->Category;
        $cat = $cat_model->find($_GET['id']);
        $articles = $this->Article->findByCategory($_GET['id']);
        $categories = $cat_model->all();
        if(!$cat) $this->notFound();
        App::getInstance()->title= $cat[0]->title;

        $this->render('articles.category', compact('cat','articles','categories'));


    }

    public function show()
    {
        $post =$this->Article->find($_GET['id']);
        if (!$post) $this->notFound();
        App::getInstance()->title=$post[0]->title;
        $this->render('articles.show', compact('post'));
    }


}