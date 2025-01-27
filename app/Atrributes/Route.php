<?php

namespace  App\Atrributes;

use App\Services\Interface\RouterInterface;
use Attribute;

#[Attribute]
class Route implements RouterInterface {
    public function __construct(public string $routePath, public string $method = 'get')
    {
        

    }
}