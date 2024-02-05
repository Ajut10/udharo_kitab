<?php
session_start();
include ('database/database.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


function  sendmail_verify($name,$email,$verify_token){
    $mail = new PHPMailer(true);
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->SMTPAuth   = true;        
                               
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->Username   = 'darjidon12@gmail.com';                     //SMTP username
    $mail->Password   = 'fvghrfgthecmmooo';                               //SMTP password
    
    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->setFrom("darjidon12@gmail.com",$name);
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = "email verification from udharo kitab";

    $email_template = "
    <h2>you have registered with udharo kitab</h2>
    <h5>verify your email address to login with the below link</h5>
    <br/><br/>
    <a href='http://localhost/Udharo_kitab/verify_email.php?token=$verify_token'> click Me</a>";

    $mail->Body =$email_template;
    $mail->send();
    // echo "message sent";


}

if(isset($_POST['register_btn'])){
    $name= $_POST["name"];
    $password=$_POST["password"];
    $phone=$_POST["phone"];
    $shop_name=$_POST["shop"];
    $email=$_POST["email"];
    $verify_token= md5(rand());
    // sendmail_verify("$name","$email","$verify_token");
    // echo "sent or not";
    
    // email exist or not
    $check_email_query ="select email from user where email='$email' limit 1";
    $check_email_query_run= mysqli_query($conn,$check_email_query);

    if(mysqli_num_rows($check_email_query_run)>0){
        $_SESSION['status']="email already exists";
        header("Location:register.php");


    }else{
        // registering user data
        $query= "insert into user(name,phone,password,shop_name,verify_token,email) values('$name','$phone','$password','$shop_name','$verify_token','$email')";
        $query_run =mysqli_query($conn,$query);

        if($query_run){
            sendmail_verify("$name","$email","$verify_token");
            $_SESSION['status']= "Register sucessfully! Please verify your email";
            header("Location:register.php");  
        }
        else{
            $_SESSION['status']="Register failed";
            header("Location:register.php");  
        }
    }
    

}



?>