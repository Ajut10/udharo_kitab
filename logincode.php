<?php
if(!session_id())session_start();
include('database/database.php');

if(isset($_POST['login_now_btn'])){
    if(!empty(trim($email = $_POST['email']))&& !empty(trim($password = $_POST['password']))){
    
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password=mysqli_real_escape_string($conn, md5($_POST['password']));
echo $email;
        $login_query ="Select * from admin where email='$email' and password='$password' limit 1";
        $login_query_run=mysqli_query($conn,$login_query);

        if(mysqli_num_rows($login_query_run)>0){
            $row=mysqli_fetch_array($login_query_run);
            // echo $row['verify_status'];

            if($row['verify_status']== "1"){
                $_SESSION['authenticated']=TRUE;
                $_SESSION['u_id']=$row['u_id'];
                $_SESSION['auth_user']=[
                    'username'=>$row['name'], 
                    'email'=>$row['email'],
                    'usertype'=>$row['user_type']
                ];
                $_SESSION['status']="you are login to dashboard page";
               

                    header("Location:admin/dashboard.php");
                    exit(0);
                
            }
            else{
                
                $_SESSION['status']="please verify your email address to login";
                header("Location:adminlogin.php");
                exit(0);
            }

        }else{
            $_SESSION['status']="invalid email or password";
            header("Location:adminlogin.php");
            exit(0);

        }

    }else{
        $_SESSION['status'] = "All fields are required";
        header("Location:adminlogin.php");
    }
}


?>