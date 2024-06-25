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
// use App\PaymentGateway\Paddle\Transaction;

// $stripetransaction = new StripeTransaction;
// $paddletransaction = new Transaction(15);
// $paddletransaction->CopyFrom(new Transaction(100));


// echo $paddletransaction->process();
//accessing a private property
// echo $paddletransaction->amount;

//using reflection API to bypass the private modified property
// $reflectionProperty = new ReflectionProperty(Transaction::class, 'amount');
// $reflectionProperty->setAccessible(true);
// var_dump($reflectionProperty->getValue($paddletransaction));

// $id = new \Ramsey\Uuid\UuidFactory();
// echo $id->uuid4();

// var_dump($paddletransaction->setStatus(Status::PAID));

//static
// echo $paddletransaction::$count;

// use App\Toaster;
// use App\ToasterPro;

// $toaster = new ToasterPro();
// $toaster->addslice('bread');
// $toaster->addslice('bread');
// $toaster->addslice('bread');
// $toaster->toast();


use App\Text;
use App\Radio;
use App\Checkbox;

//Abstract class
$fields = [
    new Text('Text'),
    new Checkbox('checkbox'),
    new Radio('Radio')
];

foreach ($fields as $field) {
    echo $field->render() . "<br>";
}




