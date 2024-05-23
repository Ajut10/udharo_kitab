<?php

if (!session_id()) {
    session_start();
}

$page_title="Details";
include '../includes/header.php';
include '../class/credit_class.php';
include('../class/credited_product_class.php');
include '../authentication.php';
$creditobj = new Credit();
$id=$_GET['id'];
$creditobj->set('id',$id);
$data = $creditobj->getById();

$credit_detailobj= new Credit_Detail();
$credit_detailobj->set('order_id',$id);
$datalist= $credit_detailobj->retrieve();


include 'aside.php';

?>
<main>
    
    <h2>Credit Detail</h2>
        <div class="insights">
            
            <div class="sales">
                <h4>Credit information</h4>
                    <p>Credited no  : <?= $data->invoice_no?></p>
                    <p>Credited Date :  <?= $data->credited_date?></p>
                    <p>Phone :  <?= $data->id?></p>
                
            </div>
            <div class="sales" >
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
        <div class="recent-order">

                    <h2>Products</h2>

                    <table>
                        <thead>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php foreach ($datalist as $product) {?>
                                <tr>
                                    
                                    <td><?=$product['p_name'] ?></td>
                                    <td><?=$product['p_rate'] ?></td>
                                    <td><?=$product['p_quantity'] ?></td>
                                    <td><?=number_format($product['p_rate']*$product['p_quantity'])?></td>
                                    <td><a href="editcredit.php?id=<?=$product['cp_id']?>&o_id=<?=$data->id?>">edit</a></td>
                                </tr>
                            <?php }?>


                            <tr>
                                <th colspan='3'>Total amount</th>
                                <td>Rs: <?= $data->total_amount?></td>
                            </tr>
                        </tbody>
                    </table>

    </div>
        

    </main>
<?php
include '../includes/footer.php';