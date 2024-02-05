<?php
session_start();
$page_title="Register";
include ('includes/header.php');

include ('database/database.php');

?>

<!-- register html code -->
<link rel="stylesheet" href="css/style.css">

<div class="container">
    <div class="alert">
        <span id="alert1"></span>
        <?php
        if(isset($_SESSION['status'])){
            echo "<h4>".$_SESSION['status']."</h4>";
            unset($_SESSION['status']);

        }
        ?>
    </div>
    <div class="form-box">

        <form action="code.php" method="post" onsubmit="return validation()" novalidate>
            
            <div class="input-group">
                <div class="input-field">

                    
                    <input type="text" name="name" id="name" autocomplete="off" placeholder="Name" >
                </div>
    
                <div class="input-field">
       
                 
                   <input type="password" name="password" id="password"  placeholder="Password">
               </div>
                <div class="input-field">
       
                  
                   <input type="text" name="phone" id="phone" placeholder="Phone" >
                   
               </div>
            
                <div class="input-field">
       
               
                   <input type="text" name="shop" id="shop" placeholder="shop_name" >
       
               </div >
               <div class="input-field">
                   <input type="email" name="email" id="email" placeholder="email">
               </div>
               <div class="input-field">
                   <button type="submit" name="register_btn">Register</button>
               </div>
            </div>
                
        </form>
        <div class="gobi">
            <div class="lu">

                <p><h4>Create your account </h4> to be part of our world</p>
            </div>
        </div>
    </div>
</div>

<script src="javascript/script.js"></script>
<?php
include "includes/footer.php";
?>

