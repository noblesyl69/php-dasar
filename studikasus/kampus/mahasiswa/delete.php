<?php 

    include_once "./function.php";

    $id = $_GET["id"];
    if (delete($id) > 0) {
        echo "
            <script>
                alert('data anda berhasil di delete');
                document.location.href='./index.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('data anda gagal di delete');
                document.location.href='./index.php';
            </script>
        ";
    }

?>