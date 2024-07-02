<?php

namespace App;

use App\Exception\MissingBillingInfoException;

use Exception;
use InvalidArgumentException;

class Invoice
{

    public function __construct(public Customer $customer)
    {
        
    }

    public function process(float $amount)
    {

        if ($amount < 0) {
            throw new InvalidArgumentException('Invalid Invoice amount');
        }

        if (empty($this->customer->getBilingInfo())) {
            //custom exception Created
            throw new MissingBillingInfoException();
        }
        echo 'Processing $' . $amount . ' Invoice-';
        sleep(1);
        echo ' Checked! ✅' . PHP_EOL;
    }

   
}
