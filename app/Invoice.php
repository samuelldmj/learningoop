<?php

namespace App;

class Invoice
{
    private string $id;
    public function __construct()
    {
        $this->id = uniqid("invoice___");
    }

    public static function create(): static
    {
        return new static();
    }
}
