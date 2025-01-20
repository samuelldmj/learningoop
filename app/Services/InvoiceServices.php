<?php

declare(strict_types=1);
namespace App\Services;

use App\Services\Interface\PaymentGatewayServiceInterface;

class InvoiceServices {

    public function __construct(
        protected SalesTaxService $saleTaxService,
        protected PaymentGatewayServiceInterface $paymentGatewayService,
        protected EmailService  $emailService
    )
    {  
    }

    public function process(array $customer, float $amount)
    {
    

        $tax = $this->saleTaxService->calculate($amount, $customer);

        if(!$this->paymentGatewayService->charge($customer, $amount, $tax)){
            return false;
        }


        $this->emailService->send($customer, 'receipt');

        echo "Invoice has been processed <br/>";
        return true;

    }





}