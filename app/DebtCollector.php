<?php

namespace App;


interface DebtCollector
{
    public function collect(float $owedAmount): float;
}
