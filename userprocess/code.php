<?php
session_start();
include ('../database/database.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';


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
    <a href='http://localhost/Udharo_kitab/userprocess/verify_email.php?token=$verify_token'> Click Me</a>";

    $mail->Body =$email_template;
    $mail->send();
    // echo "message sent";


}

if(isset($_POST['register_btn'])){
    $name= $_POST["name"];
    $password=$_POST["password"];
    $phone=$_POST["phone"];
    $email=$_POST["email"];
    if($_FILES['image']['error']==0){
        if($_FILES['image']['type']=="image/jpg"||$_FILES['image']['type']=="image/png"||$_FILES['image']['type']=="image/jpeg"){
            if($_FILES['image']['size']<=1024*1024){
                $imageName=uniqid().$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],'images/'.$imageName);
                $image=$imageName;
                
                // print_r($_FILES);
            }else{
             $imageError="Error ,Exceeded 1mb!";
            }
        }else{
            $imageError="invalid Image!";
        }
    }

    $verify_token= md5(rand());
    // sendmail_verify("$name","$email","$verify_token");
    // echo "sent or not";
    
    // email exist or not
    if($name==""||$phone==""||$email==""||$password==""){
        $_SESSION['status']="All the fields are required";
        header("Location:register.php");
    }else{
    $check_email_query ="select email from user where email='$email' and verify_status=1 limit 1";
    $check_email_query_run= mysqli_query($conn,$check_email_query);
    if(mysqli_num_rows($check_email_query_run)>0){
        $_SESSION['status']="email already exists";
        header("Location:register.php");


    }else{
        // registering user data
        $query= "insert into user(name,phone,password,verify_token,email,image) values('$name','$phone','$password','$verify_token','$email','$image')";
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

}



?>