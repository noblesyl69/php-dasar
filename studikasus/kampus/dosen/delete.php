<?php 

    include_once "../config/functionDosen.php";

    $id = $_GET["id"];

    if (delete($id) > 0) {
        echo "
                <script>
                    alert('data anda berhasil di delete');
                    document.location.href='./index.php';
                </script>
            ";
    }


?>