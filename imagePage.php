






<!--Query the login form POST variables here to make sure that they logged in successfully.  -->







<!--"IF" the login result is successful display the html page below. Otherwise, display a basic html block saying that the login was unsuccessful,
then provide a basic link to the homePHP.php file so they can try and login again
I would consider storing the users name, email, and user directory up here after the user logs in-->

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
    <script src="imagePage.js" type="text/javascript"></script><!--Link to the Javascript used for the pages animations-->
    <link rel="stylesheet" type="text/css" href="imagePage.css"></link><!--Link to the imagePage.css-->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"></link><!--Link to Google Roboto font API-->
</head>
<body>
    <div class="topbar"> <!--All content within the top bar goes within this div-->
        <h1>Welcome to your &#60;idk?&#62; Page!</h1><!--Maybe make the header include the users name (could store that in a variable from a query result-->
        <a href="homePHP.php"><button class="logoutButton">Log Out</button></a><!--Logout button is simply a link to the login page-->
    </div>
    <!--=================================================================================================================================-->
    

    <div class="case"> <!--main div for holding page content--> 
        
        <div id="newImageForm" class="newImageForm" style="display: none; animation-name: hideNewImageForm;"> <!--Form that appears when the newImageButton is pressed. Used to upload new image-->
            <h2>Upload a new Image</h2>
            <button onclick="showNewImageForm()">Close</button>
            <form action="newImage.php" method="POST" enctype = "multipart/form-data"> <!--Form calls itself. Adding a new image should be done from a " if isset" -->
                <h3>Add an Image Title:</h3>
                <input type="text" maxlength="60" name="title" id="imgTitle" placeholder="Title" required/><!--Image title is a required field in the form -->
                <h3>Image Subject:</h3>
                <input type="text" maxlength="40" name="subject" id="imgSubject" placeholder="Subject" required/><!--Image subject is a required field in the form -->
                <h3>Add a comment:</h3>
                <textarea rows="6" cols="58" name="comment" placeholder="Write Something...."></textarea><!--Image comment is an optional field in the form -->
                <label for="newImage"class="fileUpload"><!--Custom button used for uploading an image --> 
                   Upload Image
                </label>
                <input type="file" name="fileName" id="newImage" accept="image/*" required /><!--input type file, only accpets image formats, required field -->                
                <input type="submit" name="submit" class="formSubmit" value="Submit Image" id="formSubmit"  /><!--Form submit. use an if(isset($_POST['formSubmit']) to upload the new image to the users directory -->
            </form>
        </div>
        
        <?php 
        session_start();  
        $email = $_SESSION["email"]; // Acquire username from session
        $phpdir = "/var/www/html/Final/uploaddir/$email/PHP/"; 
        $imageCount = 0;
        
        $scanned_directory = array_diff(scandir($phpdir), array('..', '.')); 
        foreach($scanned_directory as $printOut){
            $imageCount++;
        }
        
        for ($i = $imageCount; $i >= 1; $i--) {
            echo file_get_contents($phpdir.$i.".php");
        }    
        ?>
        
    </div>


    <!--=================================================================================================================================-->

    <a href="#top"><!-- link bracket encases the newImage div at the bottom of the page-->
    <div class="newImageButton" onclick="showNewImageForm()"> <!--No need to touch this. Just the animated "add image" button at the bottom of the page-->
        <div class="buttonContent">+</div> 
    </div>
    </a>
    
</body>
</html>


<!--"ELSE" Put the html page for the failed login down here. I can format the look of the page if needed -->
