<?php

namespace Test\Unit;

use App\Exceptions\RouteNotFoundException;
use App\Router;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use Test\DataProviders\RouterDataProvider;

class RouterTest extends TestCase
{

    //You can use the annotation e.g /** @test */ 
    //or
    //prepending the word test to hint your terminal you want to test a particular method.
    //you can also import the various test classes and define the attribute just above the method that is to be tested.
    private Router $router;

    protected function setUp(): void
    {
        parent::setUp();
        $this->router = new Router();
    }

    #[Test]
    public function that_it_register_a_route(): void
    {


        //when we call a register method
        $this->router->register('get', '/users', ['Users', 'index']);

        $expected = [
            'get' => [
                '/users' => ['Users', 'index']
            ],
        ];
        //then we assert that route is registered
        $this->assertEquals($expected, $this->router->routes());
    }

    #[Test]
    public function that_it_register_get_route(): void
    {


        //when we call a register method
        $this->router->get('/users', ['Users', 'index']);

        $expected = [
            'get' => [
                '/users' => ['Users', 'index']
            ],
        ];
        //then we assert that route is registered
        $this->assertEquals($expected, $this->router->routes());
    }

    #[Test]
    public function that_it_register_post_route(): void
    {
        //given when we have a router object


        //when we call a register method
        $this->router->post('/users', ['Users', 'store']);

        $expected = [
            'post' => [
                '/users' => ['Users', 'store']
            ],
        ];
        //then we assert that route is registered
        $this->assertEquals($expected, $this->router->routes());
    }

    #[Test]
    public function there_are_no_route_when_router_is_created()
    {
        $this->assertEmpty((new Router())->routes());
    }

    #[Test]
    // #[DataProvider('routeNotFoundCases')]

    //external data-provider
    // /**
    //  * @dataProvider \Test\DataProviders\RouterDataProvider::routeNotFoundCases
    //  */

    #[DataProvider('Test\DataProviders\RouterDataProvider::routeNotFoundCases')]
    public function it_throws_route_not_found_error(string $requestUri, string $requestMethod): void
    {

        $users = new class()
        {
            public function delete()
            {
                return true;
            }
        };


        $this->router->post('/users', [$users::class, 'store']);
        $this->router->get('/users', ['Users', 'index']);


        $this->expectException(RouteNotFoundException::class);
        $this->router->resolve($requestUri, $requestMethod);
    }
}
