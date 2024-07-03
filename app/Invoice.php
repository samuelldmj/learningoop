<?php

namespace App;


class Invoice
{
    public string $id;

    public function __construct(public float $amount)
    {
        return $this->id = random_int(10000, 999999);
    }

    

   
}
