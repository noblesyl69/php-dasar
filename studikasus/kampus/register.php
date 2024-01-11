
<?php 


    include_once "./config/functionRegis.php";

    if (isset($_POST["register"])) {
        if (register($_POST) > 0) {
            echo "
                <script>
                    alert('data anda berhasil di tambahkan');
                    document.location.href='./login.php';
                </script>
                ";
        }else {
            echo mysqli_error($con);
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <h1>Register Sistem</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">username</label><br>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">password</label><br>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="password2">Password Config</label><br>
                <input type="password" name="password2" id="password2">
            </li>
            <br>
            <li>
                <button type="submit" name="register">Register</button>
            </li>
        </ul>
    </form>
</body>
</html>
