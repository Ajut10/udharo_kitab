<?php
session_start();
$page_title="Login";
include ('includes/header.php');
include ('database/database.php');
include('class/addtional_function.php');

if(isset($_SESSION['authenticated'])){
    $_SESSION['status']="please login to acess user dashboard";
    header("Location:admin/dashboard.php");
    exit(0);
}
?> 

<link rel="stylesheet" href="css/style.css">
</head>
<!-- login html code--> 
<body>
    

    
  
       <section class="sign-in">
           <article class="sign-in_details">
               <h1>Admin Login</h1>
               <p>Log in your account using your credentials</p>
               <form  class="sign-in_form" action="logincode.php" method="post" onsubmit="return validation()" novalidate>
                <span><?php alertMessage();?></span>
                 
             
             <div class="form_control">
                 <label for="email">Email</label>
                 <input type="email" name="email" id="email" placeholder="Enter Your Email">
                 <span id="emailerror"></span>
             </div>
             <div class="form_control">
     
                 <label>Password</label>
                 <input type="password" name="password" id="password" placeholder="Enter your Password">
                 <span id="passworderror"></span>
             </div>
             
             <!-- <div class="sign-in_extras">
                 <a href="">Forgot Password?</a>
             </div> -->
             
           
                 <button type="submit" name="login_now_btn" class="btn btn-primary">Login</button>
            
                 
         </form>
        </article>
        <article class="sign-in_logo">
        <h1>UDAHRO<span class="logo">KITAB</span></h1>
            <h5>DIGITAL CREDIT BOOK</h5>
            <small class="next_page">Want to login as a User?</small>
            <a href="userprocess/login.php">Sign in</a>
        </article>
    </section>

    <script src="javascript/login.js"></script>
    
<?php
include "includes/footer.php";
?>