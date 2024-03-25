<?php
include('../database/database.php');
include('../class/addtional_function.php');
include('../class/credit_class.php');
include('../class/credited_product_class.php');


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

if(isset($_POST['procedbtn'])){
    $phone=validates($_POST['cust_phone']);
    $name=validates($_POST['cust_name']);
    $checkCustomer=mysqli_query($conn,"select * from user where phone = '$phone' limit 1");
    // jsonResponse(200,'success',"Customer Found");
    if($checkCustomer){
        if(mysqli_num_rows($checkCustomer)){
            $_SESSION['cust_name']=$name;
            $_SESSION['invoice_no']="CRE-".rand(111111,999999);
            $_SESSION['phone']=$phone;
            // redirect('summary.php',"welcome");
            jsonResponse(200,'sucess','Customer Found');
        }else{
            jsonResponse(404,'warning','Customer Not Found');
            // redirect('add_credit.php',"not found");
        }
    }else{
        jsonResponse(500,'Error',"Somethng went wrong");
    }
}

$creditObj= new Credit();
$creditedObj = new Credit_detail();

if(isset($_POST['saveCredit'])){
    $phone=validates($_SESSION['phone']);
    $invoice_no=validates($_SESSION['invoice_no']);

    $checkCustomer=mysqli_query($conn, "SELECT * FROM user where phone='$phone' limit 1");
    if(!$checkCustomer){
        jsonResponse(500,'error','something went wrong');
    }
    if(mysqli_num_rows($checkCustomer)>0){
        $customerData =mysqli_fetch_assoc($checkCustomer);
        if(!isset($_SESSION['productitems'])){
            jsonResponse(404,'warning','Something went wrong');
        }
        $sessionProducts=$_SESSION['productitems'];
        $totalAmount=0;
        foreach($sessionProducts as $amtitem){
            $totalAmount += $amtitem['price']*$amtitem['quantity'];
        }
        $creditObj->set('customer_id',$customerData['u_id']);
        $creditObj->set('invoice_no',$invoice_no);
        $creditObj->set('total_amount',$totalAmount);
        $creditObj->set('credited_date',date('Y-m-d H:i:s'));
        $creditObj->set('status',"pending");

        $result=$creditObj->save();
        $lastOrderId=mysqli_insert_id($conn);
        foreach($sessionProducts as $productitem){
            $productId=$productitem['product_id'];
            $price=$productitem['price'];
            $quantity=$productitem['quantity'];

            $creditedObj->set('order_id',$lastOrderId);
            $creditedObj->set('p_id',$productId);
            $creditedObj->set('p_rate',$price);
            $creditedObj->set('p_quantity',$quantity);
            $resultDetail=$creditedObj->save();
            
        }
        unset($_SESSION['productitems']);
        unset($_SESSION['productitem_id']);
        unset($_SESSION['cust_name']);
        unset($_SESSION['invoice_no']);
        unset($_SESSION['invoice_no']);
        
        jsonResponse(200,'success','Sucessfully');
    }
    else{
        jsonResponse(404,'warning','customer_not_found');
        
    }
}

?>