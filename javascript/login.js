function validation(){
  
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    if(email ==""){
      
        document.getElementById("emailerror").innerHTML = "*Please enter your email ";
        
        return false;
    }else{
        var emailcheck= /^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/;
        if(emailcheck.test(email)){
    
            document.getElementById("emailerror").innerHTML = "" ;
            
            
        }else{
            document.getElementById("emailerror").innerHTML = "*Please enter a valid email address";
            
            return false;
        }
        
        
        
    }
    if(password==""){
        document.getElementById("passworderror").innerHTML = "*Please enter your password";
        return false;
    }
}