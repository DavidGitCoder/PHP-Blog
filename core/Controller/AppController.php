<?php

namespace Core\Controller;
use \App;
class AppController extends Controller
{
    protected $viewPath;
    protected $template = 'default';

    public function __construct()
    {
        $this->viewPath = ROOT . '/app/Views/';
    }

    protected function loadModel(string $model_name)
    {
        $this->$model_name = App::getInstance()->getTable($model_name);
    }
}