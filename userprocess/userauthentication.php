<?php
if(!session_id())session_start();

if(!isset($_SESSION['authenticate'])){
    $_SESSION['status']="please login to acess user dashboard";
    header("Location:../userprocess/login.php");
    exit(0);
}


?>