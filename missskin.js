function validateRegister(){
    var fullname=document.getElementById('fullname').value
    var username=document.getElementById('username').value
    var email=document.getElementById('email').value
    var password=document.getElementById('password').value

    var fullnameRegex = /^[a-zA-Z\s]+$/;
    if(!fullnameRegex.test(fullname)){
        alert('Please enter a valid name.')
        return false;

    }
    var usernameRegex = /^[a-zA-Z]+$/;
    if(!usernameRegex.test(username)){
        alert('Please enter a valid username.')
        return false;
    }
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(!emailRegex.test(email)){
        alert('Please enter a valid email.')
        return false;
    }
    
    if(password.length<8){
        alert('Password must be at least 8 characters. ');
        return false;
    }


  }
  




function validateLogin(){
    var loginUsername=document.getElementById('loginUsername').value
    var loginPassword=document.getElementById('loginPassword').value

    if(loginUsername == ""){
        alert('Please enter a username.');
        return false;
    }
    
    if(loginPassword == ""){
        alert('Please enter a password.');
        return false;
    }

    if(loginUsername !== username && loginPassword !== password){
        alert('Incorrect username or password.');
        return false;
    }
    
}