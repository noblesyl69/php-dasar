
<?php 

    function data(string $nama, string $jurusan, int $usia){
        return "selamat datang $nama, jurusan anda $jurusan, usia anda $usia";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>latihan 2 </title>
</head>
<body>
    <h1>latihan 2 function</h1>

     <h1>
        <?= data("syahrul", "teknik informatika", 25) ?>
     </h1>
</body>
</html>