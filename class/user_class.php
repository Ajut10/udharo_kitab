<?php

require_once('common_class.php');

class User extends Common{
    public $id,$name,$email,$password,$phone,$user_type,$date;

    public function retrieve(){
        $conn=mysqli_connect('localhost','root','','kitab');
        $sql="select * from user where verify_status = 1";
        $var=$conn->query($sql);
        if($var->num_rows>0){
        $dataList=$var->fetch_all(MYSQLI_ASSOC)  ;
        return $dataList;
        }else{
            return false;
        }


        
    }
    public function save(){}
    public function delete(){
        $conn=mysqli_connect('localhost','root','','kitab');
        $sql="delete  from user where u_id='$this->id' ";
        $var=$conn->query($sql);

        if($var){
            return "success";
        }else{
            return "failed";
        }
    }
    public function edit(){

    }
    function getById(){
        $conn=mysqli_connect('localhost','root','','kitab');
        $sql="select * from user where u_id='$this->id' ";
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