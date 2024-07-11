<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;

class IndexController
{
    public function index(): View
    {
        //index here comes from => VIEWS_PATH => C:\xampp\htdocs\learningoop\resources\views
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
