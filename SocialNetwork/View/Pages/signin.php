<?php
require '../../Model/session_util.php';
ini_php_session();
free_php_session();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
        <title>Social Network</title>
        <link rel="stylesheet"href="../Styles/signin.css" />
    </head>
    <body>
        <div class="formulaire">
        <p>Vous etes sur la page d'identification !</p>
        <form action="" method="post">
       <strong > Email : </strong><br>
            <div>
            
            <input id="email" type="email" name="mail_user" placeholder="Email" required="required">
            </div><br>
            <strong>Password :</strong><br>
            <div>
            
            <input id="password" type="password" name="pass_user" placeholder="Password" required="required">
            </div><br>

            <a href="forgot_password_page.php">Forgot password ?</a><br>
            <a href="signup.php">Pas encore inscrit ?</a><br><br>

            <button id="signin" name="sign_in">Sign In</button>
            <?php include("../../Model/verify_log_user.php"); ?>
            <br>

        </form>
        </div>

    </body>
</html>