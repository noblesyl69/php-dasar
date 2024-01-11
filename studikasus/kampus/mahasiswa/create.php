
<?php 

    include_once "./function.php";

    if (isset($_POST["submit"])) {
        if (create($_POST) > 0) {
            echo "
                <script>
                    alert('data anda berhasil di tambahkan');
                    document.location.href='./index.php';
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
    <title>Data Mahasiswa</title>
   
</head>
<body>
    <div >
        <h1>FORM CREATE DATA MAHASISWA</h1>
        <form action="" method="post">
            <label for="">
                <span>Npm</span>
                <input type="text" name="npm">
            </label>
            <br>
            <br>
            <label for="">
                <span>nama</span>
                <input type="text" name="nama">
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
                <span>jurusan</span>
                <input type="text" name="jurusan">
            </label>
            <br>
            <br>
            <button type="submit" name="submit">Create Data</button>
        </form>
    </div>
    
</body>
</html>