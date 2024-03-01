<?php
if(!session_id())session_start();
include('../includes/header.php');
include('../class/user_class.php');
    
    $userObj= new User();
    $datalist= $userObj->retrieve();
include('aside.php');

?>

<main>

    <div class="recent-order">
                    <h2>Customer</h2>
                    <table>
                        <thead>
                            <th>Name</th>
                            <th>Number</th>
                            <th>Payment</th>
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
                    
                </div>
</main>

<?php  
include('right.php'); 

?>
</div>
<script src="../javascript/dashScript.js"></script>

<?php
include('../includes/footer.php');
?>