// var name = document.getElementById('name').value;
var password = document.getElementById('password').value;
var email = document.getElementById('email').value;
// var phone = document.getElementById('phone').value;
function validation(){
    
    
    //    alert(email);
    
    // name validation
    // if (name == ""){
    //         // alert('Please enter the name'); 
    //         document.getElementById('alert1').innerHTML = 'Please enter the name';
    //     return false;
    // }else {
    //         var namecheck=/^[a-zA-Z]+ [a-zA-Z]+$/;
    //         if (namecheck.test(name)){
    //             //    return true;
    //             }else{
                
    //                     document.getElementById('alert1').innerHTML = 'Please enter correct name';
    //                     return false;
    //     }
    
    // }
    
    // email validation
    if(email ==""){
        document.getElementById("emailerror").innerHTML = "*Please enter your email ";
        // alert("enter your email");
        return false;
    }else{
        var emailcheck= /^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/;
        if(emailcheck.match(email)){

            document.getElementById('emailerror').innerHTML = '';
            // return true;
            
        }else{
            document.getElementById('emailerror').innerHTML = '*Please enter a valid email address';
            
            return false;
        }
        
        
        
    }
    
    // phone validation
    if(phone ==""){
        document.getElementById('alert1').innerHTML = 'Please enter your number ';
        return false;
        
    }else{
        
        var phonecheck=/^[98][0-9]{9}?/;
        if(phonecheck.test(phone)){
            
        }else{
            document.getElementById('alert1').innerHTML = 'Please enter a valid phone number ';
            return false;
        }
    }
}