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
    


});