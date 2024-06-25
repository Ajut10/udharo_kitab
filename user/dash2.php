<?php
    if(!session_id()) session_start();
    include('../userprocess/userauthentication.php');
    $page_title="Udharo kitab";
    include('../includes/header.php');
    

?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<link rel="stylesheet" href="../css/ui.css">
<body>
   
    <nav>
        <div class="container">
            <a href="#"><h3>Udharo<span>Kitab</span></h3></a>
            
            <ul>
                <li><a href="#" class="active">Home</a></li>
                <li><a href="#landing">Transactions</a></li>
                
                <li><a href="#aboutus">About Us</a></li>
            </ul>
            <div class="icons">
            <a href="page.php"><span class="material-symbols-outlined">person</span></a>
            <!-- <span class="material-symbols-outlined">person</span> -->
            <a href="../userprocess/userlogout.php">Logout</a>
            </div>
            <button><span class="material-symbols-outlined">menu</span></button>
            <button><span class="material-symbols-outlined">close</span></button>
        </div>
    </nav>
    <!-- *****************END OF NAVBAR *********************** -->
    <header>
        <div class="container">
          
            <div class="info">
                <h1>WE TRUST YOU;</h1>
                <H1>YOU TRUST US</H1>
            
            </div>
        
            <div class="header-image">
                <img src="../images/poster.jpeg" alt="">
            </div>
        
        </div>
    </header>
    <?php include('transaction.php');?>
    <?php include('aboutus.php');?>
    
    <script src="../javascript/main.js"></script>
  
   
<?php
    include('../includes/footer.php');
?>