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
        <link rel="stylesheet"href="../Styles/signup.css" />
    </head>
    <body>
    <div class ="inscription">
        <p>Vous êtes sur la page d'inscription !</p>
        <form action="" method="post">
        <strong > First Name : </strong><br>
            <div>
            <input type="text" name="fname_user" placeholder="First Name" required="required">
            </div><br>
            <strong > Last Name : </strong><br>
            <div>
            <input type="text" name="lname_user" placeholder="Last Name" required="required">
            </div><br>
            <strong > Password : </strong><br>
            <div>
            <input id="password" type="password" name="pass_user" placeholder="Password" required="required">
            </div><br>
            <strong > Verify Password : </strong><br>
            <div>
            <input id="verif_pass_user" type="password" name="verif_pass_user" placeholder="Verify Password" required="required">
            </div><br>
            <strong > Email : </strong><br>
            <div>
            <input id="email" type="email" name="mail_user" placeholder="Email" required="required">
            </div><br>
            <strong > University : </strong><br>
            <div>
            <input type="text" name="univ_user" placeholder="University" required="required">
            </div><br>
            <strong > Language : </strong><br>
            <div>
            <select name="lang_user" required="required">
                <option disabled>Select your first language</option>
                <option value=1>English</option>
                <option value=2>French</option>
                <option value=3>Spanish</option>
                <option value=4>Deutch</option>
                <option value=5>Italian</option>
                <option value=6>Portuguese</option>
                <option value=7>Chinese</option>
                <option value=8>Japanese</option>
            </select>
            </div><br>

            <a href="signin.php">Déjà inscrit ?</a><br><br>

            <button id="signup" name="sign_up">Sign Up</button>
            <?php include("../../Controller/insert_user.php"); ?>
        </form>
    </div>
    </body>
</html>