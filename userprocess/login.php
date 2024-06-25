 <?php
session_start();
$page_title="Login";
include ('../includes/header.php');
include ('../database/database.php');
include('../class/addtional_function.php');

if(isset($_SESSION['authenticate'])){
    $_SESSION['status']="please login to acess user dashboard";
    header("Location:../user/dash2.php");
    exit(0);
}
?> 

<link rel="stylesheet" href="../css/style.css">
</head>
<!-- login html code--> 
<body>
    

    
   <div class="alert">
       
       <?php alertMessage();?></h4>
       
    </div>
    <section class="sign-in">
        <article class="sign-in_details">
             <h1>Sign In</h1>
             <p>Log in your account using your credentials</p>
             <form  class="sign-in_form" action="logincode.php" method="post" onsubmit="return validation()" novalidate>
                 
             
             <div class="form_control">
                 <label for="email">Email</label>
                 <input type="email" name="email" id="email" placeholder="Enter Your Email">
                 <span id="emailerror"></span>
             </div>
             <div class="form_control">
     
                 <label>Password</label>
                 <input type="password" name="password" id="password" placeholder="Enter Your Password" >
             </div>
             
             <!-- <div class="sign-in_extras">
                 <a href="">Forgot Password?</a>
             </div> -->
             
           
                 <button type="submit" name="login_now_btn" class="btn btn-dark">Login</button>
            
                 
         </form>
        </article>
        <article class="sign-in_log">
        <h1>UDAHRO<span>KITAB</span></h1>
            <h5>DIGITAL CREDIT BOOK</h5>
            <small class="next_page">Don't have an account? </small>
            <a href="register.php">Sign up</a>
            
        </article>
    </section>

<script src="../javascript/login.js"></script>
<?php
include "../includes/footer.php";
?>