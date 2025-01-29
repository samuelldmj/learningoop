<?php

declare(strict_types=1);

use Dotenv\Dotenv;

require_once  __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Schema\Column;

//..doctrine configuration
$connectionParams = [
    'dbname' => $_ENV["DB_DATABASE"],
    'user' => $_ENV['DB_USER'],
    'password' => '',
    'host' => $_ENV['DB_HOST'],
    'driver' => $_ENV['DB_DRIVER'] ?? 'pdo_mysql',
];
$conn = DriverManager::getConnection($connectionParams);


// $stmt = $conn->prepare('SELECT * FROM invoices');
// $result = $stmt->executeQuery();
// var_dump($result->fetchAllAssociative());

$stmt = $conn->prepare("SELECT * FROM invoices WHERE id = :id");
$stmt->bindValue(':id', 2);  // Explicitly binding the parameter
$result = $stmt->executeQuery();
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
$schema = $conn->createSchemaManager();
// var_dump($schema->listTableNames());
// var_dump($schema->listTableColumns('oop_users'));
// var_dump(array_map(fn(Column $column) => $column->getName(), $schema->listTableColumns('oop_users')));
var_dump(array_keys($schema->listTableColumns('oop_users')));



