<?php
if(!session_id())session_start();
// include('../database/database.php');
function redirect($url, $status){
    $_SESSION['status']=$status;
    header('location:'.$url);
    exit(0);
}
function alertMessage(){
    
    if(isset($_SESSION['status'])){
        echo "<h4>".$_SESSION['status']."</h4>";
        unset($_SESSION['status']);

    }
    
}
function validates($value){
   
    $conn=mysqli_connect('localhost','root','','kitab');
    $newValue=$conn->real_escape_string($value);
    return trim($newValue);
}
function check($result,$item){
    
    if(is_integer($result)){
        $msg=$item." inserted successfully";
    }else{
        $msg="";
    }
    
    if(isset($msg)){
       echo "<h4>".$msg."</h4>";
    }
    
}


function jsonResponse($status,$status_type,$message){
    $response=[
        'status' =>$status,
        'status_type'=>$status_type,
        'message'=> $message
    ];
    echo json_encode($response);
    return;
}

function checkParamId($type){
    if(isset($_GET[$type])){
        if($_GET[$type] !=''){
            return $_GET[$type];
        }else{
            return  '<h5> Not ID Found</h5>';
        }
    }else{
        return '<h5> No ID Found</h5>';
    }
}


?>