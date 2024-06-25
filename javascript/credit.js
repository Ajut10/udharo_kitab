$(document).ready(function() {
    $(document).on("click",".proced",function(){
        var quantityInput= $('.qty').val();
        var custname = $('#cust_name').val();
       

        
        if(custname == ""){
            document.getElementById("errorcust").innerHTML="Please enter customer name";
            // console.log("prod");
            return false;
        }else if(quantityInput=""){
            alert("enter the items");
            return false;
        }
        
       
     
    });
  
    
    
});