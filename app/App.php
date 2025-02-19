<?php

declare(strict_types=1);

namespace App;

use App\Services\AbstractApi\EmailValidationService;
use App\Services\Emailable\EmailValidationService as EmailableEmailValidationService;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
// use Illuminate\Container\Container;

use App\Services\EmailService;
use App\Services\Interface\EmailValidationInterface;
use Illuminate\Container\Container;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class App
{

    /**
     * App constructor initializes the container and service bindings.
     * 
     * @param Router $router The Router instance, used to resolve routes.
     * @param array $request The request data (e.g., URI, method).
     * @param Config $config The configuration instance (includes DB settings).
     */
    public function __construct(
        protected Container $container,
        protected Router $router,
        protected array $request,
        protected Config $config
    ) {

    }

    public function initDb(array $config)
    {
        $capsule = new Capsule;

        $capsule->addConnection($config);

        // Set the event dispatcher used by Eloquent models... (optional)
        $capsule->setEventDispatcher(new Dispatcher($this->container));

        // Make this Capsule instance available globally via static methods... (optional)
        $capsule->setAsGlobal();

        // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $capsule->bootEloquent();

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


    public function boot()
    {

        $this->config = new Config($_ENV);

        $this->initDb($this->config->db);

        $loader = new FilesystemLoader(VIEWS_PATH);
        $twig = new Environment($loader, [
            'cache' => STORAGE_PATH . '/cache',
            'auto_reload' => true
        ]);

        $this->container->bind(
            EmailValidationInterface::class,
            fn() => new EmailableEmailValidationService($this->config->apiKeys['emailable'])
            // fn() => new EmailValidationService($this->config->apiKeys['abstract'])
        );

        $this->container->singleton(Environment::class, fn() => $twig);

        return $this;

    }


}
