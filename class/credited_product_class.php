<?php

require_once('common_class.php');


class Credit_detail extends Common {
    
    public $cp_id, $order_id, $p_id, $p_rate,$p_quantity;
    public function save(){
        $conn=mysqli_connect('localhost','root','','kitab');
        
        $sql="insert into credited_details(order_id,p_id,p_rate,p_quantity) values('$this->order_id','$this->p_id','$this->p_rate','$this->p_quantity')";
        
        $var=$conn->query($sql);
        if($conn->affected_rows == 1 && $conn->insert_id>0){
            return $conn->insert_id;
        }else{
            return false;
        }
        
    }
    public function edit(){
        $conn=mysqli_connect('localhost','root','','kitab');
        $sql= "update credited_details set order_id='$this->order_id', p_id='$this->p_id', p_rate='$this->p_rate', p_quantity='$this->p_quantity' where cp_id='$this->cp_id'";
        $conn->query($sql);
        if($conn->affected_rows == 1){
            return $this->cp_id;
        }else{
            return false;
        }
    }
    public function delete(){
        $conn=mysqli_connect('localhost','root','','kitab');
        $sql="delete  from credit where id='$this->cp_id' ";
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
        $sql="select c.*,p.*,cd.* from credit c, product p,credited_details cd where cd.order_id=c.id and cd.p_id=p.p_id and c.id='$this->order_id'";
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
        $sql="select p.*,cd.* from product p,credited_details cd where cd.p_id=p.p_id and cd.cp_id='$this->cp_id'"; 
        $var=$conn->query($sql);
        if($var->num_rows>0){
            $data=$var->fetch_object();
            return $data;
        }else{
            return [ ];
        }
    }
}

?>