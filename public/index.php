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




//Abstract class
// use App\Text;
// use App\Radio;
// use App\Checkbox;


// $fields = [
//     new Text('Text'),
//     new Checkbox('checkbox'),
//     new Radio('Radio')
// ];

// foreach ($fields as $field) {
//     echo $field->render() . "<br>";
// }


//INTERFACE
// use App\CollectionAgency;
// use App\DebtCollectionService;
// use App\Rocky;

// $collector = new CollectionAgency;
// echo $collector->collect(100);

// $service = new DebtCollectionService;
// $service->collectDebt(new CollectionAgency);
// echo  PHP_EOL;
// $service->collectDebt(new Rocky);


//Magic methods


// use App\Invoice;
//NB: amount here is equivalent to $name in the set, get, isset and unset
// $invoice = new Invoice();
// $invoice->amount = 15;
// echo $invoice->amount;

// $invoice->amount = 15;

// var_dump(isset($invoice->amount));
// unset($invoice->amount);
// var_dump(isset($invoice->amount));


//late static binding
// use App\ClassA;
// use App\ClassB;

// $a = new ClassA;
// $b = new ClassB;

// echo $a->getName() . PHP_EOL;
// echo $b->getName();

// echo ClassA::getName() . PHP_EOL;
// echo ClassB::getName();


//Traits

// use App\AllInOneMaker;
// use App\CappuccinoMaker;
// use App\CoffeeMaker;
// use App\LatteMaker;

// $coffeeMaker = new CoffeeMaker;
// $coffeeMaker->makeCoffee();

// $latteMaker = new LatteMaker();
// $latteMaker->makeCoffee();
// $latteMaker->makeLatte();

// $cappucino = new CappuccinoMaker();
// $cappucino->makeCoffee();
// $cappucino->makeCappucino();

// $allcoffee = new AllInOneMaker();
// $allcoffee->makeCoffee();
// $allcoffee->makeLatte();
// $allcoffee->makeCappucino();

//ANONYMOUS CLASS.
// $obj = new class
// {
// };
// var_dump($obj);

//Variable Storage & Object Comparison - Zend Value (zval) 
// use App\Invoice;

// $invoice1 = new Invoice();
// $invoice2 = new Invoice();

// $invoice1 = clone $invoice2;

// echo $invoice1 == $invoice2 . PHP_EOL;
// var_dump($invoice1 == $invoice2);

// echo $invoice1 === $invoice2 . PHP_EOL;
// var_dump($invoice1 === $invoice2);

// var_dump($invoice1, $invoice2, Invoice::create());

//SERIALIZATION
// use App\Invoice;

// $invoice1 = new Invoice(25, 'coffe', "12345687");
// echo serialize(false) . PHP_EOL;
// echo serialize(1) . PHP_EOL;
// echo serialize(2.5) . PHP_EOL;
// echo serialize('Hello world') . PHP_EOL;
// echo serialize([1, 2, 3]) . PHP_EOL;
// echo serialize(['a' => 1, 'b' => 5]) . PHP_EOL;

// $str = serialize($invoice1);

// // echo $str;
// $invoice2 = unserialize($str);
// print_r($invoice2);

// echo $invoice1;


//ERROR EXCEPTION

// use App\Customer;
// use App\Invoice;



// $invoice = new Invoice(new Customer());

// try {
//     $invoice->process(-25);
// } catch (App\Exception\MissingBillingInfoException $e) {
//     echo $e->getMessage() . ' ' . $e->getLine() . ': ' . $e->getFile();
// }


//iterating over object
// use App\Invoice;
// use App\InvoiceCollection;

// foreach (new Invoice(25) as $key => $value) {
//     echo $key . ' = ' .  $value . PHP_EOL;
// }

// $invoiceCollection = new InvoiceCollection([new Invoice(25), new Invoice(18), new Invoice(28)]);
// foreach ($invoiceCollection as $invoice) {
//     // var_dump($invoice);

//     echo $invoice->id . '-' . $invoice->amount . PHP_EOL;
// }


//SuperGlobals
// use App\Router;
//ROUTER
// $router = new Router();
// $router->register('/', [App\Controllers\Index::class, 'index'])
//     ->register('/invoices', [App\Controllers\Invoices::class, 'invoices'])
//     ->register('/invoices/create', [App\Controllers\Invoices::class, 'create']);

// try {
//     //this make the uri to work, if valid.
//     echo $router->resolve($_SERVER['REQUEST_URI']);
// } catch (\App\Exceptions\RouteNotFoundException $e) {
//     echo $e->getMessage();
// }

// $router->register('/invoices', function () {
//     echo 'Invoices';
// });

// echo $router->resolve($_SERVER['REQUEST_URI']);


// $router->register('/invoices', function () {
//     echo 'Invoices';
// });


require_once __DIR__ . "/../vendor/autoload.php";
use App\Router;

//C:\xampp\htdocs\learningoop\resources
define('STORAGE_PATH', __DIR__ . "/../resources");

//C:\xampp\htdocs\learningoop\resources\views
define('VIEWS_PATH', __DIR__ . "/../resources/views");

// echo __DIR__;

$router = new Router();
$router->get('/', [App\Controllers\IndexController::class, 'index'])
    ->post('/upload', [\App\Controllers\IndexController::class, 'upload'])
    ->get('/invoices', [App\Controllers\InvoicesController::class, 'invoices'])
    ->get('/invoices/create', [App\Controllers\InvoicesController::class, 'create'])
    ->post('/invoices/create', [App\Controllers\InvoicesController::class, 'store']);

try {
    echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
} catch (\App\Exceptions\RouteNotFoundException $e) {
    echo $e->getMessage();
}
