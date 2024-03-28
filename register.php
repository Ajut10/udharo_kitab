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

    <div class="alert">
       
        <?php
        alertMessage();
        ?>
        <h4 id="alert1">
            
        </h4>
    </div>
<section class="sign-in">
    <article class="sign-in_details">
        <h1>Register</h1>
        <p>Fill up the form below to create account</p>
        <form action="code.php" class="sign-in_form" method="post" enctype="multipart/form-data" onsubmit="return validation()" novalidate>
            
       
            <div class="form_control">
                
                <label for="name">Name</label>
                <input type="text" name="name" id="name" autocomplete="off" placeholder="Enter your name" >
            </div>
            
            <div class="form_control">
                
                <label for="password">Password</label>
                
                <input type="password" name="password" id="password"  placeholder="Enter the password">
            </div>
            <div class="form_control">
                
                <label for="phone">Phone</label>
                
                <input type="text" name="phone" id="phone" placeholder="Phone" >
                
            </div>
            
            <div class="form_control">
                
                <label for="Photo">Photo</label>
                
                <input type="file" name="image" id="image" placeholder="image">
                
            </div >
            <div class="form_control">
                   <label for="email">Email</label>
                   <input type="email" name="email" id="email" placeholder="email">
               </div>
               
               
                   <button type="submit" name="register_btn" class="btn btn-primary">Register</button>
              
           
                
        </form>
        
    </article>
    <article class="sign-in_logo">
        <h1>UDAHRO<span>KITAB</span></h1>
        <h5>DIGITAL CREDIT BOOK</h5>
        <small class="next_page">Already have an account?</small> <a href="login.php">Sign in</a>
       
    </article>
</section>

<script src="javascript/script.js"></script>
<?php
include "includes/footer.php";
?>

