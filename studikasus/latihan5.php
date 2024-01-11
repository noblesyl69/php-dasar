
<?php 


    $con = mysqli_connect("localhost", "root", "", "php_dasar");


    function query($query){
        global $con;
        $resuld = mysqli_query($con, $query);
        $row = [];
        while ($mhsData = mysqli_fetch_assoc($resuld)) {
            $row[] = $mhsData;
        }

        return $row;
    }

?>