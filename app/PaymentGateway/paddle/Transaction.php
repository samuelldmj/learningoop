<?php

declare(strict_types=1);

namespace App\PaymentGateway\Paddle;

use App\Enums\Status;
use Exception;

class Transaction
{



    private string $status;

    public function __construct()
    {
        // var_dump(new CustomerProfile);
        $this->setStatus(Status::PENDING);
    }

    public function setStatus(string $status): self
    {
        if (!isset(Status::ALL_STATUSES[$status])) {
            throw new \InvalidArgumentException('Invalid status');
        }

        $this->status = $status;
        return $this;
        

    }
}
