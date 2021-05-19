<?php
include("Model/index_next.php");
require 'Model/session_util.php';
ini_php_session();
free_php_session();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
        <title>Social Network</title>
        <link rel="stylesheet"href="View/Styles/index.css" />
    </head>
    <body>

        <h1>Welcome !</h1>
        


        
        <form method="post" action="">

            <button name="signin" id="signin" name="signin" action="View/Pages/signin.php">Sign In</button><br>
            

            <button name="signup" id="signup" name="signup" action="View/Pages/signup.php">Sign Up</button><br>
            
        </form><br>
        
        <img src="image/logo.png" alt="logo Studint">

    </body>
</html>
