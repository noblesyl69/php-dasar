<?php 


    include_once "../config/functionDosen.php";

    $id = $_GET["id"];
    $dosens = edit("SELECT * FROM dosen WHERE id = $id")[0];


    if (isset($_POST["submit"])) {
        if (update($_POST) > 0) {
            echo "
                <script>
                    alert('data anda berhasil di update');
                    document.location.href='./index.php';
                </script>
            ";
        }else {
            echo "
                <script>
                    alert('data anda gagal di update');
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
    <title>Data Dosen</title>
   
</head>
<body>
    <div >
        <h1>FORM EDIT DATA DOSEN</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="" value="<?= $dosens["id"]; ?>">
            <input type="hidden" name="photoLama" id="" value="<?= $dosens["photo"]; ?>">
            <label for="">
                <span>Nis</span>
                <input type="text" name="nis" value="<?= $dosens["nis"]; ?>" >
            </label>
            <br>
            <br>
            <label for="">
                <span>nama</span>
                <input type="text" name="nama"  value="<?= $dosens["nama"]; ?>">
            </label>
            <br>
            <br>
            <label for="">
                <span>Emails</span>
                <input type="email" name="email"  value="<?= $dosens["email"]; ?>">
            </label>
            <br>
            <br>
            <label for="">
                <span>Matkul</span>
                <input type="text" name="matkul"  value="<?= $dosens["matkul"]; ?>">
            </label>
            <br>
            <br>
            <label for="">
                <span>Photo</span>
                <br>
                <br>
                <img style="width: 200px;" src="./img/<?= $dosens["photo"]; ?>" alt="">
                <br>
                <br>
                <input type="file" name="photo">
            </label>
            <br>
            <br>
            <button type="submit" name="submit">Update Data</button>
        </form>
    </div>
    
</body>
</html>