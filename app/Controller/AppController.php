<?php

namespace App\Controller;
use App;
use Core\Controller\Controller;

class AppController extends Controller
{
    protected string $template = 'default';

    public function __construct()
    {
        $this->viewPath = ROOT . '/app/Views/';
    }

    protected function loadModel(string $model_name)
    {
        $this->$model_name = App::getInstance()->getTable($model_name);
    }
}