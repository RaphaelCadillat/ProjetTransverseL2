<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
        <title>Social Network</title>
        
    </head>
    <body>
        <p>Vous etes sur la page d'identification !</p>

        <form action="" method="post">

            <div>
            <input id="email" type="email" name="mail_user" placeholder="Email" required="required">
            </div><br>

            <div>
            <input id="password" type="password" name="pass_user" placeholder="Password" required="required">
            </div><br>

            <a href="signup.php">Pas encore inscrit ?</a><br><br>

            <button id="signin" name="sign_in">Sign In</button>
            <?php include("verify_log_user.php"); ?>

        </form>

    </body>
</html>