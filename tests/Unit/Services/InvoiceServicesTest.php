<?php

declare(strict_types=1);

namespace Tests\Unit\Services;

use App\Services\EmailService;
use App\Services\PaymentGatewayService;
use App\Services\InvoiceServices;
use App\Services\SalesTaxService;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

use function PHPUnit\Framework\assertTrue;

class InvoiceServicesTest extends TestCase {

    #[Test]
    // public function it_process_invoice(){

    //     $saleTaxServiceMock = $this->createMock(SalesTaxService::class);
    //     $emailServiceMock = $this->createMock(EmailService::class);
    //     $PaymentpaymentGatewayService  = $this->createMock(PaymentGatewayService::class);


    //     $saleTaxServiceMock->calculate(25, []);
    //     var_dump($saleTaxServiceMock);
    //     exit;

    //     // $invoiceService = new InvoiceServices();

    //     // $customer = ['name' => 'Samuel'];
    //     // $amount = 200;
    //     // $result = $invoiceService->process($customer, $amount);

    //     // assertTrue($result);

    // }


    public function it_process_invoice(){

        $saleTaxServiceMock = $this->createMock(SalesTaxService::class);
        $emailServiceMock = $this->createMock(EmailService::class);
        $paymentGatewayService  = $this->createMock(PaymentGatewayService::class);

        $paymentGatewayService->method('charge')->willReturn(true);

        $invoiceService = new InvoiceServices($saleTaxServiceMock, $paymentGatewayService, $emailServiceMock);

        $customer = ['name' => 'Samuel'];
        $amount = 200;
        $result = $invoiceService->process($customer, $amount);

        $this->assertTrue($result);

    }

    #[Test]
    public function it_sends_email_successfully(){

        $saleTaxServiceMock = $this->createMock(SalesTaxService::class);
        $emailServiceMock = $this->createMock(EmailService::class);
        $paymentGatewayService  = $this->createMock(PaymentGatewayService::class);

        $paymentGatewayService->method('charge')->willReturn(true);
        $emailServiceMock->expects($this->once())->method('send')->with(['name' => 'Samuel'], 'receipt');

        $invoiceService = new InvoiceServices($saleTaxServiceMock, $paymentGatewayService, $emailServiceMock);

        $customer = ['name' => 'Samuel'];
        $amount = 200;
        $result = $invoiceService->process($customer, $amount);

        $this->assertTrue($result);



    }

}