<?php 

    session_start();
    session_unset();
    session_destroy();
    session_reset();
    $_SESSION = [];

    setcookie("id", "", time()-3600);
    setcookie("key", "", time()-3600);

    header("location: ./login.php");
    exit;


?>