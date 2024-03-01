<?php
if(!session_id())session_start();
function alertMessage(){
    
    if(isset($_SESSION['status'])){
        echo "<h4>".$_SESSION['status']."</h4>";
        unset($_SESSION['status']);

    }
    
}

?>