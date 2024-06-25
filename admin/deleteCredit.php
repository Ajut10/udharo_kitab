<?php

$id=$_GET['id'];


include('../class/credit_class.php');


$productObj= new Credit();


$productObj->set('id',$id);



$status=$productObj->delete();
// print_r($status);
    session_start();
    if($status =="success"){
        $_SESSION['status']="Credit deleted successfully";
        header('location:listCredit.php');
    }else{
        $_SESSION['status']=" Failed to Delete credit";
        header('location:listCredit.php');

    }

?>