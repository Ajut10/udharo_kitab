<?php

require_once('common_class.php');


class Credit extends Common {
    
    public $id,$customer_id,$invoice_no,$total_amount,$status,$credited_date;
    public function save(){
        $conn=mysqli_connect('localhost','root','','kitab');
        
        $sql="insert into credit(customer_id,credit_no,total_amount,credited_date,status) values('$this->customer_id','$this->invoice_no','$this->total_amount','$this->credited_date','$this->status')";
        
        $var=$conn->query($sql);
        if($conn->affected_rows == 1 && $conn->insert_id>0){
            return $conn->insert_id;
        }else{
            return false;
        }
        
    }
    public function edit(){
        $conn=mysqli_connect('localhost','root','','kitab');
        
        

    }
    public function delete(){
        $conn=mysqli_connect('localhost','root','','kitab');
        $sql="delete  from credit where id='$this->id' ";
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
        $sql="select c.*,u.* from credit c, user u where u.u_id=c.customer_id order by c.id desc";
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
        $sql="select c.*,u.* from credit c, user u where u.u_id=c.customer_id and c.id='$this->id' order by c.id desc ";
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