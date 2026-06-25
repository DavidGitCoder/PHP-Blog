<?php

namespace App\Controller\Admin;
use Core\HTML\BootstrapForm;

class CategoryController extends AppControler
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Category');
    }

    public function index()
    {
        $categories = $this->Category->all();
        $type = $_GET['p'] ===
        'admin.category.index' ?
            ["type"=>"article", "title"=>"Articles", "url"=>"articles"] :
            ["type"=>"category", "title"=>"Catégories", "url"=>"categories"];
        $this->render("admin.categories.index", compact('categories','type'));
    }

    public function add()
    {
        $error_add=false;
        $action='add';
        $category=[];
        $this->loadModel('Category');

        $form = new BootstrapForm($_POST);
        if (!empty($_POST)) {
            $result = $this->Category->create([
                "title" => $_POST ['title']
            ]);
            if ($result) {
                return $this->index();
            } else {
                $error_add=true;
            }
        }
        $this->render('admin.categories.edit', compact('form', 'error_add','action','category'));
    }

    public function edit()
    {
        $error_edit=false;
        $action='edit';
        $this->loadModel('Category');
        $category_id = $_GET['id'];

        if (!empty($_POST)) {
            $result = $this->Category->update($category_id, [
                "title" => $_POST ['title'],
            ]);
            if ($result) {
                return $this->index();
            }else{
                $error_edit=true;
            }
        }

        $category = $this->Category->find($category_id);

        $data = !empty($_POST) ? $_POST : $category[0];
        $form = new BootstrapForm($data);

        $this->render('admin.categories.edit',compact('category','form','error_edit', 'action'));
    }

    public function delete()
    {
        $category_id = $_POST['id'];

        if (!empty($_POST)) {
            $result = $this->Category->delete($category_id);
            return $this->index();
        }
    }
}