<?php

require_once('../database/database.php');

$searchTerm = $_GET['term']; 
$customer_query="select u_id,name,image from user where user_type = 'user' and name like '%".$searchTerm."%' order by name asc";
$customer_query_run=mysqli_query($conn,$customer_query);
$json_array=array();
while($row=mysqli_fetch_assoc($customer_query_run)){
    $name=$row['name'];
    $data['id']=$row['u_id'];
    $data['value']=$name;
    $data['label']='<a href="javascript:void(0);" style="display= inline-block;">
        <img src="../images/'. $row['image'].'" width="50" height="50" alt=""/>
        <span>'.$name.'</span>
    </a>';
    array_push($json_array,$data);
}
echo json_encode($json_array);

?>