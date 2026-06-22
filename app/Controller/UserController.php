<?php

namespace App\Controller;

use Core\Controller\AppController;

class UserController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Users');
    }
    public function login()
    {

    }
}