<?php
if(!session_id())session_start();
include('../class/product_class.php');
include('../includes/header.php');
include('../class/addtional_function.php');
include('aside.php');

$product=new Product();

if(isset($_POST['add'])){
    $product->set('p_name',$_POST['name']);
    $product->set('p_price',$_POST['price']);
    $product->set('p_status',$_POST['status']);
    $product->set('p_modified_date',date('Y-m-d H:i:s'));
    $product->set('p_description',$_POST['description']);
    $product_result=$product->save();
    
    
    
    
}


?>

<main>
    <form action="" method="post">
        <?php 
        if(!empty($product_result))
           check($product_result,"cat");
        ?>
       
        <input type="text" name="name"><br>
        <input type="text" name="price" id=""><br>
        <input type="text" name="status"><br>
        <input type="text" name="description"><br>
        <button type="submit" name="add">ADD</button>
        
    </form>
</main>



<?php
include('../includes/footer.php');

?>