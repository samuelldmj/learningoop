<?php

namespace App;

trait CappucinoTrait
{
    protected $milkType = 'ChocoLatey';
    private function makeCappucino()
    {
        echo static::class . " is  making cappuccino" . PHP_EOL;
    }

    public function makeLatte()
    {
        echo static::class . " is  making latte (From Cappucino)". " with milk-type  " .$this->milkType . PHP_EOL;
    }
}
