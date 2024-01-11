<?php 

    session_start();

    if (isset($_SESSION["login"])) {
        header("location: ./dashboard.php");
        exit;
    }


    include_once "./config/functionRegis.php";



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
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>
</body>
</html>
