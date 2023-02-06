<?php

declare(strict_types=1);

class App
{
    private static \PDO $db;
    public function __construct(protected Router $router)
    {
        try {
            static::$db = new PDO('mysql:host=db;dbname=novaturas', 'root', 'root', [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
        } catch(\PDOException $e) {
            throw new \PDOException($e->getMessage(), $e->getCode());
        };
    }

    public static function db(): \PDO
    {
        return static::$db;
    }

    public function run()
    {
        try {
            echo $this->router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
        } catch(RouteNotFoundException $e) {
            http_response_code(404);
        
            echo View::make('error/404');
        };        
    }
}