<?php
require 'session_util.php';
ini_php_session();
is_logged($_SESSION['mail_user'], $_SESSION['password_user']);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
        <title>Social Network</title>
        
    </head>

    <body>
        <p>Vous etes sur la homepage</p>
<<<<<<< Updated upstream
        
=======

        
        <a href="profile.php">Voulez vous modifier votre compte ?</a><br><br>

>>>>>>> Stashed changes
    </body>
</html>

