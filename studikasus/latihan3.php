
<?php 

    $angka = [1,4,3,7,8,5,9,2,33,21];
    $mahasiswa = [
        1 => [
                "nama" =>"syahrul", 
                "jurusan"=>"teknik informatika", 
                "npm"=>"2019020037", 
                "email"=>"syahrul@gmail.com"
            ],
        2 => [
                "nama" =>"ricky", 
                "jurusan"=>"teknik informatika", 
                "npm"=>"2019020034", 
                "email"=>"ricky@gmail.com"
            ],
        3 => [
                "nama" =>"hanapi", 
                "jurusan"=>"teknik informatika", 
                "npm"=>"2019020032", 
                "email"=>"hanapi@gmail.com"
            ],
    ];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>latihan 3 </title>
    <style>
        .kotak{
            width: 50px;
            height: 50px;
            background-color: red;
            color: white;
            float: left;
            margin-right: 3px;
            text-align: center;
            line-height: 50px;
        }
    </style>
</head>
<body>

    <h1>latihan 3 array</h1>
    
    <h3>Data Mahasiswa</h3>
    <?php foreach ($mahasiswa as $key => $mhs): ?>
        <ul style="margin-bottom: 20px;">
            <p> Mahasiswa ke - <?= $key; ?></p>
            <li>
                <?= $mhs["nama"] ?>
            </li>
            <li>
                <?= $mhs["jurusan"] ?>
            </li>
            <li>
                <?= $mhs["npm"] ?>
            </li>
            <li>
                <?= $mhs["email"] ?>
            </li>
        </ul>
    <?php endforeach; ?>


    <?php sort($angka) ?>
    <?php for ($i=0; $i < count($angka); $i++) :?>
    <div class="kotak">
        <?= $angka[$i] ?>
    </div>
    <?php endfor; ?>
</body>
</html>