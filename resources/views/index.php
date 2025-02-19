<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>

<body>
    Homepage
    <hr>

    <?php //phpinfo(); 
    //echo exit;
    ?>
    

    <form action="/upload" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <button type="submit" name="submit">UPLOAD</button>
    </form>


</body>

</html>