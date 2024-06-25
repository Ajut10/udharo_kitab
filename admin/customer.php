<?php
if(!session_id())session_start();
include('../includes/header.php');
include('../class/user_class.php');
include('../class/addtional_function.php');
    
    $userObj= new User();
    $datalist= $userObj->retrieve();
include('aside.php');

?>

<main>

    <div class="recent-order">
    <?php alertMessage();?>         
                    <h2>Customer</h2>
                    <table>
                        <thead>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            
                        </thead>
                        <tbody>
                            <?php foreach ($datalist as $user){ ?>
                            <tr>
                                <td><img src="../images/<?=$user['image']?>" alt="load"></td>
                                <td><?php echo  $user['name']; ?></td>
                                <td><?php echo $user['phone']; ?> </td>
                                <td><?php echo $user ['email']; ?></td>
                                
                                <td class="danger"><a href="deleteCustomer.php?id=<?=$user['u_id']?>"><span class="material-symbols-outlined">delete</span></a></td>
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