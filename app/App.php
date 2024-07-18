<?php

declare(strict_types=1);

namespace App;

use PDO;
use PDOException;

class App
{
    private static DB $db;
    public function __construct(protected Router $router, protected array $request, protected Config $config)
    {
        static::$db = new DB($config->db ?? null);
    }

    public function run()
    {
        try {
            echo $this->router->resolve($this->request['uri'], strtolower($this->request['method']));
        } catch (\App\Exceptions\RouteNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public static function db(): DB
    {
        return static::$db;
    }
}
