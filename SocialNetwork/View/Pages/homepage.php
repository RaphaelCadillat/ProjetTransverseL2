<?php
require '../../Model/session_util.php';
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
    echo "<script>window.open('../../index.php','_self')</script>";
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
        <link rel="stylesheet" href="../Styles/Style.css" />
        <form action="profile.php">
            <button id="profile" name="profile" type="submit"> Profile </button>
        </form>
        <div class="friend_button">
        <form action="friends.php">
            <button id="friends" name="friends" type="submit"> Friends </button>
        </form>
        </div>
        <form action="" method="post">
            <button name="logout" id="logout" action="">Log out</button><br>
            <?php include ("../../Model/logout.php"); ?>
        </form>

        <br>
        <title>Social Network</title>
        <link rel="stylesheet"href="../Styles/homepage.css" />
    </head>

    <body>
        <p>Vous êtes sur la homepage</p>
        <div class= "lienhypertext">
        <a href="profile.php">Voulez vous modifier votre compte ?</a><br><br>
        </div>
    </body>
</html>