<?php
session_start();
unset($_SESSION['authenticate']);
unset($_SESSION['auth-user']);
$_SESSION['status']="Youre logout is successful ";
// setcookie('username','',Time()-60*60);
session_destroy();
header("Location:../userprocess/login.php");


?>