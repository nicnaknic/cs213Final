<?php
if (isset($_POST['submit'])) {
     session_start();
    // Make variables of input data:
    $targetUsername = strtolower(filter_input(INPUT_POST, 'username')); // To lowercase
    $targetPassword = filter_input(INPUT_POST, 'password');
    $_SESSION["email"] = $targetUsername;  
    
    //connect to server and select database
    $mysqli = mysqli_connect("localhost", "root", "letmein", "finalProject");
    
    // Check if user exists:
    $sql = "SELECT email, password FROM users WHERE email = '".$targetUsername.
        "' AND password = PASSWORD('".$targetPassword."')";   
    $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
  
    // If a row is found, authorizing is true.
    if (mysqli_num_rows($result) == 1) {
        // Match! Redirect to page. 
        header("Location: imagePage.php");
        exit;
        
    } else {
        // No match, return to login screen.
        echo "The passwords does not match!";
        header('Location: homePHP.php');
        exit;
    }    
     
}
?>

