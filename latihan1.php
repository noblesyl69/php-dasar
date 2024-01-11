<?php 

// latihan perulangan
// for
// while
// do while
// foreach


$mhss = ["syahrul ", " ricky ", "hanapi"];

var_dump(implode($mhss));


$angka = readline();

for ($i=0; $i < $angka; $i++) { 
    if ($angka == "done") {
        break;
    }else {
        echo "halo ke {$i}". PHP_EOL;
    }
}

$nama = [];
while (true) {
    $isi = readline("ketik done jika ingin berhenti : ");
    if ($isi == "done") {
        break;
    }else {
        $nama[] = $isi;
    }

    
}
echo "hallo ". implode("," ,$nama). PHP_EOL;


foreach ($mhss as $key => $mhs) {
    echo "mahasiswa ke {$key} = {$mhs}". PHP_EOL;
}



?>