<?php

namespace App;

trait LatteTrait
{

    public function makeLatte()
    {
        echo static::class . " is  making latte" . PHP_EOL;
    }
}
