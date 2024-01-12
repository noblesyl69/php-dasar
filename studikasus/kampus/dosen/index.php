<?php 

    include_once "../config/functionDosen.php";


    // pagination
    // hitung jumlah data perhalaman
    $jumlahDataPerhalaman = 2;
    // hitung total jumlah data di data base
    $jumlahData = count(query("SELECT * FROM dosen"));
    // hitung jumlah halaman
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
    // tentukan halaman aktifnya
    $halamaAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
    // tentukan data awal
    $dataAwal = ($jumlahDataPerhalaman * $halamaAktif) - $jumlahDataPerhalaman;


    $dosens = query("SELECT * FROM dosen LIMIT 0, $jumlahDataPerhalaman");

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

            <!-- pagination -->

            <?php if ($halamaAktif > 1) :?>
                <a  href="?halaman=<?= $halamaAktif - 1; ?>">&laquo;</a>
            <?php endif; ?>

            <?php for ($i=1; $i <= $jumlahHalaman ; $i++) :?>
                <?php if ($i == $halamaAktif) :?>
                    <a style="font-weight: bold; color: salmon;" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                    <?php else : ?>    
                        <a  href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($halamaAktif < $jumlahHalaman ) :?>
                <a  href="?halaman=<?= $halamaAktif + 1; ?>">&raquo;</a>
            <?php endif; ?>
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