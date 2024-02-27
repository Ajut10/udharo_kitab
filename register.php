<?php
session_start();
$page_title="Register";
include ('includes/header.php');

include ('database/database.php');

?>

<!-- register html code -->
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <div class="form-box">
        <h1>Register</h1>
        
        <form action="code.php" method="post" onsubmit="return validation()" novalidate>
            
        <div class="input-group">
            <div class="input-field">
                
                
                <input type="text" name="name" id="name" autocomplete="off" placeholder="Name" >
                <div class="alert">
                    <span id="alert1"></span>
                    <?php
                    if(isset($_SESSION['status'])){
                        echo "<h4>".$_SESSION['status']."</h4>";
                        unset($_SESSION['status']);
            
                    }
                    ?>
                </div>
            </div>
    
                <div class="input-field">
       
                 
                   <input type="password" name="password" id="password"  placeholder="Password">
               </div>
                <div class="input-field">
       
                  
                   <input type="text" name="phone" id="phone" placeholder="Phone" >
                   
               </div>
            
                <div class="input-field">
       
               
                   <input type="text" name="shop" id="shop" placeholder="Store name" >
       
               </div >
               <div class="input-field">
                   <input type="email" name="email" id="email" placeholder="email">
               </div>
               <div class="input-field">
                   <button type="submit" name="register_btn">Register</button>
               </div>
            </div>
                
        </form>
        
    </div>
</div>

<script src="javascript/script.js"></script>
<?php
include "includes/footer.php";
?>

