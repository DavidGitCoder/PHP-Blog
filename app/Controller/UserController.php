<?php

namespace App\Controller;

use Core\HTML\BootstrapForm;
use Core\Auth\DBAuth;
use \App;

class UserController extends AppController
{
    public function login()
    {
        $error=true;
        $username="";
        if(!empty($_POST)){
            $auth=new DBAuth(App::getInstance()->getDb());
            $username=$_POST['username'];
            if($auth->login($_POST['username'],$_POST['password'])){
                $error=false;
                header('Location: index.php?p=admin.article.index');
            }
        }
        $form=new BootstrapForm($_POST);
        $this->render('users.login', compact('form','error','username'));
    }

}