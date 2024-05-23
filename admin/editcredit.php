<?php

if (!session_id()) {
    session_start();
}

$page_title = "Details";
include '../includes/header.php';
include('../class/product_class.php');
include '../class/credit_class.php';
include '../class/credited_product_class.php';
include ('../class/addtional_function.php');
include '../authentication.php';
$product = new Product();
$datalist=$product->retrieve();
$id = $_GET['id'];
$o_id=$_GET['o_id'];
$credit_detailobj = new Credit_Detail();
$credit_detailobj->set('cp_id', $id);
$data = $credit_detailobj->getById();

include 'aside.php';
// print_r($data);
if(isset($_POST['edit']))
{
// $credit_detailobj->set('id',$id);
 $credit_detailobj->set('order_id',$o_id); 
 $credit_detailobj->set('p_id',$_POST['product_id']); 
 $credit_detailobj->set('p_rate',$_POST['rate']); 
 $credit_detailobj->set('p_quantity',$_POST['quantity']); 
 $result=$credit_detailobj->edit();
 if($result){
     redirect("listCredit.php","Sucessfully Updated");
    
    }else{
        $msg= "No Change";
    }
}
?>
<main>
    
    <h2>Edit</h2>
    

    <div class="edit-product ">
        <span><?php
         if(!empty($result))
         check($result,"transaction"); 
        if(isset($msg))echo $msg;?></span>
        <form action="" method="post">


            <div class="form-control">

                <label for="">Product Name</label>
               
                <select name="product_id" id="" class="select" style="width:300px;">
                    <option value="<?=$data->p_id?>" style="width: 300px;"><?=$data->p_name?></option>
                    <?php
                    foreach ($datalist as $productlist) {?>
                        <option value="<?=$productlist['p_id'];?>"><?=$productlist['p_name']?></option>
                        <?php }?>

                </select>
            </div>
            <div class="form-control">
                <label for="">Product price</label>
                <input type="text" value="<?=$data->p_rate?>" name="rate">
            </div>
                
            <div class="form-control">
                <label for="">Product Quantity</label>
                <input type="text" value="<?=$data->p_quantity?>" name="quantity">

            </div>
            <div class="form-control">
                <button type="submit" class="btn" name="edit" >Save</button>

            </div>
            





        </form>




    </div>


    </main>
<?php
include '../includes/footer.php';