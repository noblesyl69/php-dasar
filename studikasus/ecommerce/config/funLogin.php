<?php 


    $conect = mysqli_connect("localhost", "root", "", "php_dasar");

    function register($data){
        global $conect;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conect, $data["password"]);
        $password2 = mysqli_real_escape_string($conect, $data["password2"]);

        // cek username
        $cekUsername = "SELECT username FROM users WHERE username = '$username'";
        $result = mysqli_query($conect, $cekUsername);
        if (mysqli_fetch_assoc($result)) {
            echo "
                <script>
                    alert('username sudah ada');
                </script>
            ";
            return false;
        }

        // cek password
        if ($password !== $password2) {
            echo "
                <script>
                    alert('config password anda tidak sama');
                </script>
            ";

            return false;
        }

        // encrip password
        $password = password_verify($password, PASSWORD_DEFAULT);

        $queryData = "INSERT INTO users(username,password) VALUES
                        ('$username','$password')
                        ";
        mysqli_query($conect, $queryData);
        return mysqli_affected_rows($conect);

    }


?>