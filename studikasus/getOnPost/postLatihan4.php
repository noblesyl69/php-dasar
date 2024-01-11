
<?php 

if ( empty($_GET["nama"])) {
    header("location: ../latihan4.php");
    exit;
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
    <h1>selamat datang <?= $_GET["nama"]; ?></h1>

    <a href="../latihan4.php">kembalik</a>
</body>
</html>