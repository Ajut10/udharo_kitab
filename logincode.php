<?php
session_start();
include('database/database.php');

if(isset($_POST['login_now_btn'])){
    if(!empty(trim($email = $_POST['email']))&& !empty(trim($password = $_POST['password']))){
    
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password=mysqli_real_escape_string($conn, $_POST['password']);

        $login_query ="Select * from user where email='$email' and password='$password'";
        $login_query_run=mysqli_query($conn,$login_query);

        if(mysqli_num_rows($login_query_run)>0){
            $row=mysqli_fetch_array($login_query_run);
            echo $row['verify_status'];

            if($row['verify_status']== "1"){
                $_SESSION['authenticates']=TRUE;
                $_SESSION['auth_user']=[
                    'username'=>$row['name'],
                    'phone'=>$row['phone'],
                    'email'=>$row['email'],
                ];
                $_SESSION['status']="you are login to dashboard page";
                header("Location:dashboard.php");
                exit(0);
            }
            else{
                
                $_SESSION['status']="please verify your email address to login";
                header("Location:login.php");
                exit(0);
            }

        }else{
            $_SESSION['status']="invalid email or password";
            header("Location:login.php");
            exit(0);

        }

    }else{
        $_SESSION['status'] = "All fields are required";
        header("Location:login.php");
    }
}


?>