<?php 


    $con = mysqli_connect("localhost", "root", "", "php_dasar");

    function register($data) {
        
        global $con;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($con, $data["password"]);
        $password2 = mysqli_real_escape_string($con, $data["password2"]);

        // cek username apakah ada atau tidak ada
        $result = mysqli_query($con, "SELECT username FROM users WHERE username = '$username'");
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
                    alert('Config password tidak sama');
                </script>
            "; 
        }

        // encrip password

        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users(username,password) VALUES ('$username', '$password')";
        mysqli_query($con, $query);

        return mysqli_affected_rows($con);




    }


?>