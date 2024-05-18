<?php
if(!session_id()) session_start();
include('../authentication.php');
include('../includes/header.php');
include ('aside.php');

include('../class/product_class.php');
include('../class/addtional_function.php');

$product = new Product();
$datalist=$product->retrieve();


?>
<style>

    .ui-autocomplete-row
    {
        padding:8px;
        background-color: #f4f4f4;
        border-bottom:1px solid #ccc;
        font-weight:bold;
        display: flex;
        
      }
      .ui-autocomplete-row:hover
      {
          background-color: #ddd;
        }
        
        </style>
      <link rel="stylesheet" href="../css/dashStyle.css">
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
      <main>
          <div class="form">
          
              
              
              <form action="product.php" method="POST">
                  
                  <h2>Product Information</h2>
                  <div style="color: red;"><?php alertMessage(); ?> </div>
            <div class="select-product">

                <h3>Add Product</h3>
                <label for="">Item Name</label>
                <select name="product_id" id="" class="select" style="width:300px;">
                    <option value="" style="width: 300px;">--Select Product--</option>
                    <?php
                        foreach($datalist as $productlist){?>
                            <option value="<?=$productlist['p_id']; ?>"><?=$productlist['p_name']?></option>
                            <?php } ?>
                </select><br>
                <label for="">Quantity</label>
                <input type="text" name="quantity" value="1" id="">
            </div>
            <button type="submit" name="add_item" class="btn">Add Item</button>

            
          
            
            
        </form>
        <div class="recent-order" onload="myload()">
            <?php
                if(isset($_SESSION['productitems'])){
                    $sessionProducts=$_SESSION['productitems'];
                    if(empty($sessionProducts)){
                        unset($_SESSION['productitem_id']);
                        unset($_SESSION['productitems']);
                    }
                    
                    ?>
                    <h3>Selected list</h3>
            <table>
                <thead>
                    <th>Id</th>
                    <th>Item Name</th>
                    <th>price</th>
                    <th>Quantity</th>
                    <th>Total price</th>
                    <th>Remove</th>
                </thead>
                <tbody >
                    <?php  foreach($sessionProducts as $key => $item) :
                      
                        ?>
                    <tr>
                        <td><?= $key+1; ?></td>
                        <td><?= $item['name'] ?></td>
                        <td>
                            <?= $item['price']; ?>  
                        </td>
                        
                        <td>
                            
                            
                            <div class="qtyBox">
                                <button><span class="material-symbols-outlined increment">add</span></button>
                                
                                <input type="text" value="<?=$item['quantity'];?>" class="qty">
                                <input type="hidden" name="" class="prodId" value="<?= $item['product_id']; ?>">
                                <button><span class="material-symbols-outlined decrement">remove</span></button>
                 
                            </div>
                            
                            
                        </td>
                        <td>
                            <?=number_format( $item['price']*$item['quantity'],0); ?>
                        </td>
                        <td>
                            <a href="delete_item.php?i=<?= $key; ?>"><span class="material-symbols-outlined decrement">delete</span></a>
                        </td>
                    </tr>
                    <?php 
                    
                    endforeach; ?>
                </tbody>
            </table>
            <hr>
          

                <h2>Customer Information</h2>
                <!-- <form action="product.php" method="post"> -->
                    <div>

                        <label for="">Customer Name</label>
                        <input type="text" name="cust_name" id="cust_name" autocomplete="off" >
                        <input type="hidden" name="cust_id" id="cust_id">
                    </div>
                    <div>
                        
                        <label for="">Customer Phone</label>
                        <input type="text" name="cust_phone" id="cust_phone">
                    </div>
                    
                    <button type="submit" name="procedbtn" class="btn proced">Proced</button>
                <!-- </form> -->
       
            <?php

                }
                ?>
            
     
        </div>
        

            </div>
        
</main>
</div>
      <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
      <script src="../javascript/jquery.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/d3js/7.8.5/d3.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script>
            $(document).ready(function() {
                $('.select').select2();
            });
        </script>
      <script>
          $(function(){
              $("#cust_name").autocomplete({
                  source: "../ajax/autocomplete.php",
                  minLength:1,
                  select:function(event, ui){
                      $("#cust_name").val(ui.item.value);
                      $("#cust_id").val(ui.item.id);
                      $("#cust_phone").val(ui.item.phone);    
                  }
              }).data("ui-autocomplete")._renderItem = function( ul, item ) {
          return $( "<li class='ui-autocomplete-row'></li>" )
              .data( "item.autocomplete", item )
              .append( item.label )
              .appendTo( ul );
              };
          });
       
      </script>
  
<script src="../javascript/credit.js"></script>
<script src="../javascript/creditCustom.js"></script>