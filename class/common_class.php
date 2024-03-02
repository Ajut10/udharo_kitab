<?php

abstract class Common{
    abstract function save();
    abstract function retrieve();
    abstract function delete();
    abstract function edit();
    
    public function set($key,$value){
        $this->$key=$this->validate($value);
    }
    
    public function validate($value){
        $val=htmlspecialchars($value);
        $conn=mysqli_connect('localhost','root','','kitab');
        $newValue=$conn->real_escape_string($val);
        return $newValue;
    }
}

?>