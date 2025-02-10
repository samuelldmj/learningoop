<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Atrributes\Route;
use App\Enums\InvoiceStatus;
use App\Models\Invoice;
use App\View;

class InvoicesController
{
    #[Route('/invoices')]
    public function invoices(): View
    {
        $invoices =  Invoice::query()->where('invoice_status',InvoiceStatus::FAILED)->get()->toArray();
        return  View::make('/invoices/invoice', ["invoices" => $invoices]);
    }

    public function create(): View
    {
        return  View::make('/invoices/create');
    }

    public function store()
    {

        if (isset($_POST['submit'])) {
            var_dump($_POST);
            if (isset($_POST['amount'])) {
                $amount = $_POST['amount'];
                var_dump($amount);
            } else {
                echo "Amount is not set.";
            }
        }
        // $amount = $_POST['amount'];
        // // print_r($amount);

        // var_dump($amount);


    }
}
