<?php

if(!session_id()) session_start();
if(!isset($_SESSION['productitems'])){
    echo '<script> window.location.href="add_credit.php";</script> no items selected';
}
 
?>
<link rel="stylesheet" href="../css/dashStyle.css">


<main>
    <div>
    <button class="btn"><a href="add_credit.php" style="color: white;">Back</a></button>
    <h2>Summary of Credit Detail</h2>
    <h4>Customer Details</h4>    
    <p name="cust" >Customer Name: <?=$_SESSION['cust_name']; ?></p>
    <p>Customer Phone: <?= $_SESSION['phone']; ?></p>
    <p>Invoice no: <?=$_SESSION['credit_no'];?></p>
    <p>Date: <?php echo date("jS F Y"); ?></p>

    
        <?php 

        if(isset($_SESSION['productitems'])){
            $sessionProducts=$_SESSION['productitems'];

           
        
        if(empty($sessionProducts)){
         echo "<p class='danger'>no credited items</p>";   
        }
        else{
?>
            <table border="2">
                <thead>
                    <th>S.no</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                    <th>Total</th>
                </thead>
    
                <tbody>
                    <?php
                    $i=1;
                    $amount=0;
                    $totalamount=0;
                    foreach ($sessionProducts as $key=>$row){
                        
                        
                    ?>
                    
                    <tr>
                        <td><?=$i++; ?></td>
                        <td ><?=$row['name']; ?></td>
                        <td><?=$row['quantity']; ?></td>
                        <td><?=$row['price']; ?></td>
                        <td><?=$amount=($row['quantity']*$row['price']); ?></td>
                        
                    </tr>
                    <?php 
                    $totalamount+=$amount;
                    }
                    ?>
                    <tr>
                        <th colspan="3">Grand Total:</th>
                        <th colspan="4"><?=$totalamount; ?></th>
    
                    </tr>
                </tbody>
            </table>
            <?php
            if(isset($_SESSION['productitems'])):
        ?>
        <button type="button" name="saveCredit" id="saveCredit" class="btn">Save</button>
        <?php
            endif;
        ?>
        <?php
        }

        
                }
                else {
                    echo "no items added";
                }
        ?>
        
    </div>
</main>
<!-- <script src="../javascript/jquery.js"></script> -->
      <script src="https://ajax.googleapis.com/ajax/libs/d3js/7.8.5/d3.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="../javascript/creditCustom.js"></script>


