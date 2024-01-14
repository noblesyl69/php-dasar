<?php 

    session_start();
    include_once "./config/funLogin.php";

    // cek cookie 
    if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
        // ambil data
        $id = $_COOKIE["id"];
        $key = $_COOKIE["key"];

        // cek email
        $cekEmail = "SELECT email FROM users WHERE id = $id";
        $queryEmail = mysqli_query($conect, $cekEmail);
        $result = mysqli_fetch_assoc($queryEmail);
        if ($key === hash("sha256", $result["email"])) {
            $_SESSION["login"] = true;
        }
    }


    // cek session
    if (isset($_SESSION["login"])) {
        header("location: ./dashboard.php");
        exit;
    }


    if (isset($_POST["login"])) {
        
        $email = $_POST["email"];
        $password = $_POST["password"];

        // cek email
        $cekemail = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conect, $cekemail);
        if (mysqli_num_rows($result) === 1) {
            // cek password
            $rows = mysqli_fetch_assoc($result);
            if (password_verify($password, $rows["password"])) {

                // cek session
                $_SESSION["login"] = true;
                
                // cek cookie
                if (isset($_POST["remember"])) {
                    setcookie("id", $rows["id"], time() + 60);
                    setcookie("key", hash("sha256", $rows["email"]), time() + 60);
                }

                header("location: ./dashboard.php");
                exit;
            }

        }

    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
   
</head>
<body>
    <h1>halaman Login</h1>
    <form action="" method="post">
        <ul>
            <li style="margin-bottom: 10px;">
                <label for="email">email</label>
                <input type="email" name="email" id="email">
            </li>
            <li style="margin-bottom: 10px;">
                <label for="password">password</label>
                <input type="password" name="password" id="password">
            </li>
            <li style="margin-bottom: 10px;">
                <input type="checkbox" name="remember" id="remember">
                <label for="">remember me</label>
            </li>
            <li style="margin-bottom: 10px;">
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>
</body>
</html>