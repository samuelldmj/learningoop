<?php

declare(strict_types=1);
require_once __DIR__ . "/../vendor/autoload.php";
use App\Invoice;
use App\VarianceExample\AnimalFood;
use App\VarianceExample\CatShelter;
use App\VarianceExample\DogShelter;
use App\VarianceExample\Food;

// $invoice1  = new Invoice();
// $invoice2 = $invoice1;

// $map = new WeakMap();

// $map[$invoice1] = [1 => 'a', 2 => 'b'];

// var_dump($invoice1);

// echo "Unsetting Invoice 1" . PHP_EOL;

// unset($invoice1);

// var_dump($invoice2);


//covariance
//Covariance allows a child's method to return a more specific type than the return type of its parent's method.
$kitty = (new CatShelter)->adopt('Ricky');
// $kitty->speak();

echo PHP_EOL;

$doggy = (new DogShelter)->adopt('Mavrick');
// $doggy->speak();

echo PHP_EOL;

//contravariance
//Contravariance allows a parameter type to be less specific in a child method, than that of its parent.
$banana = new Food();
$doggy->eat($banana);
echo PHP_EOL;

$catfood = new AnimalFood();
$kitty->eat($catfood);
echo PHP_EOL;
