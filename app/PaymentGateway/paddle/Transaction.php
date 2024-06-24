<?php

declare(strict_types=1);

namespace App\PaymentGateway\Paddle;

// use App\Enums\Status;
// use Exception;

class Transaction
{

    private float $amount;
    public static int $count = 0;
    public function __construct(float $amount)
    {
        // var_dump(new CustomerProfile);
        $this->amount = $amount;
    }

    //the parameter has been placed here to serve as an object, with the object we can have access to properties and methods.
    //the parameter here which is an object, would require an instance to be created inside the CopyFrom bracs
    public function CopyFrom(Transaction $transaction)
    {
        var_dump($transaction->amount);
    }

    public function process()
    {
        echo "Processing $" . $this->amount . " transaction";
    }
}
