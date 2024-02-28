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
                    <h5><span class="danger">Digital Credit Book</span> </h5>
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
                <a href="#" class="active">
                    <span class="material-symbols-outlined">person</span>
                    <h3>Customers</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">note_add</span>
                    <h3>Add Credit</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">mail</span>
                    <h3>Message</h3>
                    <span class="message-count">72</span>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">settings</span>
                    <h3>Settings</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!-------------END OF ASIDE------------->
        <main>
            <h1>Dashboard</h1>
            
            <div class="insights">
                <div class="sales">
                    <span class="material-symbols-outlined">analytics</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Sales</h3>
                            <h1>Rs 35,00</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="35" cy="35" r="33"> </circle>
                            </svg>
                            <div class="number">
                                <p>81%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!-------------END OF SALES----------->
                
                <div class="expenses">
                    <span class="material-symbols-outlined">trending_up</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Expenses</h3>
                            <h1>Rs 35,00</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="35" cy="35" r="33"> </circle>
                            </svg>
                            <div class="number">
                                <p>81%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!-------------END OF EXPENSES----------->
                <div class="income">
                    <span class="material-symbols-outlined">bar_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Income</h3>
                            <h1>Rs 35,00</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="35" cy="35" r="33"> </circle>
                            </svg>
                            <div class="number">
                                <p>81%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!-------------END OF INCOME ----------------->
            </div>
            <!---------------END OF INSIGHTS ---------------->
            <div class="recent-order">
                <h2>Recent Orders</h2>
                <table>
                    <thead>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Manoj</td>
                            <td>9878965430</td>
                            <td>Due</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                        <tr>
                            <td>Manoj</td>
                            <td>9878965430</td>
                            <td>Due</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                        <tr>
                            <td>Manoj</td>
                            <td>9878965430</td>
                            <td>Due</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                        <tr>
                            <td>Manoj</td>
                            <td>9878965430</td>
                            <td>Due</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                      
                    </tbody>
                </table>
                <a href="#">Show All</a>
            </div>
        </main>
        <!--------------------END OF MAIN --------------->
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                <span class="material-symbols-outlined">menu</span>
                
                </button>
                <div class="theme-toggler">
                    <span class="material-symbols-outlined">light_mode</span>
                    <span class="material-symbols-outlined">dark_mode</span>

                </div>
                <div class="profile">
                    <div class="info">
                        <p>Hey,<b>Shauji</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="images/profile-1.jpg" alt="">
                    </div>

                </div>

            </div>
        </div>
        <!--------END OF RIGHT -------->
    </div>
    






<?php
    include('includes/footer.php');
?>