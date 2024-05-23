<?php
session_start();
include('../database/database.php');

if(isset($_GET['token'])){
    $token = $_GET['token'];
    $verify_query ="select verify_token,verify_status from user where verify_token = '$token' limit 1";
    $verify_query_run=mysqli_query($conn,$verify_query);
    
    if(mysqli_num_rows($verify_query_run)>0){
        $row =mysqli_fetch_array($verify_query_run);
        // echo $row['verify_token'];
        // echo $row['verify_status'];
     
        
   
        if($row['verify_status'] == "0"){
            
            // echo "verify_token";
            $clicked_token=$row['verify_token'];
            $update_query = "update user set verify_status='1' where verify_token= '$clicked_token' limit 1";
            $update_query_run= mysqli_query($conn,$update_query);
            // print_r($update_query_run);
            if($update_query_run){
                $_SESSION['status']= "your account has been verified successfully";
                header("Location:login.php");
                exit(0);
            
            }else{
                $_SESSION['status']="verification failed";
                header("Location:login.php");
                exit(0);
            }
            
        }else{
            
            $_SESSION['status']="Email already verified";
            header("Location:login.php");
            exit(0);
        
        }

    }
    else{
        $_SESSION['status']="this token doesnt exist";
        header("Location:login.php");
    }

}else{
 $_SESSION['status'] ="not allowed";
 header("Location:login.php");

}


?>