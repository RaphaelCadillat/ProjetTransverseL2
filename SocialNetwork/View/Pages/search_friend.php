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
        <link rel="stylesheet" href="../Styles/friends.css" />
        <link rel="stylesheet" href="../Styles/Style.css" />
        <title>Social Network</title>
    </head>

    <body>
    <?php include('navigation_bar.php') ?>
        <br>
        <nav id="waiting_friendnav">
            <ul id="fnav">
                <li><a href="friends.php">Amis</a></li>
                <li><a href="waiting_request.php">Demande en attente</a></li>
                <li><a href="search_friend.php">Rechercher un ami</a></li>
            </ul>
        </nav>
        <br>

        <div>
        <form method="POST" action="search_verif.php">
            <input type="email" name="mail_user_to_search" placeholder="" required="required">
            <input type="submit" name="search" value="Search">
        </form>
        </div>

    </body>
</html>