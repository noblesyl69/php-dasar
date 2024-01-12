<?php 


    include_once "../config/functionDosen.php";

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
    <title>Data Dosen</title>
   
</head>
<body>
    <div >
        <h1>FORM CREATE DATA DOSEN</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="">
                <span>Nis</span>
                <input type="text" name="nis">
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
                <span>Matkul</span>
                <input type="text" name="matkul">
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