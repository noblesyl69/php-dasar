<?php 

    if (isset($_POST["submit"])) {
        if ($_POST["nama"] == "syahrul" && $_POST["password"] == "123") {
            header("location: admin.php");
            exit;
        }else {
            $error = true;
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>latihan 4 get post</title>
</head>
<body>
    <h1>Login dulu gak sih</h1>

    <?php if (isset($error)):?>
        <p style="color: red;">name dan password salah</p>
    <?php endif; ?>

    <form action="" method="post">
        <label for="">
            <span>nama</span>
            <br>
            <input type="text" name="nama">
        </label>
        <br>
        <label for="">
            <span>password</span>
            <br>
            <input type="password" name="password">
        </label>
        <br>
        <br>
        <button type="submit" name="submit">Login</button>
    </form>
</body>
</html>