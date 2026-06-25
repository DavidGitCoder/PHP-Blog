<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use App;
use Core\Auth\DBAuth;

class AppControler extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $auth=new DBAuth(App::getInstance()->getDb());
        if(!$auth->isLogged()){
            $this->forbidden();
        }

    }
}