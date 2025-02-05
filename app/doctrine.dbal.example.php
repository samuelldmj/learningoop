<?php

declare(strict_types=1);

use App\Entity\Invoice;
use App\Entity\InvoiceItem;
use App\Enums\InvoiceStatus;
use Dotenv\Dotenv;



require_once  __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();



//..doctrine configuration
// $connectionParams = [
//     'dbname' => $_ENV["DB_DATABASE"],
//     'user' => $_ENV['DB_USER'],
//     'password' => '',
//     'host' => $_ENV['DB_HOST'],
//     'driver' => $_ENV['DB_DRIVER'] ?? 'pdo_mysql',
// ];
// $conn = DriverManager::getConnection($connectionParams);


// $stmt = $conn->prepare('SELECT * FROM invoices');
// $result = $stmt->executeQuery();
// var_dump($result->fetchAllAssociative());

// $stmt = $conn->prepare("SELECT * FROM invoices WHERE id = :id");
// $stmt->bindValue(':id', 2);  // Explicitly binding the parameter
// $result = $stmt->executeQuery();
// var_dump($result->fetchAllAssociative());
// var_dump($result->fetchAssociative());

//QUERY BUILDER
// $builder = $conn->createQueryBuilder();
// $invoices = $builder->select('id', 'amount')
// ->from('invoices')
// ->where('amount >= ?')
// ->setParameter(0, 100)
// ->getSQL();
// // ->fetchAllAssociative();
// var_dump($invoices);

//CREATING SCHEMA
// $schema = $conn->createSchemaManager();
// var_dump($schema->listTableNames());
// var_dump($schema->listTableColumns('oop_users'));
// var_dump(array_map(fn(Column $column) => $column->getName(), $schema->listTableColumns('oop_users')));
// var_dump(array_keys($schema->listTableColumns('oop_users')));


//Association and relationship (using Entity)

$items = [['item 1', 1, 15], ['item 2', 3, 7.5], ['item 3', 4, 34.35]];

$invoice = (new Invoice())
->setAmount(45)
->setInvoiceNumber('1')
->setInvoiceStatus(InvoiceStatus::PAID)
->setCreatedAt(new DateTime());


foreach( $items as [$description, $qty, $unit_price]){
    $item = (new InvoiceItem)
    ->setInvoiceDescription($description)
    ->setUnitPrice($unit_price)
    ->setQuantity($qty);

    $invoice->addItem($item);
}

use Doctrine\ORM\Tools\Setup;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;

// Database connection parameters
$params = [
    'dbname' => $_ENV["DB_DATABASE"],
    'user' => $_ENV['DB_USER'],
    'password' => '',
    'host' => $_ENV['DB_HOST'],
    'driver' => $_ENV['DB_DRIVER'] ?? 'pdo_mysql',
];


//create method and some class are deprecated
// Set paths to your entities
// $paths = [dirname(__DIR__) . '/Entity']; // Fix path concatenation
// $isDevMode = true; // Set to false in production environment

// // Create Doctrine configuration
// $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

// // Create the DBAL Connection
// $connection = DriverManager::getConnection($params);

// // Create EntityManager using the connection and config
// $entityManager = EntityManager::create($connection, $config);


// var_dump($invoice);
