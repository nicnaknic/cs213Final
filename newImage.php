<?php
if (isset($_POST['submit'])) {
    
    
    session_start();
    
    // Declare variables
    $email = $_SESSION["email"]; // Acquire username from session
    $fileName = basename($_FILES['fileName']["name"]);
    $target_dir = "/var/www/html/Final/uploaddir/$email/images/";
    $target_file = $target_dir . basename($_FILES['fileName']["name"]); 
    
    // Attempt to upload:
    if (move_uploaded_file($_FILES['fileName']["tmp_name"], $target_file)) {
        echo "Your file was uploaded";
    } else {
        echo "An error occurred when attempting to upload file...";
    }
       
    $title = filter_input(INPUT_POST, 'title'); //the title from the upload Image form 
    $subject = filter_input(INPUT_POST, 'subject'); //the subject from the upload Image form
    $comment = filter_input(INPUT_POST, 'comment'); //the comments from the upload Image form
    
    $i = 0; //counts how many files are already in the PHP folder
    $phpdir = "/var/www/html/Final/uploaddir/$email/PHP/"; //the directory that all the current .PHP files are in. (the foreach loop will scan this directory and return how many .php files are in it currently)
    $imgdir = "/Final/uploaddir/$email/images/$fileName";
    $scanned_directory = array_diff(scandir($phpdir), array('..', '.')); 
        foreach($scanned_directory as $printOut){
       $i++;
    }
    $newFile = $i + 1 . ".php"; //create the new .php file name to be written to (the current number of files in the PHP file + 1. EX: "4.php"
    
    $newFileContents = "<div class=\"imageContainer\"> 
            		        <h2>$title</h2> 
                                <h4>$subject</h4>
                                <details id=>
                                    <summary>Comments:</summary>
                                    <p>$comment</p> 
                                </details>                               
                                <img id=\"image".($i + 1)."\" src=\"$imgdir\" alt=\"User Image\" onclick=\"expandImg(".($i + 1).")\" style=\"animation-name: none\"/>
                        </div>";
    $file = fopen($phpdir.$newFile, "w") or die("Unable to open file!");
    fwrite($file, $newFileContents);
    fclose($file); 
    
    header("Location: imagePage.php");
     
}
?>
