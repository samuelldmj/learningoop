<?php

declare(strict_types=1);

namespace App;

use App\Services\EmailService;
use App\Services\GatewayService;
use App\Services\InvoiceServices;
use App\Services\SalesTaxService;
use PDO;
use PDOException;

class App
{
    // Static property to hold the instance of the database connection
    private static DB $db;

    // Static property to hold the container instance (dependency injection container)
    public static Container $container;

    /**
     * App constructor initializes the container and service bindings.
     * 
     * @param Router $router The Router instance, used to resolve routes.
     * @param array $request The request data (e.g., URI, method).
     * @param Config $config The configuration instance (includes DB settings).
     */
    public function __construct(protected Router $router, protected array $request, protected Config $config)
    {
        // Initialize the DB connection using the configuration values
        static::$db = new DB($config->db ?? null);

        // Initialize the container (dependency injection container)
        static::$container = new Container;

        // Register InvoiceServices in the container with its dependencies.
        static::$container->set(InvoiceServices::class, function(Container $c) {
            // Return a new InvoiceServices object, injecting its required dependencies.
            return new InvoiceServices(
                $c->get(SalesTaxService::class),  // Resolve SalesTaxService from the container
                $c->get(GatewayService::class),  // Resolve GatewayService from the container
                $c->get(EmailService::class)    // Resolve EmailService from the container
            );
        });

        // Register SalesTaxService in the container using a simple closure to instantiate it
        static::$container->set(SalesTaxService::class, fn() => new SalesTaxService());

        // Register GatewayService in the container using a simple closure to instantiate it
        static::$container->set(GatewayService::class, fn() => new GatewayService());

        // Register EmailService in the container using a simple closure to instantiate it
        static::$container->set(EmailService::class, fn() => new EmailService());
    }

    /**
     * Runs the application by resolving the appropriate route and executing it.
     */
    public function run()
    {
        try {
            // Resolve the route based on the requested URI and HTTP method (e.g., GET, POST)
            echo $this->router->resolve($this->request['uri'], strtolower($this->request['method']));
        } catch (\App\Exceptions\RouteNotFoundException $e) {
            // If the route is not found, catch the exception and display the error message
            echo $e->getMessage();
        }
    }

    /**
     * Returns the DB instance.
     * 
     * @return DB The database instance.
     */
    public static function db(): DB
    {
        return static::$db;
    }
}
