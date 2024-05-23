<?php

require_once('common_class.php');
// require('database/database.php');

class Product extends Common {
    
    public $p_id,$p_name,$p_price,$p_quantity,$p_status,$p_modified_date,$p_description,$p_image;
    public function save(){
        $conn=mysqli_connect('localhost','root','','kitab');
    
        $sql="insert into product(p_name,p_price,status,modified_date,description,image) values('$this->p_name','$this->p_price','$this->p_status','$this->p_modified_date','$this->p_description','$this->p_image')";
        
        $var=$conn->query($sql);
    if($conn->affected_rows == 1 && $conn->insert_id>0){
        return $conn->insert_id;
    }else{
        return false;
    }
        
    }
    public function edit(){
        $conn=mysqli_connect('localhost','root','','kitab');
        $sql = "update product set p_name = '$this->p_name', p_price = '$this->p_price', status = '$this->p_status',modified_date = '$this->p_modified_date', description = '$this->p_description', image = '$this->p_image' where p_id = '$this->p_id'";

        $conn->query($sql);
        if($conn->affected_rows==1){
            return $this->p_id;
        }else{
            return false;
        }

    }
    public function delete(){
        $conn=mysqli_connect('localhost','root','','kitab');
        $sql="delete  from product where product.p_id='$this->p_id' ";
        $var=$conn->query($sql);

        if($var){
            return "success";
        }else{
            return "failed";
        }
    }
    public function retrieve()
    {
        $conn=mysqli_connect('localhost','root','','kitab');
        $sql="select * from product";
        $var=$conn->query($sql);
        if($var->num_rows>0){
        $dataList=$var->fetch_all(MYSQLI_ASSOC)  ;
        return $dataList;
        }else{
            return false;
        }
    }
    function getById(){
        $conn=mysqli_connect('localhost','root','','kitab');
        $sql="select * from product where p_id='$this->p_id' ";
        $var=$conn->query($sql);
        if($var->num_rows>0){
            $data=$var->fetch_object();
            return $data;
        }else{
            return [];
        }
    }
}

?>