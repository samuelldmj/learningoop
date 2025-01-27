<?php

declare(strict_types=1);

namespace App\Atrributes;

use App\Enums\HttpMethod;
use Attribute;

#[Attribute()]
class Post extends Route {
    public function __construct(string $routePath){
        parent::__construct($routePath, HttpMethod::POST);
    }
}