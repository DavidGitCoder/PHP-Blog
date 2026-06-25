<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class ArticleController extends AppControler
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Article');
    }

    public function index()
    {
        $posts = $this->Article->allWithCategory();
        $type = $_GET['p'] ===
                    'admin.category.admin' ?
                    ["type"=>"article", "title"=>"Articles", "url"=>"articles"] :
                    ["type"=>"category", "title"=>"Catégories", "url"=>"categories"];
        $this->render("admin.articles.index", compact('posts','type'));
    }

    public function add()
    {

        $error_add=false;
        $this->loadModel('Category');
        $categories = $this->Category->all();

        $form = new BootstrapForm($_POST);
        if (!empty($_POST)) {
            $result = $this->Article->create([
                                            "title" => $_POST ['title'],
                                            "content" => $_POST ['content'],
                                            "category_id" => $_POST['category']
                                            ]);
            if ($result) {
                return $this->index();
            } else {
                $error_add=true;
            }
        }
        $this->render('admin.articles.edit', compact('form','categories','error_add'));
    }

    public function edit()
    {
        $error_edit=false;

        $this->loadModel('Category');
        $article_id = $_GET['id'];

        if (!empty($_POST)) {
            $result = $this->Article->update($article_id, [
                "title" => $_POST ['title'],
                "content" => $_POST ['content'],
                "category_id" => $_POST['category']
            ]);
            if ($result) {
                return $this->index();
            }else{
                $error_edit=true;
            }
        }

        $article = $this->Article->find($article_id);
        $categories = $this->Category->all();

        $data = !empty($_POST) ? $_POST : $article[0];
        $form = new BootstrapForm($data);

        $this->render('admin.articles.edit',compact('article','categories','form','error_edit'));
    }

    public function delete()
    {
        $article_id = $_POST['id'];

        if (!empty($_POST)) {
            $result = $this->Article->delete($article_id);

            return $this->index();

        }

    }

}