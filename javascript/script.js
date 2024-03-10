function validation(){
 
    var name = document.getElementById('name').value;
    var password = document.getElementById('password').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var shop=document.getElementById('shop').value;
    // alert(name);

    // name validation
    if (name == ""){
        // alert('Please enter the name'); 
        document.getElementById('alert1').innerHTML = 'Please enter the name';
        return false;
    }else {
        var namecheck=/^[a-zA-Z]+ [a-zA-Z]+$/;
        if (namecheck.test(name)){
        //    return true;
        }else{
            // alert('Please enter correct name');
            // document.write(name);
            document.getElementById('alert1').innerHTML = 'Please enter correct name';
            return false;
        }
        
    }
    
    // email validation
    if(email == ""){
        document.getElementById('alert1').innerHTML = 'Please enter your email ';
        return false;
    }else{
        var emailcheck= /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
        if(emailcheck.test(email)){
            // return true;
            
        }else{
            document.getElementById('alert1').innerHTML = 'Please enter a valid email address';
            
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