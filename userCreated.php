<?php 
session_start();
// Check if any error occured:
if ($_SESSION["error"] == 0) { // No errors found
    $SignUpStateMSG = "Your account has sucsessfully been made!";
} 
else if ($_SESSION["error"] == 101) {
    // Not actually needed since submit button is disabled if passwords aren't matching.
    $SignUpStateMSG = "ERROR 101: Your passwords did not match! Please try again.";
} 
else if ($_SESSION["error"] == 102) {
    $SignUpStateMSG = "ERROR 102: An account with that email already exists!";
} 
else if ($_SESSION["error"] == 103) {
    $SignUpStateMSG = "ERROR 103: One of your fields contained whitespace, please try again!";
} 
else if ($_SESSION["error"] == 104) {
    $SignUpStateMSG = "ERROR 104: The email does not follow the correct email criteria, please try again!";
}
else if ($_SESSION["error"] == 105) {
    $SignUpStateMSG = "ERROR 105: Your password should be at least 6 characters long, please enter a new one!";
}
?>

<html>
    <head>  
        <title>Sign Up Results</title>
        <link rel="stylesheet" type="text/css" href="homeCSS.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">    
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
    </head>
    <body>
        <div class="background-image" id="background-image2"></div>
        <div class="content">
            <div class="signUpResultDiv">
                <h2>Sign Up Status: </h2>
                <h4><?php echo $SignUpStateMSG; ?></h4>
                <a href="homePHP.php"><button class="directHome">Go Back</button></a>
            </div>
        </div>     
    </body>
</html>

