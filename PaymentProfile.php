<?php


class PaymentProfile
{

    public int $id;

    public function __construct()
    {
        $this->id = rand();
    }
}
