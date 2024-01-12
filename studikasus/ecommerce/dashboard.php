
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
    <title>dahsborad</title>
</head>
<body>
    <h1>selamat datang di dashboard</h1>
    <br>

   

    <br>
    <a href="logout.php">logout</a>
</body>
</html>