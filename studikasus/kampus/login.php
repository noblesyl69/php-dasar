<?php 

    session_start();
    include_once "./config/functionRegis.php";

    // cek cookie
    if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
        // ambil data nya
        $id = $_COOKIE["id"];
        $key = $_COOKIE["key"];

        $query = mysqli_query($con, "SELECT username FROM users WHERE id = $id");
        $result = mysqli_fetch_assoc($query);
        // cek username sama dengan key username gak
        if ($key === hash("sha256", $result["username"])) {
            $_SESSION["login"] = true;
        }
    }


    // cek session
    if (isset($_SESSION["login"])) {
        header("location: ./dashboard.php");
        exit;
    }

    // cek tombol submit nya
    if (isset($_POST["login"])) {
        
        // ambil data post
        $username = $_POST["username"];
        $password = $_POST["password"];

        // cek username nya ada gak di database
        $resuld = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
        if (mysqli_num_rows($resuld) === 1) {
            
            $row = mysqli_fetch_assoc($resuld);
            if (password_verify($password, $row["password"])) {

                // cek session
                $_SESSION["login"] = true;

                // cek cooki
                if (isset($_POST["remember"])) {
                    // set cookie
                    setcookie("id", $row["id"], time() + 60);
                    setcookie("key", hash("sha256", $row["username"]), time()+60 );
                }

                header("location: ./dashboard.php");
                exit;
            }
        }

        $error = true;
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
    <h1>Login Sistem</h1>
    <form action="" method="post">

    <?php if (isset($error)) :?>
        <p style="color: red;">username dan password anda salah</p>
    <?php endif; ?>
        <ul>
            <li>
                <label for="username">username</label><br>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">password</label><br>
                <input type="password" name="password" id="password">
            </li>
            <br>
            <li>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label><br>
            </li>
            <br>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>
</body>
</html>
