<?php 

    $conect = mysqli_connect("localhost", "root", "", "php_ecommerce");

    function register($data) {
        
        global $conect;

        $nama = strtolower(stripslashes($data["nama"]));
        $username = strtolower(stripslashes($data["username"]));
        $email = htmlspecialchars(strtolower($data["email"]));
        $password = mysqli_real_escape_string($conect, $data["password"]);
        $password2 = mysqli_real_escape_string($conect, $data["password2"]);
        $photo = upload();
        if (!$photo) {
            return false;
        }
        // cek nama
        $cekNama = "SELECT nama FROM users WHERE nama = '$nama'";
        $resultNama = mysqli_query($conect, $cekNama);
        if (mysqli_fetch_assoc($resultNama)) {
            echo "
                    <script>
                        alert('nama ini sudah ada');
                    </script>
                ";
            return false;
        }
        // cek password
        if ($password !== $password2) {
            echo "
                    <script>
                        alert('config password tidak sama');
                    </script>
                ";
            return false;
        }
        // encrip password
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users(nama,username,email,password,photo) VALUES
                    ('$nama', '$username','$email','$password','$photo')
                    ";
        mysqli_query($conect, $query);
        return mysqli_affected_rows($conect);

    }

    function upload(){
        $namaFile = $_FILES["photo"]["name"];
        $size = $_FILES["photo"]["size"];
        $error = $_FILES["photo"]["error"];
        $tmpName = $_FILES["photo"]["tmp_name"];

        // cek error
        if ($error === 4) {
            echo "
                    <script>
                        alert('erorr tidak ada file photo yang di kirim');
                    </script>
                ";
            return false;
        }
        // cek type file
        $fileTypeValid = ["jpg","png","jpeg"];
        $fileType = explode(".", $namaFile);
        $fileType = strtolower(end($fileType));
        if (!in_array($fileType, $fileTypeValid)) {
            echo "
                    <script>
                        alert('file anda bukan photo');
                    </script>
                ";
            return false;
        }

        // cek size
        if ($size > 3000000) {
            echo "
                    <script>
                        alert('file terlalu besar');
                    </script>
                ";
            return false;
        }

        $fileBaru = uniqid().".".$fileType;
        move_uploaded_file($tmpName,"photo/".$fileBaru);
        return $fileBaru;
    }

?>