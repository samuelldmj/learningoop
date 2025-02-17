<?php

declare(strict_types=1);

use App\Services\Shipping\BillableWeightCalculatorService;
use App\Services\Shipping\DimDivisor;
use App\Services\Shipping\PackageDimension;
use App\Services\Shipping\Weight;

require_once __DIR__ . "/../../../vendor/autoload.php";

$package = [
    'weight' => 6,
    'dimensions' => [
        'width' => 9,
        'length' => 15,
        'height' => 7
    ]
];

$fedexDimDivisor = 139;

$packageDimension = new PackageDimension(
    $package['dimensions']['width'],
    $package['dimensions']['height'],
    $package['dimensions']['length'],
);

$widerPackageDimension = $packageDimension->increaseWidth(10);
$weight = new Weight($package['weight']);

$fedexDimDivisor = DimDivisor::FEDEX;

$billableWeight = (new BillableWeightCalculatorService())->calculate(
    $packageDimension,
    $weight,
    $fedexDimDivisor
);

$widerBillableWeight = (new BillableWeightCalculatorService())->calculate(
    $widerPackageDimension,
    $weight,
    $fedexDimDivisor
);

echo $billableWeight . ' lb' . PHP_EOL;
echo $widerBillableWeight . ' lb' . PHP_EOL;

