<?php

namespace App;

class Customer
{
    public function __construct(private array $billingInfo = [])
    {
    }

    public function getBilingInfo(): array
    {
        return $this->billingInfo;
    }
}
