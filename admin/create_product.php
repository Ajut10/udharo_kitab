<?php
if(!session_id())session_start();
include('../class/product_class.php');
include('../includes/header.php');
include('../authentication.php');
include('../class/addtional_function.php');
include('aside.php');

$product=new Product();

if(isset($_POST['add'])){
    $product->set('p_name',$_POST['name']);
    $product->set('p_price',$_POST['price']);
    $product->set('p_status',$_POST['status']);
    $product->set('p_modified_date',date('Y-m-d H:i:s'));
    $product->set('p_description',$_POST['description']);
    if(!empty($_POST['name'])||!empty($_POST['price'])||!empty($_POST['status'])){

        if($_FILES['image']['error']==0){
            if($_FILES['image']['type']=="image/jpg"||$_FILES['image']['type']=="image/png"||$_FILES['image']['type']=="image/jpeg"){
                if($_FILES['image']['size']<=1024*1024){
                    $imageName=uniqid().$_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'],'../images/'.$imageName);
                    $product->set('p_image',$imageName);
                    // print_r($_FILES);
                }else{
                 $imageError="Error ,Exceeded 1mb!";
                }
            }else{
                $imageError="invalid Image!";
            }
    
        }
        $product_result=$product->save();
        
    }else{
        $imageError="All credits are required";
    }
    
    
    
}


?>

<main>
    <div class="recent-product">
    <form action="" method="post" enctype="multipart/form-data">
        <?php 
        if(!empty($product_result))
           check($product_result,"product");
        if(isset($imageError))
        echo $imageError;
        ?>
        <div class="form_control">
            <label for="">Product Name</label>
            <input type="text" name="name">
        </div>
        <div class="form_control">
            <label>Price</label>
            <input type="text" name="price" id="">
        </div>
        <div class="form_control">
            
            <label>Status</label>
            <input type="text" name="status">
        </div>
        <div class="form_control">
            <label>Description</label>
            
            <input type="text" name="description">
        </div >
        <div class="form_control">
            
            <label>Image</label>
            <input type="file" name="image">
        </div>
        <div class="form_control">
            
            <button type="submit" name="add" class="btn">ADD</button>
        </div>
        
    </form>
    </div> 
    
</main>



<?php
include('../includes/footer.php');

?>