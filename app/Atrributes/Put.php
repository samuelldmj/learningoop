<?php

declare(strict_types=1);

namespace   App\Atrributes;

use App\Enums\HttpMethod;
use Attribute;

#[Attribute()]
class Put extends Route {
    public function __construct(string $routePath){
        parent::__construct($routePath, HttpMethod::PUT);
    }
}