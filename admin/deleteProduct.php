<?php

$id=$_GET['p_id'];


include('../class/product_class.php');


$productObj= new Product();


$productObj->set('p_id',$id);



$status=$productObj->delete();
print_r($status);
    session_start();
    if($status =="success"){
        $_SESSION['status']="Product deleted successfully";
        header('location:listproduct.php');
    }else{
        $_SESSION['status']=" Failed to Delete product";
        header('location:listproduct.php');

    }

?>