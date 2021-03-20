<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
        <title>Social Network</title>
        <link rel="stylesheet"href="index.css" />
    </head>
    <body>

        <h1>Bienvenue !</h1>
        <form method="post" action="">

            <button name="signin" id="signin" name="signin" action="signin.php">Sign In</button><br>
            <?php
                if(isset($_POST['signin']))
                {
                    echo "<script>window.open('signin.php','_self')</script>";
                }
            ?>

            <button name="signup" id="signup" name="signup" action="signup.php">Sign Up</button><br>
            <?php
                if(isset($_POST['signup']))
                {
                    echo "<script>window.open('signup.php','_self')</script>";
                }
            ?>
        </form>

    </body>
</html>