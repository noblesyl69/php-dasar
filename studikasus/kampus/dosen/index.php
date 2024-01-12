<?php 

    include_once "../config/functionDosen.php";

    $dosens = query("SELECT * FROM dosen");

    if (isset($_POST["cari"])) {
        $dosens = cari($_POST["key"]);
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
    <div style="margin: auto; text-align: center;">
        <h1>STUDIKASUS 1 DATA DOSEN</h1> 
        <div class="" style="margin-top: 50px;">
        <div style="margin-bottom: 20px; margin-top: 20px;" class="">
            
            <a style="background-color: salmon; padding: 10px; margin-bottom: 30px; color: white;" href="./create.php">Tambah data Dosen</a>
            

            <form action="" method="post" style="margin-top: 50px;">
                <input type="text" name="key" id="" style="width: 400px; padding-top: 8px; padding-bottom: 8px;">
                <button type="submit" name="cari" style="padding-top: 8px; padding-bottom: 8px;">Cari Data</button>
            </form>


            </div>
            <table style="margin: auto;" border="1" cellpadding="10" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>NAMA</th>
                        <th>EMAIL</th>
                        <th>MATKUL</th>
                        <th>PHOTO</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1 ?>
                    <?php foreach ($dosens as $dosen) :?>
                        <tr>
                            <td><?= $nomor++; ?></td>
                            <td><?= $dosen["nis"]; ?></td>
                            <td><?= $dosen["nama"]; ?></td>
                            <td><?= $dosen["email"]; ?></td>
                            <td><?= $dosen["matkul"]; ?></td>
                            <td style="width: 250px;">
                                <img style="width: 90%;" src="../dosen/img/<?= $dosen["photo"]; ?>" alt="">
                            </td>
                            <td>
                                <a href="edit.php?id=<?= $dosen["id"]; ?>">edit</a>
                                <a href="delete.php?id=<?= $dosen["id"]; ?>">delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>