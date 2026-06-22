<?php

namespace Core\Controller;

class AppController extends Controller
{
    protected $viewPath;
    protected $template = 'default';

    public function __construct()
    {
        $this->viewPath = ROOT . '/app/Views/';
    }

}