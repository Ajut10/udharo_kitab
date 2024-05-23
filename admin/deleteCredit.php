<?php

$id=$_GET['id'];


include('../class/credit_class.php');


$productObj= new Credit();


$productObj->set('id',$id);



$status=$productObj->delete();
// print_r($status);
    session_start();
    if($status =="success"){
        $_SESSION['status']="Product deleted successfully";
        header('location:listCredit.php');
    }else{
        $_SESSION['status']=" Failed to Delete product";
        header('location:listCredit.php');

    }

?>