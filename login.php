 <?php
session_start();
$page_title="Login";
include ('includes/header.php');
include ('database/database.php');
include('class/addtional_function.php');

if(isset($_SESSION['authenticated'])){
    $_SESSION['status']="please login to acess user dashboard";
    header("Location:dashboard.php");
    exit(0);
}
?> 


<!-- login html code--> 

<div class="container">
   
        <div class="alert">
        
            <?php alertMessage();?></h4>

        </div>
       
    <form action="logincode.php" method="post" onclick="return validation()">
        
       
        <div>
            <label for="">email</label>
            <input type="email" name="email" id="email">
        </div>
        <div>

            <label>password</label>
            <input type="password" name="password" id="password" >
        </div>
         
         
        <div>
            <button type="submit" name="login_now_btn">Login</button>
        </div>
            
    </form>
</div>


<?php
include "includes/footer.php";
?>