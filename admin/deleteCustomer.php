<?php

$id=$_GET['id'];


include('../class/user_class.php');


$custObj= new User();


$custObj->set('id',$id);



$status=$custObj->delete();
// print_r($status);
    session_start();
    if($status =="success"){
        $_SESSION['status']="User deleted successfully";
        header('location:Customer.php');
    }else{
        $_SESSION['status']=" Failed to Delete product";
        header('location:Customer.php');

    }

?>