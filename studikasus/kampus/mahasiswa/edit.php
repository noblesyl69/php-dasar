
<?php 

    include_once "../config/functionMhs.php";

    $id = $_GET["id"];
    $mhs = edit("SELECT * FROM mahasiswa WHERE id = $id")[0];

    if (isset($_POST["submit"])) {
        if (update($_POST) > 0) {
            echo "
                <script>
                    alert('data anda berhasil di update');
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
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $mhs["id"]; ?>" >
            <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>" >
            <label for="">
                <span>Npm</span>
                <input type="text" name="npm" value="<?= $mhs["npm"]; ?>">
            </label>
            <br>
            <br>
            <label for="">
                <span>nama</span>
                <input type="text" name="nama" value="<?= $mhs["nama"]; ?>">
            </label>
            <br>
            <br>
            <label for="">
                <span>email</span>
                <input type="email" name="email" value="<?= $mhs["email"]; ?>">
            </label>
            <br>
            <br>
            <label for="">
                <span>jurusan</span>
                <input type="text" name="jurusan" value="<?= $mhs["jurusan"]; ?>">
            </label>
            <br>
            <br>
            <label for="">
                <span>Gambar</span>
                <br>
                <img style="width: 250px;" src="../mahasiswa/img/<?= $mhs["gambar"]; ?>" alt="">
                <br>
                <input type="file" name="gambar">
            </label>
            <br>
            <br>
            <button type="submit" name="submit">Update Data</button>
        </form>
    </div>
    
</body>
</html>