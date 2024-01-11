<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>latihan get dan post</title>
</head>
<body>

    <h1>latihan get dan post</h1>

    <?php if (isset($_POST["submit"])) :?>
    <h4>
        malam, selamat datang <?= $_POST["nama"] ?>
    </h4>
    <?php endif; ?>

    <form action="" method="post">
        <label for="">masukkan nama: </label>
        <input type="text" name="nama">
        <button type="submit" name="submit">kirim</button>
    </form>

</body>
</html>