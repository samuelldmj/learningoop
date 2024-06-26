<?php

namespace App;

class CollectionAgency implements DebtCollector
{
    public function collect(float $owedAmount): float
    {
        $guranteed = $owedAmount * 0.5;

        return mt_rand($guranteed, $owedAmount);
    }
}
