<?php 


    $con = mysqli_connect("localhost", "root", "", "php_dasar");


    // fungsi memunculkan data
    function query($query){
        global $con;
        $rows = [];
        $resuld =  mysqli_query($con, $query);
        while ($mhsData = mysqli_fetch_assoc($resuld)) {
            $rows[] = $mhsData;
        }
        return $rows;
    }

    // fungsi membuat data
    function create($data){
        global $con;

        $npm = htmlspecialchars($data["npm"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);

        $gambar = upload();
        if (!$gambar) {
            return false;
        }

        $query = "INSERT INTO mahasiswa(npm,nama,email,jurusan,gambar) VALUES 
                    ('$npm','$nama','$email','$jurusan','$gambar')";

        mysqli_query($con, $query);
        return mysqli_affected_rows($con);

    }

    // fungsi edit
    function edit($query){
        global $con;
        $raws = [];
        $risuld = mysqli_query($con, $query);
        while ($mhs = mysqli_fetch_assoc($risuld)) {
            $raws[] = $mhs;
        }
        return $raws;
    }

    // fungsi update
    function update($data) {
        global $con;

        $id = $data["id"];
        $npm = htmlspecialchars($data["npm"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambarLama = htmlspecialchars($data["gambarLama"]);

        // cek gambar
        if ($_FILES["gambar"]["error"] === 4) {
            $gambar = $gambarLama;
        }else {
            $gambar = upload();
        }

        $queryData = "UPDATE mahasiswa SET 
                    npm = '$npm',
                    nama = '$nama',
                    email = '$email',
                    jurusan = '$jurusan',
                    gambar = '$gambar'
                    WHERE id = $id
                ";
        mysqli_query($con, $queryData);
        return mysqli_affected_rows($con);
    }


    // fungsi delete
    function delete($id){
        global $con;
        mysqli_query($con, "DELETE FROM mahasiswa WHERE id = $id");
        return mysqli_affected_rows($con);

    }

    // fungsi cari data 
    function cari($key) {
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$key%'";
        return query($query);
    }

    // fungsi upload
    function upload() {
        
        $nameFile = $_FILES["gambar"]["name"];
        $error = $_FILES["gambar"]["error"];
        $ukuranGambar = $_FILES["gambar"]["size"];
        $tmpName = $_FILES["gambar"]["tmp_name"];

        // cek ada gambar atau tidak ada
        if ($error === 4) {
            
            echo "
                <script>
                    alert('tidak ada file gambar yang di masukkan');
                </script>
            "; 
            return false;
        }

        // cek jenis file
        $validasiJenisFile = ["jpg", "jpeg", "png"];
        $jenisFile = explode(".", $nameFile);
        $jenisFile = strtolower(end($jenisFile));
        if (!in_array($jenisFile, $validasiJenisFile)) {
            echo "
                <script>
                    alert('file anda bukan gambar masukkan gambar saja');
                </script>
            "; 
            return false;
        }

        // cek ukuran file
        if ($ukuranGambar > 3000000) {
            echo "
                <script>
                    alert('file anda terlalu besar | batas file 2mb');
                </script>
            "; 
            return false;
        }

        $jenisFileBaru = uniqid().".".$jenisFile;
        move_uploaded_file($tmpName,"img/".$jenisFileBaru);

        return $jenisFileBaru;


    }

?>