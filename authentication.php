<?php
session_start();

if(!isset($_SESSION['authenticated'])){
    $_SESSION['status']="please login to acess user dashboard";
    header("Location:login.php");
    exit(0);
}

?>