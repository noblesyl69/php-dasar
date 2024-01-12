<?php 

    include_once "./config/funLogin.php";

    if (isset($_POST["register"])) {
        if (register($_POST) > 0) {
            echo "
                <script>
                    alert('register berhasil');
                    document.location.href='./login.php';
                </script>
            ";
        }else {
            echo "
                <script>
                    alert('register gagal');
                </script>
            ";
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>regirter</title>
   
</head>
<body>
    <h1>halaman register</h1>
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
                <label for="">Config password</label>
                <input type="password" name="password2" id="">
            </li>
            <li style="margin-bottom: 10px;">
                <button type="submit" name="register">Register</button>
            </li>
        </ul>
    </form>
</body>
</html>