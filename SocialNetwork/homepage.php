<?php
require 'session_util.php';
ini_php_session();
$id_user = $_SESSION['id_user'];
$id_admin = $_SESSION['id_admin'];
$fname_user = $_SESSION['fname_user'];
$lname_user = $_SESSION['lname_user'];
$mail_user = $_SESSION['mail_user'];
$reg_date_user = $_SESSION['reg_date_user'];
$univ_user = $_SESSION['univ_user'];
$statuts_user = $_SESSION['statuts_user'];
$hash_user = $_SESSION['password_user'];
$id_lang_user = $_SESSION['id_lang_user'];
$lang_user = $_SESSION['lang_user'];

$is_logged = is_logged($mail_user, $hash_user);
if ($is_logged == false)
{
    echo "<script>window.open('index.php','_self')</script>";
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
        <link rel="stylesheet" href="Style.css" />
        <div>
        <button id="profile" name="profile" type="submit" formaction="profile.php"> Profile </button>
        </div>
        <div>
        <button id="logout" name="log_out" type="submit" formaction="logout.php"> Log Out </button>
        </div>
        <div>
        <button id="friends" name="friends" type="submit" formaction="friends.php"> Friends </button>
        </div>
        <br>
        <br>
        <title>Social Network</title>
        
    </head>

    <body>
        <p>Vous etes sur la homepage</p>
        
        <a href="profile.php">Voulez vous modifier votre compte ?</a><br><br>

        <form action="" method="post">
            <button name="logout" id="logout" name="logout" action="">Log Out</button><br>
            <?php include ("logout.php"); ?>
        </form>

    </body>
</html>