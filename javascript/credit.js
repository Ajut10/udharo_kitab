$(document).ready(function() {
    $(document).on("click",".proced",function(){
        var quantityInput= $('.qty').val();
        var custname = $('#cust_name').val();
        var cust_id = $("#cust_id").val();
        var cust_phone = $("#cust_phone").val();

        
        if(custname == ""){
            alert("custname is required");
            console.log("prod");
            return false;
        }else if(quantityInput=""){
            alert("enter the items");
            return false;
        }
        
       
     
    });
  
    
    
});