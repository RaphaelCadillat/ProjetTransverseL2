<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
        <title>Social Network</title>
    </head>
    <body>
        <p>Vous êtes sur la page de récupération de mot de passe</p>

        <form action="../../Controller/forgot_password/resetpassword.php" method ="post">
            <div>
            <input type="email" name="email" placeholder="Email"><br>
            <input type="submit" name="forgotpassword" value="Request Password"/><br>
            <a href="signin.php">Connexion ?</a><br>
            
        </form>
    </body>
</html>