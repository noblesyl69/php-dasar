<?php 


    $koneksi = mysqli_connect("localhost", "root", "", "php_dasar");

    function query($query){
        global $koneksi;
        $dosens = mysqli_query($koneksi, $query);
        $rows = [];
        while ($dosen = mysqli_fetch_assoc($dosens)) {
            $rows[] = $dosen;
        }

        return $rows;
    }

    function create($data){
        global $koneksi;

        $nis = htmlspecialchars($data["nis"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $matkul = htmlspecialchars($data["matkul"]);
        $photo = upload();
        if (!$photo) {
            return false;
        }

        $query = "INSERT INTO dosen(nis,nama,email,matkul,photo) VALUES
                    ('$nis','$nama','$email','$matkul','$photo')
                ";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

    function edit($query) {
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while ($dosen = mysqli_fetch_assoc($result)) {
            $rows[] = $dosen;
        }
        return $rows;
    }

    function update($data) {
        global $koneksi;

        $id = $data["id"];
        $nis = htmlspecialchars($data["nis"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $matkul = htmlspecialchars($data["matkul"]);
        $photoLama = $data["photoLama"];

        if ($_FILES["photo"]["error"] === 4) {
            $photo = $photoLama;
        }else {
            $photo = upload();
        }

        $query = "UPDATE dosen SET 
                    nis = '$nis',
                    nama = '$nama',
                    email = '$email',
                    matkul = '$matkul',
                    photo = '$photo'
                    WHERE id = $id
                    ";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);


    }

    function delete($id){
        global $koneksi;
        $query = "DELETE FROM dosen WHERE id = $id";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

    function cari($key){
        $query = "SELECT * FROM dosen WHERE nama LIKE '%$key%'";
        return query($query);
    }

    function upload(){
        $nameFile = $_FILES["photo"]["name"];
        $tmpName = $_FILES["photo"]["tmp_name"];
        $error = $_FILES["photo"]["error"];
        $size = $_FILES["photo"]["size"];

        // cek ada data atau tidak
        if ($error === 4) {
            echo "
                <script>
                    alert('tidak ada data photo di tambahkan');
                </script>
            ";
            return false;
        }

        // cek jenis file
        $jenisFIleValid = ["jpg", "jpeg", "png"];
        $jenisFile = explode(".",$nameFile);
        $jenisFile = strtolower(end($jenisFile));
        if (!in_array($jenisFile, $jenisFIleValid)) {
            echo "
                <script>
                    alert('data yang anda masukkan bukan gambar');
                </script>
            ";
            return false;
        }

        // cek size 
        if ($size > 2000000) {
            echo "
                <script>
                    alert('data gambar anda terlalu besar max: 2mb');
                </script>
            ";
            return false;
        }

        $jenisFIleBaru = uniqid().".".$jenisFile;
        move_uploaded_file($tmpName, "img/".$jenisFIleBaru);
        return $jenisFIleBaru;
    }


?>