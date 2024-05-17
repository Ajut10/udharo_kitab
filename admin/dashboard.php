<?php
    session_start();
    include('../authentication.php');
    $page_title="Dashboard";
    include('../includes/header.php');
    include('../class/user_class.php');
    
    $userObj= new User();
    $datalist= $userObj->retrieve();
    
    include('aside.php');
?>

<!-- html code -->
   
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
                <div class="recent-updates">
                <h2>Recent Update</h2>
                <div class="updates">
                    <div class="update">

                        <div class="profile-photo">
                            <img src="../images/profile-2.jpg" alt="">
                        </div>
                        <div class="message">
                            <p><b>Pramod</b> received his order at nights</p>
                            <small class="text-muted">2 minutes ago</small>
                        </div>
                    </div>
                    <div class="update">

                        <div class="profile-photo">
                            <img src="../images/profile-3.jpg" alt="">
                        </div>
                        <div class="message">
                            <p><b>Pramod</b> received his order at nights</p>
                            <small class="text-muted">2 minutes ago</small>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
               
            </div>
            <!---------------------------END OF INSIGHTS --------------------->
            <div class="recent-order">
                <h2>Customer</h2>
                <table>
                    <thead>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php foreach ($datalist as $user){ ?>
                        <tr>
                            <td><?php echo  $user['name']; ?></td>
                            <td><?php echo $user['phone']; ?> </td>
                            <td><?php echo $user ['email']; ?></td>
                            <td class="warning">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                        <?php } ?>
                        
                      
                    </tbody>
                </table>
                <a href="customer.php">Show All</a>
            </div>
        </main>
        <!----------------------END OF MAIN ------------------------>
        
<?php
include('right.php');
?>
<script src="../javascript/dashScript.js"></script>





<?php
    include('../includes/footer.php');
?>