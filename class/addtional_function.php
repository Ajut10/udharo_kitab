<?php
if(!session_id())session_start();
function alertMessage(){
    
    if(isset($_SESSION['status'])){
        echo "<h4>".$_SESSION['status']."</h4>";
        unset($_SESSION['status']);

    }
    
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





?>