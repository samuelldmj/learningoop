<?php

declare(strict_types=1);
class Trans
{

    public ?Customer $customer = null;


    public function __construct(private float $amount, private string $description)
    {
    }
}
