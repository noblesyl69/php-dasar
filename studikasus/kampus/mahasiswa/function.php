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

        $query = "INSERT INTO mahasiswa(npm,nama,email,jurusan) VALUES 
                    ('$npm','$nama','$email','$jurusan')";

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

        $queryData = "UPDATE mahasiswa SET 
                    npm = '$npm',
                    nama = '$nama',
                    email = '$email',
                    jurusan = '$jurusan'
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

?>