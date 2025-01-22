<?php

declare(strict_types=1);
require_once __DIR__ . "/../vendor/autoload.php";
use App\Invoice;



$invoice1  = new Invoice();
$invoice2 = $invoice1;

$map = new WeakMap();

$map[$invoice1] = [1 => 'a', 2 => 'b'];

var_dump($invoice1);

// echo "Unsetting Invoice 1" . PHP_EOL;

// unset($invoice1);

// var_dump($invoice2);
