<?php 

    session_start();
    include_once "./config/funLogin.php";

    // cek cookie
    if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
        // set data cookie
        $id = $_COOKIE["id"];
        $key = $_COOKIE["key"];

        // cek username
        $cekUsername = "SELECT username FROM users WHERE id = $id";
        $query = mysqli_query($conect, $cekUsername);
        $result = mysqli_fetch_assoc($query);
        if ($key === hash("sha256", $result["username"])) {
            $_SESSION["login"] = true;
        }
    }


    // cek sissoon
    if (isset($_SESSION["login"])) {
        header("location: ./dashboard.php");
        exit;
    }



    if (isset($_POST["login"])) {
        

        $username = $_POST["username"];
        $password = $_POST["password"];

        // cek username
        $queryUsername = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conect, $queryUsername);
        if (mysqli_num_rows($result) === 1) {
            
            // cek password 
            $rows =mysqli_fetch_assoc($result);
            if (password_verify($password, $rows["password"])) {
                
                // cek session
                $_SESSION["login"] = true;

                // cek cookie
                if (isset($_POST["remember"])) {
                    // set cookie
                    setcookie("id", $rows["id"], time()+60);
                    setcookie("key", hash("sha256", $rows["username"]), time()+60);
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
                <label for="">username</label>
                <input type="text" name="username" id="">
            </li>
            <li style="margin-bottom: 10px;">
                <label for="">password</label>
                <input type="password" name="password" id="">
            </li>
            <li style="margin-bottom: 10px;">
                <input type="checkbox" name="remember" id="">
                <label for="">remember me</label>
            </li>
            <li style="margin-bottom: 10px;">
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>
</body>
</html>