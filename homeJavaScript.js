function showLoginDiv(){
    document.getElementById('topDiv').style.display = "block"; //enable the topDiv display to block & bottomDiv to none (not visible) 
    document.getElementById('bottomDiv').style.display = "none";
     
      
}
function showSignUpDiv(){
    document.getElementById('signUpDiv').style.display = "block";
    document.getElementById('topDiv').style.display = "none";
}

function reShowLoginDiv(){
    document.getElementById('signUpDiv').style.display = "none";
    document.getElementById('topDiv').style.display = "block";
}

function reShowBottomDiv(){
    
    document.getElementById('topDiv').style.display = "none";
    document.getElementById('bottomDiv').style.display = "block";
    
}

function checkPass() {
    
    // passwords into variables
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    var message = document.getElementById("confirmMessage");
   
    // Colors for match and no match
    var matchColor = "#66cc66";
    var noMatchColor = "#ff6666";
    
    // Compare the values
    if (pass1.value == pass2.value) {
        
        // The passwords match
        pass2.style.backgroundColor = matchColor;
        message.style.color = matchColor;
        message.innerHTML = "Passwords Match!";
        
        // Enable submit button
        document.getElementById('submit').disabled = false;
        
    } else {
        
        // The passwords do not match
        pass2.style.backgroundColor = noMatchColor;
        message.style.color = noMatchColor;
        message.innerHTML = "Passwords Do Not Match!";
        
        // Disable submit button
        document.getElementById('submit').disabled = true;
    }
}



