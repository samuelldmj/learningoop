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

    <form action="/upload" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <button type="submit" name="submit">UPLOAD</button>
    </form>


    <?php if (!empty($invoice)) : ?>
        Invoice ID: <?php echo $invoice['id']; ?> <br>
        Invoice Amount: <?php echo  $invoice['amount']; ?> <br>
        User: <?php echo $invoice['full_name'] ?> <br>

    <?php endif; ?>
</body>

</html>