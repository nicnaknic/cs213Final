<html>
    <head> 
        <title>Welcome</title>
        <link rel="stylesheet" type="text/css" href="homeCSS.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">    
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
    </head>
    <body>
    <script type="text/javascript" src="homeJavaScript.js"></script>   
        <div class="background-image"></div> 
            <div class="content">
                
                <div id="bottomDiv" class="bottomDiv"> 
                    <h1> Welcome to &#60idk?&#62</h1>
                    <img src="logo.png" alt="logo.png" class="logo">
                    <button class="loginButton" id="goToLogin" onclick="showLoginDiv()"><span>To Login </span></button>
                </div>
                
                
                <div id="topDiv" style="Display: none;" class="overlayDiv"> <!--Login div, asks for the username and password, or allows the user to create a new account -->
                    <return onClick="reShowBottomDiv()">[close]</return>
                    <div class="innerOverlayDiv">
                        <h2>Login to your account</h2></br>
                        <div class="overlayDivForm">
                            <form action="checkLogin.php" method="POST">
                                <h3>Email/Username:</h3>
                                <input type="text" name="username" placeholder="Email" required></br></br>
                                <h3>Password:</h3>
                                <input type="password" name="password" placeholder="Password" required></br></br>
                                <input type="submit" name="submit" value="Sign In"class="sub">     
                                <button type="button" class="signUp" onClick="showSignUpDiv()">Sign Up</button>
                            </form> 
                        </div>     
                    </div>
                </div>
                
                
                <div id="signUpDiv" style="Display: none;" class="overlaySignUpDiv"><!--sign up div. Provides the user with a form to sign up -->
                    <return onclick="reShowLoginDiv()">[close]</return>
                    <div class="innerOverlayDiv">
                        <h2>Create New Account</h2></br>
                        <div class="overlayDivForm">
                            <form action='checkSignUp.php' method='post'><!--the form submit will go to a simple php page that tells the user if 
                                                                             sign up failed or worked. Provide a basic button to go back home from this page -->
                                <h3>First Name:</h3>
                                <input type="text" name="fname" placeholder="First name" required>
                                <h3>Last Name:</h3>
                                <input type="text" name="lname"placeholder="Last name" required></br></br></br>
                                
                                <h3>Email Address:</h3>
                                <input type="text" name="email" placeholder="example@domain.com" required></br></br></br>
                                
                                <h3>Password:</h3>
                                <input type="password" name="password" id="pass1" placeholder="Password" required>
                                <h3>Confirm Password:</h3>    
                                <input type="password" name="confPassword" id="pass2" onkeyup="checkPass(); return false;" placeholder="Confirm password"required></br></br>
                                <span id="confirmMessage" class="confirmMessage"></span>
                                <input type="submit" id="submit" name="submit" value="Sign Up"class="sub2">
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
    </body>
</html>
