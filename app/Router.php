<?php

// Declare strict typing for better type enforcement
declare(strict_types=1);

// Define the namespace for the class
namespace App;


// Import the custom exception for handling undefined routes

use App\Atrributes\Route;
use App\Controllers\GeneratorExampleController;
use App\Controllers\IndexController;
use App\Exceptions\RouteNotFoundException;
use ReflectionAttribute;

// Define the Router class
class Router
{
    // Private property to store all routes
    private array $routes = [];

    public function __construct(private Container $container){

    }

    public function registerRouteFromControllerAttributes(array $controllersArray){
      
        foreach($controllersArray as $controller){
            $reflectionController = new \ReflectionClass($controller);

            foreach($reflectionController->getMethods() as $method){
                    $attributes = $method->getAttributes(Route::class, ReflectionAttribute::IS_INSTANCEOF);

                    foreach($attributes as $attribute){
                        $route = $attribute->newInstance(); 

                        $this->register($route->method, $route->routePath, [$controller, $method->getName()]);
                    }
            }
        }

    }

    // Method to register a new route with any HTTP method
    public function register(string $requestMethod, string $route, callable|array $action): self
    {
        // Add the route to the routes array indexed by HTTP method and route path
        $this->routes[$requestMethod][$route] = $action;
        // Return the instance for method chaining
        return $this;
    }

    // Shortcut method for GET routes
    public function get(string $route, callable|array $action): self
    {
        // Use the register method specifically for GET requests
        return $this->register('get', $route, $action);
    }

    // Shortcut method for POST routes
    public function post(string $route, callable|array $action): self
    {
        // Use the register method specifically for POST requests
        return $this->register('post', $route, $action);
    }

    // Getter method to return all registered routes
    public function routes(): array
    {
        return $this->routes;
    }

    // Method to resolve a route based on the URI and HTTP method
    public function resolve(string $requestUri, string $requestMethod)
    {
        // Strip query parameters from the URI to match route definitions
        $route = explode('?', $requestUri)[0];
        // Find the corresponding action for the given route and method
        $action = $this->routes[$requestMethod][$route] ?? null;

        // If no action is found, throw an exception for route not found
        if (!$action) {
            throw new RouteNotFoundException();
        }

        // If the action is callable (function or closure), execute it
        if (is_callable($action)) {
            return call_user_func($action);
        }
        // If the action is an array, assume it's [Class, Method]
        if (is_array($action)) {
            // Destructure the array into class and method names
            [$class, $method] = $action;
            // Check if the class exists
            if (class_exists($class)) {
                // Instantiate the class
                // $class = new $class();
                $class = $this->container->get($class);
                // Check if the method exists in the class
                if (method_exists($class, $method)) {
                    // Call the method on the class instance
                    return call_user_func_array([$class, $method], []);
                }
            }
        }

        // If no valid action was found or executed, throw an exception
        throw new RouteNotFoundException();
    }
}