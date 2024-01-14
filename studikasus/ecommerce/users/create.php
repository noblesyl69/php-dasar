<?php 


    include_once "../config/funUsers.php";

    if (isset($_POST["submit"])) {
        if (create($_POST) > 0) {
            echo "
                <script>
                    alert('data anda berhasil di tambahkan');
                    document.location.href='./index.php';
                </script>
            ";
        }else {
            echo mysqli_error($koneksi);
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data USERS</title>
   
</head>
<body>
    <div >
        <h1>FORM CREATE DATA USERS</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="">
                <span>nama</span>
                <input type="text" name="nama">
            </label>
            <br>
            <br>
            <label for="">
                <span>Username</span>
                <input type="text" name="username">
            </label>
            <br>
            <br>
            <label for="">
                <span>email</span>
                <input type="email" name="email">
            </label>
            <br>
            <br>
            <label for="">
                <span>password</span>
                <input type="password" name="password">
            </label>
            <br>
            <br>
            <label for="">
                <span>Config password</span>
                <input type="password" name="password2">
            </label>
            <br>
            <br>
            <label for="">
                <span>photo</span>
                <input type="file" name="photo">
            </label>
            <br>
            <br>
            <button type="submit" name="submit">Create Data</button>
        </form>
    </div>
    
</body>
</html>