<?php
    include('../authentication.php');
    $page_title="Udharo kitab";
    include('../includes/header.php');
    

?>
<link rel="stylesheet" href="../css/style.css">
<body>
   <div class="container">
    <nav>
        <ul>
            <li>Home</li>
            <li>Products</li>
            <li>About Us</li>
        </ul>
    </nav>
    <main>
        <div class="recent-credit">

            <table>
                <thead>
                    <tr>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </main>
   </div>
    <a href="../logout.php">logout</a>
<?php
    include('../includes/footer.php');
?>