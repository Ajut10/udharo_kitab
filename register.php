<?php
session_start();
$page_title="Register";
include ('includes/header.php');

include ('database/database.php');
include('class/addtional_function.php');

?>

<!-- register html code -->
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <div class="form-box">
        <h1>Register</h1>
        
        <form action="code.php" method="post" onsubmit="return validation()" novalidate>
            <div class="alert">
               
                <?php
                alertMessage();
                ?>
                <h4 id="alert1">
                    
                </h4>
            </div>
            
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

