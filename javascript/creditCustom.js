
$(document).ready(function() {
    $(document).on('click','.increment',function(){
        var $quantityInput= $(this).closest('.qtyBox').find('.qty');
        var productId=$(this).closest('.qtyBox').find('.prodId').val();
        var currentvalue = parseInt($quantityInput.val());
       
   
        if(!isNaN(currentvalue)){
            var qtyVal= currentvalue + 1;
            
            $quantityInput.val(qtyVal);
            quantityInDec(productId,qtyVal);
            
        }
    });
    $(document).on('click','.decrement',function(){
        
        var $quantityInput= $(this).closest('.qtyBox').find('.qty');
        var productId=$(this).closest('.qtyBox').find('.prodId').val();
        var currentvalue = parseInt($quantityInput.val());
        
        if(!isNaN(currentvalue) && currentvalue>1){
            var qtyVal= currentvalue - 1;
            $quantityInput.val(qtyVal);
            quantityInDec(productId,qtyVal);
            
        }
    });
    function quantityInDec(prodId, qty){
        $.ajax({
            type:"POST",
            url:"product.php",
            data:{
                'productInDec':true,
                'product_id':prodId,
                'quantity':qty
            },
            success:function(response){
                var res =JSON.parse(response);
                
                if(res.success==200){
                    // document.write("done");
                    alert("fail");
                }else{
                    window.location.reload();
                    console.log(res);
                }
        }
    });
    }
    $(document).on("click",".proced",function(){
       
        var custname = $('#cust_name').val();
        var cust_id = $("#cust_id").val();
        var cust_phone = $("#cust_phone").val();

        
        if(custname == ""){
            alert("custname is required");
            console.log("prod");
            return false;
        }
        
        
        // $.ajax({
        //     type: "POST",
        //     url: "product.php",
        //     data: {
        //         "procedbtn":true,
        //         "cust_name": custname,
        //         "cust_phone": cust_phone,
        //     },
          
        //     sucess: function(response){
        //         var res =JSON.parse(response);
        //         console.log(res);
        //         if(res.status==200){
        //             alert("done");
                    // location.href="summary.php";
        //         }
        //         else if(res.status==404){
        //             alert("error");
        //         }
        //         alert(res);
        //     }
        // });
    });
  
   
    $(document).on('click','#saveCredit',function(){
        
        $.ajax({
            type: "POST",
            url:"product.php",
            data:{
                "saveCredit":true
            },
            success: function(response){
                var res = JSON.parse(response);
                if(res.status==200){
                    alert("done");
                    window.location.href="customer.php"
                    console.log(res);
                }else{
                    alert("error");
                }
                alert("done vayo");
            }
            
        });
    });
    
    
});