<?php

require_once('common_class.php');
// require('database/database.php');

class Product extends Common {
    
    public $p_id,$p_name,$p_price,$p_quantity,$p_status,$p_modified_date,$p_description;
    public function save(){
        $conn=mysqli_connect('localhost','root','','kitab');
    
        $sql="insert into product(p_name,p_price,status,modified_date,description) values('$this->p_name','$this->p_price','$this->p_status','$this->p_modified_date','$this->p_description')";
        
        $var=$conn->query($sql);
    if($conn->affected_rows == 1 && $conn->insert_id>0){
        return $conn->insert_id;
    }else{
        return false;
    }
        
    }
    public function edit(){

    }
    public function delete(){
    }
    public function retrieve()
    {
        
    }
}

?>