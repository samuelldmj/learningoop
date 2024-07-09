<?php

declare(strict_types=1);

namespace App\Classes;

class Index
{
    public function index(): string
    {
        return '
        <form action="/upload" method="post" enctype="multipart/form-data">
            <input type="file" name="image" >
            <button type="submit" name="submit">UPLOAD</button>
        </form> 
        ';
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
