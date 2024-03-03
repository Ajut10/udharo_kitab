<?php

require_once('../database/database.php');

$searchTerm = $_GET['term']; 
$customer_query="select * from user where user_type = 'user' and name like '%".$searchTerm."%' order by name asc";
$customer_query_run=mysqli_query($conn,$customer_query);
$json_array=array();
while($row=mysqli_fetch_assoc($customer_query_run)){
    $data['id']=$row['u_id'];
    $data['value']=$row['name'];
    array_push($json_array,$data);
}
echo json_encode($json_array);

?>