<?php

declare(strict_types=1);

namespace App\Controllers;

use App\App;
use App\Atrributes\Post;
use App\Atrributes\Put;
use App\Atrributes\Route;
use App\Container;
use App\Services\InvoiceServices;
use App\View;


class IndexController
{

    public function __construct(private InvoiceServices $invoiceServices)
{

}  
    #[Route('/')]
  public function index(): View
    {

        //making sure my db connection has loaded by the env
        // var_dump($_ENV['DB_HOST']);
        // exit;

        // //connecting to db;
        // $db = App::db();

        //index here comes from => VIEWS_PATH => C:\xampp\htdocs\learningoop\resources\views


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


        // $email = 'kob@mail.com';
        // $name = 'kob tak';
        // $amount = 79;


        // $userModel = new UserModel();
        // $invoiceModel = new InvoiceModel();

        // $invoiceId = (new SignUpModel($userModel, $invoiceModel))->register(
        //         [

        //         'full_name' => $name,
        //         'email' => $email
        //     ],
        //     [
        //         'amount' => $amount
        //     ]

        // );

        // return  View::make(
        //     'index',
        //     ['invoice' => $invoiceModel->find($invoiceId)]
        // );


        // App::$container->get(InvoiceServices::class)->process([], 20);
        $this->invoiceServices->process([], 20);
        // (new Container())->get(InvoiceServices::class)->process([], 20);

        return View::make('index');
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


    //#[Routes('/', post)]
    #[Post('/invoices/create')]
    public function store(){
        return View::make('invoices/create');
    }

    #[Put('/')]
    public function update(){

    }
}
