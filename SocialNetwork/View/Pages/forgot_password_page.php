<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
        <link rel="stylesheet" href="../Styles/Style.css" />
        <title>Social Network</title>
    </head>
    <body>
    <div class="page">
        <form id="mdp_forms" action="../../Controller/forgot_password/resetpassword.php" method ="post">
        <div class="oubli_mdp">
            <p class="objet">Veuillez entrer votre email pour récupérer votre mot de passe !</p>
            <input type="email" class="objet" name="email" placeholder="Email">
            <input type="submit" class="objet" id="oubli_mail" name="forgotpassword" value="Request Password"/><br>
            <a href="signin.php">Connexion ?</a><br>
            
        </div>
        </form>
</div>
        
        

        
    </body>
</html>