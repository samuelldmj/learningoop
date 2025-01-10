<?php

namespace Tests\Unit;

use App\Exceptions\RouteNotFoundException;
use App\Router;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
// use Tests\DataProviders\RouterDataProvider;

class RouterTest extends TestCase
{
    // Router instance to be tested
    private Router $router;

    // Set up the Router object before each test
    protected function setUp(): void
    {
        parent::setUp(); // Calls the parent setUp() method from TestCase
        $this->router = new Router(); // Initializes the Router object
    }

    // Test method to check route registration functionality
    #[Test]
    public function that_it_register_a_route(): void
    {
        // Register a GET route with the path '/users' and handler ['Users', 'index']
        $this->router->register('get', '/users', ['Users', 'index']);

        // Expected structure after route registration
        $expected = [
            'get' => [
                '/users' => ['Users', 'index']
            ],
        ];

        // Assert that the routes match the expected structure
        $this->assertEquals($expected, $this->router->routes());
    }

    // Test method to register a GET route using the 'get' helper method
    #[Test]
    public function that_it_register_get_route(): void
    {
        // Register a GET route with the path '/users' and handler ['Users', 'index']
        $this->router->get('/users', ['Users', 'index']);

        // Expected structure after route registration
        $expected = [
            'get' => [
                '/users' => ['Users', 'index']
            ],
        ];

        // Assert that the routes match the expected structure
        $this->assertEquals($expected, $this->router->routes());
    }

    // Test method to register a POST route using the 'post' helper method
    #[Test]
    public function that_it_register_post_route(): void
    {
        // Register a POST route with the path '/users' and handler ['Users', 'store']
        $this->router->post('/users', ['Users', 'store']);

        // Expected structure after route registration
        $expected = [
            'post' => [
                '/users' => ['Users', 'store']
            ],
        ];

        // Assert that the routes match the expected structure
        $this->assertEquals($expected, $this->router->routes());
    }

    // Test method to check that no routes are registered when the router is created
    #[Test]
    public function there_are_no_route_when_router_is_created()
    {
        // Assert that the newly created Router has no registered routes
        $this->assertEmpty((new Router())->routes());
    }

   
    #[Test]
    #[DataProvider("Tests\DataProviders\RouterDataProvider::routeNotFoundCases")]
    // #[DataProvider("routeNotFoundCases")]
    public function it_throws_route_not_found_error(string $requestUri, string $requestMethod): void
    {
        // Define an anonymous class to handle the 'delete' method
        $users = new class() {
            public function delete()
            {
                return true;
            }
        };

        // Register POST and GET routes for '/users'
        $this->router->post('/users', [$users::class, 'store']);
        $this->router->get('/users', ['Users', 'index']);

        // Expect the RouteNotFoundException to be thrown when resolving a non-existent route
        $this->expectException(RouteNotFoundException::class);

        // Attempt to resolve the route with the provided request URI and method
        $this->router->resolve($requestUri, $requestMethod);
    }

    
    // public static function routeNotFoundCases(): array
    // {
    //     return [
    //         ['/users', 'put'],
    //         ['/invoices', 'post'],
    //         ['/users', 'get'],
    //         ['/users', 'post']
    //     ];
    // }
    
}
