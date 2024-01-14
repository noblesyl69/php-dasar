<?php 

    session_start();
    include_once "../config/funUsers.php";

    if (!isset($_SESSION["login"])) {
        header("location: ../login.php");
        exit;
    }

    // jumlah data perhalaman
    $jumlahDataPerhalaman = 2;
    // jumlah data dari database
    $jumlahData = count(query("SELECT * FROM users"));
    // hitung jumlah halaman daro jumlah data di bagi jumlah perhalaman
    $jumlahHalaman = ceil($jumlahData/$jumlahDataPerhalaman);
    // halaman aktif
    $halamanAktif = isset($_GET["halaman"]) ? $_GET["halaman"] : 1;
    // hitung jumlah data perhalaman dikali jumlah halaman aktif di kurang data perhalaman
    $awalData = ($jumlahDataPerhalaman*$halamanAktif)-$jumlahDataPerhalaman;


    $users = query("SELECT * FROM users LIMIT $awalData,$jumlahDataPerhalaman");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Users</title>
</head>
<body>
    <div style="margin: auto; text-align: center;">
        <h1>STUDIKASUS 2 DATA USERS</h1> 
        <div class="" style="margin-top: 50px;">
        <div style="margin-bottom: 20px; margin-top: 20px;" class="">
            
            <a style="background-color: salmon; padding: 10px; margin-bottom: 30px; color: white;" href="./create.php">Tambah data Users</a>
            

            <form action="" method="post" style="margin-top: 50px;">
                <input type="text" name="key" id="" style="width: 400px; padding-top: 8px; padding-bottom: 8px;">
                <button type="submit" name="cari" style="padding-top: 8px; padding-bottom: 8px;">Cari Data</button>
            </form>

            <!-- pagination -->
            <?php if ($halamanAktif > 1) : ?>
                <a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
            <?php endif; ?>
            <?php for ($i=1; $i <= $jumlahHalaman ; $i++) :?>
                <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
            <?php endfor; ?>
            <?php if ($halamanAktif < $jumlahHalaman) :?>
                <a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
            <?php endif; ?>
            </div>
            <table style="margin: auto;" border="1" cellpadding="10" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>EMAIL</th>
                        <th>PHOTO</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1 ?>
                    <?php foreach ($users as $user) :?>
                        <tr>
                            <td><?= $nomor++; ?></td>
                            <td><?= $user["nama"]; ?></td>
                            <td><?= $user["username"]; ?></td>
                            <td><?= $user["email"]; ?></td>
                            <td style="width: 250px;">
                                <img style="width: 90%;" src="./photo/<?= $user["photo"]; ?>" alt="">
                            </td>
                            <td>
                                <a href="edit.php?id=<?= $user["id"]; ?>">edit</a>
                                <a href="delete.php?id=<?= $user["id"]; ?>">delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>