<?php 

    include_once "studikasus/latihan5.php";
    $mahasiswa = query("SELECT *FROM mahasiswa");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>latihan 5 </title>
</head>
<body>
    <div style="margin: auto; text-align: center;">
        <h1>DATA MAHASISWA</h1> 
        
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
                        <td><?= $mhs["gambar"]; ?></td>
                        <td>
                            <a href="">edit</a>
                            <a href="">delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>