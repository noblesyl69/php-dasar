<?php 

    $conect = mysqli_connect("localhost", "root", "", "php_ecommerce");

    function query($query){
        global $conect;
        $result = mysqli_query($conect, $query);
        $rows =[];
        while ($data = mysqli_fetch_assoc($result)) {
            $rows[]=$data;
        }
        return $rows;
    }

    function create($data){
        global $conect;

        $nama = htmlspecialchars($data["nama"]);
        $username = htmlspecialchars($data["username"]);
        $email = htmlspecialchars($data["email"]);
        $password = htmlspecialchars($data["password"]);
        $password2 = htmlspecialchars($data["password2"]);

        // cek photo
        $photo = upload();
        if (!$photo) {
            return false;
        }

        // cek email
        $cekEmail = "SELECT email FROM users WHERE email = '$email'";
        $queryEmail = mysqli_query($conect, $cekEmail);
        if (mysqli_fetch_assoc($queryEmail)) {
                echo "
                    <script>
                        alert('email ini sudah ada');
                    </script>
                ";
                return false;
        }
        // cek password
        if ($password !== $password2) {
            echo "
                <script>
                    alert('config password anda salah');
                </script>
            ";
            return false;
        }

        // encrip password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // query data
        $query = "INSERT INTO users(nama,username,email,password,photo) VALUES
                    ('$nama', '$username', '$email', '$password', '$photo')
                ";
        mysqli_query($conect, $query);
        return mysqli_affected_rows($conect);
    }

    function upload(){
        
        $fileName = $_FILES["photo"]["name"];
        $size =$_FILES["photo"]["size"];
        $error =$_FILES["photo"]["error"];
        $tmpName =$_FILES["photo"]["tmp_name"];

        // cek error
        if ($error === 4) {
            echo "
                <script>
                    alert('tidak ada photo yang di masukkan');
                </script>
            ";
            return false;
        }
        // cek jenis file
        $fileTypeValid = ["jpg", "png", "jpeg"];
        $fileType = explode(".", $fileName);
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
                    alert('file anda terlalu besar');
                </script>
            ";
            return false;
        }

        $fileTypeBaru = uniqid().".".$fileType;
        move_uploaded_file($tmpName, "photo/".$fileTypeBaru);
        return $fileTypeBaru;

    }

?>