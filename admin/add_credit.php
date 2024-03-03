<?php
if(!session_id()) session_start();
include('../includes/header.php');
include ('aside.php');


?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="../javascript/jquery.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/d3js/7.8.5/d3.min.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $(function(){
        $("#cust_name").autocomplete({
            source: "../ajax/autocomplete.php",
        });
    });
</script>
<main>
    <div class="form">
        <form action="submit.php" method="post">
            
            <h2>Customer Information</h2>
            <label for="">Customer Name</label>
            <input type="text" name="cust_name" id="cust_name">
            <input type="submit" value="submit" name="submit">

            <!-- <h2>Product Information</h2>
            <div class="select-product">

                <h3>Add Product</h3>
                <label for="">Item Name</label>
                <input type="text" name="item_name"><br>
                <label for="">Quantity</label>
                <input type="text" name="item_quantity"><br>

                <label for="">Item price</label>
                <input type="text" name="item_price"><br>
                <button>Add</button>

            </div>
            <div class="show-product">
                <h3>Selected list</h3>
                <input type="text" name="total" id="">
            </div> -->
            


        </form>
    </div>
</main>
</div>
