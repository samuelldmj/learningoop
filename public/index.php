<?php

/* 
i moved out of the current directory to the parent directory, this is so because the file is being loaded in the pulic directory,
inside the index file */
require_once "../PaymentGateway/paddle/Transaction.php";
require_once "../PaymentGateway/paddle/CustomerProfile.php";
require_once "../PaymentGateway/stripe/Transaction.php";

use PaymentGateway\Stripe\Transaction as StripeTransaction;
use PaymentGateway\Paddle\Transaction;

$stripetransaction = new Transaction;
$paddletransaction = new StripeTransaction;
var_dump($paddletransaction, $stripetransaction);


