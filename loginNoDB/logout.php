<?php 
    session_start();
    unset($_SESSION['simple_login']);
    header("Location: index.php");
?>