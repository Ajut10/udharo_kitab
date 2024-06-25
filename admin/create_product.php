<?php
if(!session_id())session_start();
include('../class/product_class.php');
include('../includes/header.php');
include('../authentication.php');
include('../class/addtional_function.php');
include('../database/database.php');
include('aside.php');

$product=new Product();

if(isset($_POST['add'])){
    $product->set('p_name',$_POST['name']);
    $product->set('p_price',$_POST['price']);
    $product->set('p_status',$_POST['status']);
    $product->set('p_modified_date',date('Y-m-d H:i:s'));
    $product->set('p_description',$_POST['description']);
    
    $checkname=$_POST['name'];
    $nameSql="select p_name from product where p_name='$checkname' limit 1";
    $runSql= mysqli_query($conn,$nameSql);
    if(mysqli_num_rows($runSql)>0){
        $imageError="Product already exist";
        
    }else{

        if($_FILES['image']['error']==0){
            if($_FILES['image']['type']=="image/jpg"||$_FILES['image']['type']=="image/png"||$_FILES['image']['type']=="image/jpeg"){
                if($_FILES['image']['size']<=1024*1024){
                    $imageName=uniqid().$_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'],'../images/'.$imageName);
                    $product->set('p_image',$imageName);
                   

                        $product_result=$product->save();
                    
                    // print_r($_FILES);
                }else{
                 $imageError="Error ,Exceeded 1mb!";
                }
            }else{
                $imageError="invalid Image!";
            }
    
        }
        
    

}
    
    
}


?>

<main>
    <div class="recent-product">
    <form action="" method="post" enctype="multipart/form-data" onsubmit="return checkproduct();">
        <?php 
        if(!empty($product_result))
           check($product_result,"Product");
        if(isset($imageError))
        echo $imageError;
        ?>
        <div class="form_control">
            <label for="">Product Name</label>
            <input type="text" name="name" id="name">
            <span id="nameerror"></span>
        </div>
        <div class="form_control">
            <label>Price</label>
            <input type="text" name="price" id="price">
            <span id="priceerror"></span>
        </div>
        <div class="form_control">
            
            <label>Status</label>
            <input type="text" name="status" id="status">
            <span id="statuserror"></span>
        </div>
        <div class="form_control">
            <label>Description</label>
            
            <input type="text" name="description">
        </div >
        <div class="form_control">
            
            <label>Image</label>
            <input type="file" name="image" id="image">
            <span id=imageerror></span>
        </div>
        <div class="form_control">
            
            <button type="submit" name="add" class="btn">ADD</button>
        </div>
        
    </form>
    </div> 
    
</main>
<script src="../javascript/product.js"></script>


<?php
include('../includes/footer.php');

?>