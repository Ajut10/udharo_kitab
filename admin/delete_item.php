<?php



include('../class/addtional_function.php');

$paramResult= checkParamId('i');
if(is_numeric($paramResult)){
    $iValue=validates($paramResult);
    if(isset($_SESSION['productitems']) && isset($_SESSION['productitem_id'])){

        unset($_SESSION['productitems'][$iValue]);
        unset($_SESSION['productitem_id'][$iValue]);
        redirect("add_credit.php", "item removed");

    }else{
        redirect("add_credit.php", "item is not found");
    }
}else{
    redirect("add_credit.php", "param is not numeric");
}


?>