<?php

declare(strict_types=1);

namespace App\Classes;

class Invoices
{
    public function invoices(): string
    {
        return 'Invoices Receipt';
    }

    public function create(): string
    {
        return
            '<form action="/invoices/create" method="post">
                    <label>Amount:</label>
                    <input type="text" name="amount"/>
                    <button type="submit" name="submit">Submit</button>
                </form>';
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
