<?php

if (!session_id()) {
    session_start();
}

$page_title="Details";
include '../includes/header.php';
include '../class/credit_class.php';
include('../class/credited_product_class.php');
include '../userprocess/userauthentication.php';
$creditobj = new Credit();
$id=$_GET['id'];
$creditobj->set('id',$id);
$data = $creditobj->getById();

$credit_detailobj= new Credit_Detail();
$credit_detailobj->set('id',$id);
$datalist= $credit_detailobj->retrieve();




?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<link rel="stylesheet" href="../css/ui.css">
<div class="details">
<a href="dash2.php"><span class="material-symbols-outlined">keyboard_backspace</span></a>
    <h3>Detail view</h3>
    <div class="transaction">
        
        <div class="trans">
                <!-- <h2>Credit Detail</h2> -->
                <h4>Credit information</h4>
                    <p>Credited no  : <?= $data->invoice_no?></p>
                    <p>Credited Date :  <?= $data->credited_date?></p>
                    <p>Phone :  <?= $data->phone?></p>
                
            </div>
            <div class="trans" >
                <h4>User information</h4>
                <div style="display: flex;">

                    <div>
                    <p>Name  : <?= $data->name?></p>
                    <p>Email :  <?= $data->email?></p>
                    <p>Phone :  <?= $data->phone?></p>
                </div>
                <div>
                    
                    <img src="../images/<?=$data->image?>" alt="" srcset="" style="width: 35%; margin:0 30px">
                </div>
                    </div>
            </div>

           
        </div>
        <div class="transaction">
            <div class="trans1">

                <h4>Products</h4>
                <table>
                    <thead>
                        <th></th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th></th>
                    </thead>
                    <tbody>

                       <?php if(isset($datalist))?>
                        <?php foreach ($datalist as $product) {?>
                            <tr>
                                <td><img src="../images/<?=$product['image']?>" alt=""></td>
                                <td><?=$product['p_name'] ?></td>
                                <td><?=$product['p_price'] ?></td>
                                <td><?=$product['p_quantity'] ?></td>
                                <td><?=number_format($product['p_price']*$product['p_quantity'])?></td>
                            </tr>
                        <?php }?>


                        <tr>
                            <th colspan='4'>Total amount</th>
                            <td>Rs: <?= $data->total_amount?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

    </div>
        

    </div>
<?php
include '../includes/footer.php';