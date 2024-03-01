<?php

require_once('common_class.php');

class User extends Common{
    public $id,$name,$email,$password,$phone,$user_type,$date;

    public function retrieve(){
        $conn=mysqli_connect('localhost','root','','kitab');
        $sql="select * from user";
        $var=$conn->query($sql);
        if($var->num_rows>0){
        $dataList=$var->fetch_all(MYSQLI_ASSOC)  ;
        return $dataList;
        }else{
            return false;
        }


        
    }
    public function save(){}
    public function delete(){}
    public function edit(){}

}





?>