<?php
session_start();

$id= $_SESSION['u_id'];

include ('../includes/header.php');
include ('../class/user_class.php');

$user= new User();
$user->set('id',$id);
$data = $user->getById(); 



?>
<link rel="stylesheet" href="../css/ui.css">
<div class="page">
 <a href="dash2.php">back</a>
    <div class="container">
        <div class="picture">
            <img src="../images/<?=$data->image?>" style="width:20%;">
        </div>
            <div class="profile">
                <div>

                    
                <?= $data->name?>
                </div>
                <div>

                    
                    <?=$data->email?>
                </div>
                <div>
                    <?=$data->phone?>
                </div>
        </div>
    </div>
</div>

