var email = document.getElementById('email').value;
function validation(){

    // if(email ==""){
    //     // alert
    //     document.getElementById("emailerror").innerHTML = "*Please enter your email ";
    //     // alert("enter your email");
    //     return false;
    // }else{
        var emailcheck= /^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/;
        if(emailcheck.match(email)){
    
            document.getElementById("emailerror").innerHTML = "" ;
            // return true;
            
        }else{
            document.getElementById("emailerror").innerHTML = "*Please enter a valid email address";
            
            return false;
        }
        
        
        
    // }
}