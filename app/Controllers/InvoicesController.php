<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Atrributes\Route;
use App\Enums\InvoiceStatus;
use App\Models\Invoice;
use App\View;
use Twig\Environment as Twig;

class InvoicesController
{

    public function __construct(private Twig $twig)
    {

    }
    // #[Route('/invoices')]
    // public function invoices(): View
    // {
    //     $invoices = Invoice::query()->where('invoice_status', InvoiceStatus::PAID)->get()->toArray();
    //     // var_dump($invoices); // Debugging statement
    //     return View::make('/invoices/invoice', ["invoices" => $invoices]);
    // }

    #[Route('/invoices')]
    public function invoices(): string
    {
        $invoices = Invoice::query()->where('invoice_status', InvoiceStatus::PAID)->get()->toArray();
        return $this->twig->render('/invoices/invoice.twig', ["invoices" => $invoices]);
    }

    public function create(): View
    {
        return View::make('/invoices/create');
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
