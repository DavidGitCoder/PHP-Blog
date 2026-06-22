<?php

namespace Core\Controller;

class Controller
{
    protected $viewPath;
    protected $template;

    public function render(string $view, array $params=[])
    {
        ob_start();
        extract($params);
        require $this->viewPath . str_replace('.', '/', $view) . '.php';
        $content = ob_get_clean();
        require $this->viewPath . 'templates/' . $this->template . '.php';
    }
}