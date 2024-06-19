<?php

/* 
i moved out of the current directory to the parent directory, this is so because the file is being loaded in the pulic directory,
inside the index file */
require_once "../Transaction.php";
require_once "../Constructor.php";
require_once "../PaymentProfile.php";
require_once "../Customer.php";

// $transaction = (new Transaction(100, 'coffee'))->
//     // $transaction->amount = 25;
//     addTax(8)->applyDiscount(10)->getAmount() . "<br>";
// var_dump($transaction);

// $transaction1 = (new Transaction(20, 'tea'))->addTax(1)->getAmount();
// var_dump($transaction1);


$transaction = new Trans(5, 'cake');

echo $transaction->customer?->paymentprofile?->id;
