<?php
if(!session_id())session_start();
include('../class/product_class.php');
include('../includes/header.php');
include('../authentication.php');
include('../class/addtional_function.php');
include('aside.php');

$product=new Product();
$id= $_GET['p_id'];
$product->set('p_id',$id);
$data=$product->getById();



if(isset($_POST['edit'])){
    $product->set('p_name',$_POST['name']);
    $product->set('p_price',$_POST['price']);
    $product->set('p_status',$_POST['status']);
    $product->set('p_modified_date',date('Y-m-d H:i:s'));
    $product->set('p_description',$_POST['description']);

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
    $product_result=$product->edit();
    if($product_result){
       
        redirect("listproduct.php","Sucessfully Updated");
    }
    
    
    
    
}


?>

<main>
    
<div class="recent-product">
    <a href="listproduct.php"><span class="material-symbols-outlined">keyboard_backspace</span></a>
    <form action="" method="post" enctype="multipart/form-data">
        <?php 
        if(!empty($product_result))
           check($product_result,"product");
        if(isset($imageError))
        echo $imageError;
    ?>
        <div class="form_control">
            <label for="">Product Name</label>
            <input type="text" name="name" value=<?= $data->p_name?>><br>
            
        </div>
        <div class="form_control">
            <label>Price</label>
            
            <input type="text" name="price" value=<?= $data->p_price?>><br>
        </div>
        <div class="form_control">
            
            <label>Status</label>
            <input type="text" name="status"value=<?= $data->status?>><br>
          
        </div>
        <div class="form_control">
            <label>Description</label>
           
            <input type="text" name="description"value=<?= $data->description?>><br>
        </div >
        <div class="form_control">
            
            <label>Image</label>
            <img src="../images/<?= $data->image;?>" alt="" srcset="" width="200" class="bhindi">
            
            <input type="file" name="image" value="<?=$data->image;?>" >
        </div>
        <div class="form_control">
            
            <button type="submit" name="edit" class="btn">EDIT</button>
            
        </div>
        
    </form>
    </div> 
    
</main>



<?php
include('../includes/footer.php');

?>