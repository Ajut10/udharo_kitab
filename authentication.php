<?php
if(!session_id())session_start();

if(!isset($_SESSION['authenticated'])){
    $_SESSION['status']="please login to acess user dashboard";
    header("Location:../adminlogin.php");
    exit(0);
}


?>