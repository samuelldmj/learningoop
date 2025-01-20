<?php
namespace  App\Services;

use App\Services\Interface\PaymentGatewayServiceInterface;

declare(strict_type = 1);

class PaddlePayment implements  PaymentGatewayServiceInterface {

    public function charge(array $customer, float $amount, float $tax): bool{
        
        echo "charging from paddle payment";
        return true;
    }
}