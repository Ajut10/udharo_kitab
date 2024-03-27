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
        echo 12;
        redirect("listproduct.php","Sucessfully Updated");
    }
    
    
    
    
}


?>

<main>
    <?php
    print_r($data);
    ?>
   
    <form action="" method="post" enctype="multipart/form-data">
        <?php 
        if(!empty($product_result))
           check($product_result,"cat");
        if(isset($imageError))
        echo $imageError;
        ?>
       
        <input type="text" name="name" value=<?= $data->p_name?>><br>
        <input type="text" name="price" value=<?= $data->p_price?>><br>
        <input type="text" name="status"value=<?= $data->status?>><br>
        <input type="text" name="description"value=<?= $data->description?>><br>
        <img src="../images/<?= $data->image;?>" alt="" srcset="" width="100">
        <input type="file" name="image">
        <button type="submit" name="edit">EDIT</button>
        
    </form>
</main>



<?php
include('../includes/footer.php');

?>