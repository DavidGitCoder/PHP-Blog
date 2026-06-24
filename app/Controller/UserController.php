<?php

namespace App\Controller;

use Core\Controller\AppController;

class UserController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $user = $this->loadModel('Users');
        // Auth
        $auth=new DBAuth($app->getDb());
        if(!$auth->isLogged()){
            $app->forbidden();
        }
    }
    public function login()
    {

    }
}