<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
        <title>Social Network</title>
        
    </head>
    <body>
        <p>Vous etes sur la page de modification de votre compte !</p>

        <form action="" method="post">

            <div>
            <p> Name </p>  <button id="username" name="user_name">Modifier</button>

            <div>
            <input id="password" type="password" name="pass_user" placeholder="Password" required="required">
            </div><br>

            <a href="signup.php">Pas encore inscrit ?</a><br><br>

            <button id="signin" name="sign_in">Sign In</button>
            <?php include("verify_log_user.php"); ?>

        </form>

    </body>
</html>