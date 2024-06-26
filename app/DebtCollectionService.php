<?php

namespace App;

class DebtCollectionService
{

    public function collectDebt(DebtCollector $collector)
    {
        $owedAmount = mt_rand(100, 1000);
        $collectedAmount = $collector->collect($owedAmount);

        echo "Collected $" . $collectedAmount . ' out of $' . $owedAmount;
    }
}
