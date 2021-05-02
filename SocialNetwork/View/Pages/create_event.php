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

require '../../Controller/events/insert_event.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
        <link rel="stylesheet" href="../Styles/Style.css" />
        <link rel="stylesheet" href="../Styles/events.css" />
        <title>Social Network</title>
        
    </head>
    <body>
        <?php include('navigation_bar.php') ?>
        <nav id="eventnav">
            <ul id="enav">
                <li><a href="create_event.php">Créer un event</a></li>
                <li><a href="list_event.php">Tous les events</a></li>
                <li><a href="friends_event.php">Event des amis</a></li>
            </ul>
        </nav>
        <br>
        <form action="" method="post">

            <div>
            <p>Event Name :</p>
            <input id="eventname" name="event_name">
            </div>
            <br>

            <div>
            <p>Date de l'event :</p>
            <input type="date" id="eventdate" name="event_date">
            <br>
            <p>Heure de l'event :</p>
            <input type="time" id="eventdate" name="event_hour">
            </div>
            <br>

            <div>
            <p>Description :</p>
            <br>
            <textarea id="descriptionevent" name="description_event"></textarea>
            </div>

            <br>
            <div>
            <button type="submit" name="submit_event">Create event</button>
            <br>


    </body>
</html>
