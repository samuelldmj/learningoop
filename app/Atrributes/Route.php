<?php

namespace  App\Atrributes;

use App\Enums\HttpMethod;
use App\Services\Interface\RouterInterface;
use Attribute;

#[Attribute]
class Route implements RouterInterface {
    public function __construct(public string $routePath, public HttpMethod $method = HttpMethod::GET)
    {
        

    }
}