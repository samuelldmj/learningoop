<?php

declare(strict_types=1);

namespace App;

/**
 * @property-read ?array $db
 */

class Config
{
    protected array $config = [];
    public function __construct(array $env)
    {
        $this->config = [
            'db' => [
                'driver' => $env['DB_DRIVER'] ?? 'mysql',
                'host' => $env['DB_HOST'],
                'database' => $env["DB_DATABASE"],
                'username' => $env['DB_USER'],
                'password' => '',
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix' => '',
            ]
        ];
    }


    public function __get($name)
    {
        return $this->config[$name] ?? null;
    }
}
