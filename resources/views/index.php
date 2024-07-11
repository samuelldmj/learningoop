<h1> <?php echo $this->params['foo']; ?></h1>

<form action="/upload" method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <button type="submit" name="submit">UPLOAD</button>
</form>