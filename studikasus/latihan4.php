
<?php 

    
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
    <title>latihan 4 </title>
   
</head>
<body>

    <h1>latihan get dan post</h1>
    
        <ul>
            <?php foreach ($mahasiswa as $value) : ?>
            <li><a href="getOnPost/postLatihan4.php?nama=<?= $value["nama"]; ?>"> <?= $value["nama"]; ?></a></li>
            <?php endforeach; ?>
        </ul>
</body>
</html>