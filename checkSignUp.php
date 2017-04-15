<?php
echo "Check Point 1<br>";
if (isset($_POST['submit'])) {
    
    // Make variables of input data:
    session_start();
    $fname = filter_input(INPUT_POST, 'fname');
    $lname = filter_input(INPUT_POST, 'lname');
    $email = strtolower(filter_input(INPUT_POST, 'email')); // To lowercase
    $password = filter_input(INPUT_POST, 'password');
    $confPassword = filter_input(INPUT_POST, 'confPassword');
    $_SESSION["error"] = 0;
    
    //connect to server and select database
    $mysqli = mysqli_connect("localhost", "root", "letmein", "finalProject");
    echo "Check Point 2<br>";
    echo $fname." ".$lname." ".$email." ".$password."<br>";

//             Error checking block
// ===========================================================================================================//
    
    // Check for errors before proceeding any further
    // Check if the email is already existing
    $sql = "SELECT * FROM users WHERE email = '".$email."'";    
    $result = mysqli_query($mysqli, $sql);
    if(!$result){
        printf("error: %s \n", mysqli_error($mysqli));
    }
    echo "Check Point 3<br>";
    // If a row is found, the email already exists
    if (mysqli_num_rows($result) == 1) {
        echo "The email address \"$email\" is already in use, try again!";
        $_SESSION["error"] = 102;
        header('Location: userCreated.php');
        exit;
    }
        
    // Check if user typed in some spaces/whitespace
    if (preg_match("/\s/", $fname) || preg_match("/\s/", $lname) || preg_match("/\s/", $email)) {
        // One of the fields contains whitespace(spaces)
        $_SESSION["error"] = 103; 
        header('Location: userCreated.php');
        exit;
    }
        
    // Check if user typed in valid email
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        $_SESSION["error"] = 104; 
        header('Location: userCreated.php');
        exit;
    }
        
    // Check if passwords match (not necessary)
    if ($password != $confPassword) {
        echo "The passwords do not match!";
        $_SESSION["error"] = 101;
        header('Location: userCreated.php');
        exit;
    }
    
    // Check if password is 6 characters or more
    if (strlen($password) < 6) {
        $_SESSION["error"] = 105;
        header('Location: userCreated.php');
        exit;
    }
    
//===========================================================================================================//
   
    // No errors found if this point is reached.
    // Create sql code to insert new user data.
    $sql = "INSERT INTO users 
           (firstname, lastname, email, password)
            VALUES ('$fname', '$lname', '$email', PASSWORD('$password'))";
        
    // Try inserting the new data.
    if (mysqli_query($mysqli, $sql)) { // If true, new record succesfully created
            
        // Create the new user directory
        mkdir("/var/www/html/Final/uploaddir/$email", 0777);
            
        // Create the user folders for images and text.
        mkdir("/var/www/html/Final/uploaddir/$email/images", 0777);
        mkdir("/var/www/html/Final/uploaddir/$email/PHP", 0777);       
            
        // link to success screen.
        header('Location: userCreated.php');
        exit;
            
    } else {
        // SQL error occurs with data, will print out error. 
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
        exit;
    }
    
}

