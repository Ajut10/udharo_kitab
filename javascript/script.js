function validation(){
    var naMe = document.getElementById('name').value;
    var password = document.getElementById('password').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var image = document.getElementById('image').value;
    // / name validation
    var namecheck=/^[a-zA-Z]{3,30}$/;
    if (naMe == ""){
            // alert('Please enter the name'); 
            document.getElementById('nameerror').innerHTML = '*Please enter the name';
        return false;
    }else if (namecheck.test(naMe)==false){
        document.getElementById('nameerror').innerHTML = '*Please enter correct name';
        return false;
        }else{
        document.getElementById('nameerror').innerHTML = '';
        
    }
 
        
    
    
    var emailcheck= /^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/;
    // email validation
    if(email == ""){
        document.getElementById("emailerror").innerHTML = "*Please enter your email ";
        return false;
    }else if(emailcheck.test(email)==false){
        document.getElementById("emailerror").innerHTML = '*Please enter a valid email address';
        return false;    
        
        }else{
            document.getElementById("emailerror").innerHTML = '';
            
    }
    // phone validation
    if(phone ==""){
        document.getElementById('phoneerror').innerHTML = '*Please enter your number ';
        return false;
        
    }else{
        
        var phonecheck=/^[98][0-9]{9}?/;
        if(phonecheck.test(phone)==false){
            
       
            document.getElementById('phoneerror').innerHTML = '*Please enter a valid phone number ';
            return false;
            }else{
            document.getElementById('phoneerror').innerHTML = ' ';

        }
    }
    if(password ==""){
        document.getElementById('passworderror').innerHTML = '*Please enter your password ';
        return false;
        
    }  else{
        document.getElementById('passworderror').innerHTML ='';
    }
    
    if(image==""){
        document.getElementById('imgerror').innerHTML = '*Please select an image';
        return false;
    }
   
}
