<?php
include('../database/database.php');
include('../class/addtional_function.php');


if(!isset($_SESSION['productitems'])){
    $_SESSION['productitems'] = [];
}
if(!isset($_SESSION['productitem_id'])){
    $_SESSION['productitem_id'] = [];
}

if(isset($_POST['add_item'])){
    $productId=validates($_POST['product_id']);
    $quantity=validates($_POST['quantity']);
    echo $quantity;
    $checkproduct=mysqli_query($conn,"select * from product where p_id='$productId' LIMIT 1");
  
    if ($checkproduct){
        if(mysqli_num_rows($checkproduct)>0){
            $row = mysqli_fetch_assoc($checkproduct);
            if($row['quantity'] > $quantity){
                
                header('location:add_credit.php');
                $_SESSION['status']="Please enter the quantity";
                exit(0);
                print_r($row);
            }
            $productData=[
                'product_id' => $row['p_id'],
                'name'=>$row['p_name'],
                'price'=>$row['p_price'],
                'image'=>$row['image'],
                'quantity'=>$quantity,
            ];
            if(!in_array($row['p_id'],$_SESSION['productitem_id'])){
                 array_push($_SESSION['productitem_id'],$row['p_id']);
                 array_push($_SESSION['productitems'],$productData);
                
            }else{
                foreach($_SESSION['productitems'] as $key=>$productSessionItems){
                if($productSessionItems['product_id'] == $row['p_id']){
                    $newQuantity=$productSessionItems['quantity']+$quantity;
                    $productData=[
                        'product_id' => $row['p_id'],
                        'name'=>$row['p_name'],
                        'price'=>$row['p_price'],
                        'image'=>$row['image'],
                        'quantity'=>$newQuantity,
                    ];
                    $_SESSION['productitems'][$key]=$productData;
                }

            }

                }
                redirect("add_credit.php","Item Added ".$row['p_name']);
        }else{
            
            $_SESSION['status'] = "not found";
            header('location:add_credit.php');
            exit(0);
            // redirect('location:add_credit.php', "no product found");
        }
        
    }else{
        $_SESSION['status'] = "Something went wrong. Please try again";
        header('location:add_credit.php');
        exit(0);
        
    }


 }
 if(isset($_POST['productInDec'])){
    $productId=validates($_POST['product_id']);
    $quantity=validates($_POST['quantity']);
    $flag=false;
    foreach($_SESSION['productitems'] as $key=>$item){
        if($item['product_id']==$productId){
            $flag=true;
            $_SESSION['productitems'][$key]['quantity']=$quantity;
        }
    }
    if($flag){
       
        jsonResponse(200,'success','Quantity updated');
    }
    else{
        jsonResponse(500,'error','Something went wrong.Please refresh');
    }
}

?>