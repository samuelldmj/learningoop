<?php

/* 
The purpose of this is to enable this file load the included file. so to behave like you are running the script in the required or imported file you have to concantenate the current directory which you want to load with the other directory from which it is called, included or required.
echo __DIR__ = C:\xampp\htdocs\learningoop\public, public is removed because we moved one directory up as a result of "/../" to learningoop
the concatenation results into C:\xampp\htdocs\learningoop\app\PaymentGateway\paddle
*/
// below directory same as C:\xampp\htdocs\learningoop\app\PaymentGateway\paddle
// require_once __DIR__ . "/../app/PaymentGateway/paddle/Transaction.php";
// require_once __DIR__ .  "/../app/Notification/Email.php";
// require_once __DIR__ .  "/../app/PaymentGateway/paddle/CustomerProfile.php";
// require_once __DIR__ . "/../app/PaymentGateway/stripe/Transaction.php";

// spl_autoload_register(function ($class) {
//     //using the namespace as our path
//     $file = __DIR__ . "/../" . lcfirst(str_replace('\\', '/', $class)) . '.php';
//     require $file;
// });

require_once __DIR__ . "/../vendor/autoload.php";
// echo "<br>";
// echo __DIR__ . "/../vendor/autoload.php";

// use App\PaymentGateway\Stripe\Transaction as StripeTransaction;

// use App\Enums\Status;
use App\PaymentGateway\Paddle\Transaction;

// $stripetransaction = new StripeTransaction;
$paddletransaction = new Transaction(15, 'Coffee');
// var_dump($paddletransaction);

// $id = new \Ramsey\Uuid\UuidFactory();
// echo $id->uuid4();

// var_dump($paddletransaction->setStatus(Status::PAID));

//static
echo $paddletransaction::$count;







