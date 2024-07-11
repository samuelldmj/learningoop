<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;

class InvoicesController
{
    public function invoices(): View
    {
        return  View::make('/invoices/invoice');
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
