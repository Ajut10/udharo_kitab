<?php
    include('authentication.php');
    $page_title="Dashboard";
    include('includes/header.php');


?>
<!-- material icon -->
<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"> -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="css/dashStyle.css">
</head>
<body>
<!-- html code -->
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <h2>Udharo<span class="danger">Kitab</h2>
                </div>
                <div class="close" id="close-btn">
                <span class="material-symbols-outlined">
                    close
                </span>
                </div>
            </div>
            <div class="sidebar">
                <a href="#">
                    <span class="material-symbols-outlined">home</span>
                    <h3>Home</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">person</span>
                    <h3>Customers</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">note_add</span>
                    <h3>Add Credit</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">home</span>
                    <h3>hh</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">settings</span>
                    <h3>Setting</h3>
                </a>
            </div>
        </aside>
    </div>






<?php
    include('includes/footer.php');
?>