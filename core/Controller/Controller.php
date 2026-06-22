<?php

namespace Core\Controller;

class Controller
{
    protected $viewPath;
    protected $template;

    protected function render(string $view, array $params=[])
    {
        ob_start();
        extract($params);
        require $this->viewPath . str_replace('.', '/', $view) . '.php';
        $content = ob_get_clean();
        require $this->viewPath . 'templates/' . $this->template . '.php';
    }

    protected function notFound()
    {
        header('HTTP/1.0 403 Forbidden');
        die('Page Not Found');

    }
    protected function forbidden()
    {
        header('HTTP/1.0 403 Forbidden');
        die('Forbidden Access');
    }
}