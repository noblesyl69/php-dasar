
<?php 

include_once "../config/functionMhs.php";

$mahasiswa = query("SELECT * FROM mahasiswa");

// cari
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["key"]);
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
    <div style="margin: auto; text-align: center;">
        <h1>STUDIKASUS 1 DATA MAHASISWA</h1> 
        <div class="" style="margin-top: 50px;">
        <div style="margin-bottom: 20px; margin-top: 20px;" class="">
            
            <a style="background-color: salmon; padding: 10px; margin-bottom: 30px; color: white;" href="./create.php">Tambah data mahasiswa</a>
            

            <form action="" method="post" style="margin-top: 50px;">
                <input type="text" name="key" id="" style="width: 400px; padding-top: 8px; padding-bottom: 8px;">
                <button type="submit" name="cari" style="padding-top: 8px; padding-bottom: 8px;">Cari Data</button>
            </form>


            </div>
            <table style="margin: auto;" border="1" cellpadding="10" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NPM</th>
                        <th>NAMA</th>
                        <th>EMAIL</th>
                        <th>JURUSAN</th>
                        <th>GAMBAR</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
    
                <?php $no = 1 ?>
                    <?php foreach ($mahasiswa as $mhs) :?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $mhs["npm"]; ?></td>
                            <td><?= $mhs["nama"]; ?></td>
                            <td><?= $mhs["email"]; ?></td>
                            <td><?= $mhs["jurusan"]; ?></td>
                            <td style="width: 300px;">
                                <img style="width: 60%;" src="./img/<?= $mhs["gambar"]; ?>" alt="">
                            </td>
                            <td>
                                <a href="./edit.php?id=<?= $mhs["id"] ?>">edit</a>
                                <a href="./delete.php?id=<?= $mhs["id"] ?>">delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>