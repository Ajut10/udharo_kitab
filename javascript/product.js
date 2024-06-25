function checkproduct(){
    var naMe = document.getElementById("name").value;
    var price = document.getElementById("price").value;
    var status = document.getElementById("status").value;
    var image = document.getElementById("image").value;
    var naer = document.getElementById("nameerror");
    var staer = document.getElementById("statuserror");
    var prier = document.getElementById("priceerror");
    var imgerror = document.getElementById("imageerror");
    if(naMe == ""){
        naer.innerHTML = "*Please enter name";
        return false;
    }else{
        naer.innerHTML ="";
    }
    if(price==""){
        // alert();
        prier.innerHTML = "*Please enter price";
        return false;
    }else if(isNaN(price)){
        prier.innerHTML = "*Please enter vaild price";
        return false;
    }else{
        prier.innerHTML ="";
    }
    if(status==""){
        staer.innerHTML = "*Please enter status";
        return false;
    }else{
        staer.innerHTML ="";

    }
    if(image==""){
        imgerror.innerHTML = "*Please enter image";
        return false;
    
    }
    
}