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
    <br>
        <p>Veuillez vous inscrire si vous n'avez pas encore de compte !</p>
        <form class="objet" action="" method="post">
        <strong > First Name : </strong>
            <div>
            <input class="objet" type="text" name="fname_user" placeholder="First Name" required="required">
            </div>
            <strong > Last Name : </strong>
            <div>
            <input class="objet" type="text" name="lname_user" placeholder="Last Name" required="required">
            </div>
            <strong > Password : </strong>
            <div>
            <input class="objet" id="password" type="password" name="pass_user" placeholder="Password" required="required">
            </div>
            <strong > Verify Password : </strong>
            <div>
            <input class="objet" id="verif_pass_user" type="password" name="verif_pass_user" placeholder="Verify Password" required="required">
            </div>
            <strong > Email : </strong>
            <div>
            <input class="objet" id="email" type="email" name="mail_user" placeholder="Email" required="required">
            </div>
            <strong > University : </strong>
            <div>
            <input class="objet" type="text" name="univ_user" placeholder="University" required="required">
            </div>
            <strong > Language : </strong>
            <div>
            <select class="objet" name="lang_user" required="required">
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
            </div>

            <a class="objet" href="signin.php">Déjà inscrit ?</a>

            <button class="objet" id="signup" name="sign_up">Sign Up</button>
            <?php include("../../Controller/insert_user.php"); ?>
            <br>
        </form>
    </div>
    </body>
</html>