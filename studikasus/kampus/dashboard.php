<?php 

session_start();

if (!isset($_SESSION["login"])) {
    header("location: ./login.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Halaman dashboard</h1>
    <a href="./mahasiswa/index.php">Halaman Mahasiswa</a>
    <a href="logout.php">logout</a>
</body>
</html>