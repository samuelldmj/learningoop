<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use PDO;
use PDOException;

class IndexController
{
    public function index(): View
    {

        //making sure my db connection has loaded by the env
        // var_dump($_ENV['DB_HOST']);
        // exit;


        //index here comes from => VIEWS_PATH => C:\xampp\htdocs\learningoop\resources\views
        try {
            $db = new PDO('mysql:host=localhost; dbname=comp_db', 'root', '');
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int) $e->getCode());
        }

        // $email = 'danarg@hotemail.com';
        // $fullname = 'Cot Sam';
        // $is_active = 1;
        // $created_at = date('Y-m-d H:m:i', strtotime('7/11/2024 11:47am'));

        // $query = 'SELECT * FROM users';
        // $stmt = $db->query($query);
        // // var_dump($stmt->fetchAll(PDO::FETCH_OBJ));
        // var_dump($stmt->fetchAll());

        // //using placeholder to prevent sql injection and inserting into db
        // $query = 'INSERT INTO users (email, full_name, is_active, created_at) VALUES (?,?,?,?)';
        // $stmt = $db->prepare($query);
        // $stmt->execute([$email, $fullname, $is_active, $created_at]);


        //using name parameters to prevent sql injection and inserting into db
        // $query = 'INSERT INTO users (email, full_name, is_active, created_at) VALUES (:email, :full_name, :is_active, :created_at)';
        // $stmt = $db->prepare($query);
        // $stmt->execute(['email' => $email, 'full_name' => $fullname, 'is_active' => $is_active, 'created_at' =>  $created_at]);

        //retrieving from db;
        // $id = (int) $db->lastInsertId();
        // $queryFromDB = 'SELECT * FROM users WHERE id = ' . $id;
        // $stmtDb = $db->query($queryFromDB);


        $email = 'bol@mail.com';
        $name = 'Samo Taka';
        $amount = 25;

        try {

            $db->beginTransaction();

            $newUserStmt = $db->prepare('INSERT INTO users (email, full_name, is_active, created_at) VALUES (?, ?, 1, NOW()) ');

            $newInvoiceStmt = $db->prepare('INSERT INTO invoices (amount, users_id) VALUES (?, ?)');

            $newUserStmt->execute([$email, $name]);

            $userId = (int) $db->lastInsertId();

            $newInvoiceStmt->execute([$amount, $userId]);

            $db->commit();
        } catch (\Throwable $e) {
            if ($db->inTransaction()) {
                $db->rollBack();
            }
        }

        $fetchStmt = $db->prepare('SELECT invoices.id as invoice_id, amount, users_id, full_name
         FROM invoices INNER JOIN users on users_id = users.id WHERE email = ?');

        $fetchStmt->execute([$email]);

        echo "<pre>";

        // var_dump($stmtDb->fetchAll());
        var_dump($fetchStmt->fetch(PDO::FETCH_ASSOC));

        echo "</pre>";













        return  View::make('index', ['foo' => 'bars']);
    }

    public function upload()
    {
        echo "<pre>";

        // var_dump($_POST);
        // if (isset($_FILES['image'])) {
        //     $img = $_FILES['image'];
        //     var_dump($img);
        // } else {
        //     echo "No image found";
        // }
        $filePath = STORAGE_PATH . '/' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $filePath);

        var_dump(pathinfo($filePath));


        echo "</pre>";
    }
}
