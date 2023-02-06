<?php

declare(strict_types=1);

require __DIR__ . '/../app/Exceptions/ViewNotFoundException.php';

class View
{
    public function __construct(
        protected string $view,
        protected array $params = []
        )
    {}

    public static function make(string $view, array $params = []): static
    {
        return new static($view, $params);
    }

    public function render(): string
    {
        $layoutPath = VIEW_PATH . '/Partials/layout.php';
        ob_start();
        include $layoutPath;
        $layout = (string) ob_get_clean();
        
        $viewPath = VIEW_PATH . '/' . $this->view . '.php';
        if(!file_exists($viewPath)) {
            throw new ViewNotFoundException();
        }
        
        ob_start();
        include $viewPath;
        $view = (string) ob_get_clean();

        return str_replace('{{content}}', $view, $layout);
    }

    public function __toString()
    {
        return $this->render();
    }

    public function __get(string $name)
    {
        return $this->params[$name] ?? null;
    }
}