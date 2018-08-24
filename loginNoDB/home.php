<?php
    session_start();
    if(!isset($_SESSION['simple_login'])){
        header("Location: index.php");
        exit();
    }
     
/***protected content here if needed ***/
 
?>
<h1 align="center">Welcome, <?php echo $_SESSION['simple_login']; ?></h1>
<p align="center"><a href="logout.php">Logout</a></p>