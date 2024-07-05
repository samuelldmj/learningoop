<?php

declare(strict_types=1);

namespace App\Classes;

class Invoices
{
    public function invoices(): string
    {
        return 'Invoices';
    }

    public function create(): string
    {
        return '<form action="/invoices/create" method="post"> <label> Amount: </label> <input>  </form>';
    }

    public function store()
    {
        $amount = $_POST['amount'];
        var_dump($amount);
    }

}
