<?php

namespace App;

use Renderable;

abstract class Field implements Renderable
{

    public function __construct(protected string $name)
    {
    }

    
}
