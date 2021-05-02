<?php
require '../../Model/session_util.php';
require '../../Model/connection.php';
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
        <div class="body">
        <br> 
        <nav id="eventnav">
            <ul id="enav">
                <li><a href="create_event.php">Créer un event</a></li>
                <li><a href="list_event.php">Tous les events</a></li>
                <li><a href="friends_event.php">Event des amis</a></li>
            </ul>
        </nav>
        <br>

        <?php
        try{
            $option = [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            //Preparation des requetes PDO
            $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);

            $allevents = $PDO->prepare("SELECT * FROM events_table");
            $allevents->execute();

            $data_allevents = $allevents->fetchAll();

        }

        
        catch(PDOException $pe){
            echo 'ERREUR : '.$pe->getMessage();
        }

        for($i=0;$i<sizeof($data_allevents);$i++){
            echo '<div>';
            echo '<p>Event Name :</p>';
            echo '<input id="eventname" name="event_name" value=" '. $data_allevents[$i]["name_event"] .' " disabled>';
            echo '</div>
                    <br>';

            echo '<div>
            <p>Event date :</p>
            <input type="text" id="eventdate" name="event_date" value=" '. $data_allevents[$i]["date_event"] .' " disabled>
            <br>
            <p>Event hour :</p>
            <input type="text" id="eventdate" name="event_hour" value=" '. $data_allevents[$i]["hour_event"] .' " disabled>
            </div>
            <br>';

            echo '<div>
            <p>Description :</p>
            <textarea id="descriptionevent" name="description_event" disabled>'. $data_allevents[$i]["info_event"] .'</textarea>
            </div>
            <br>';

            $host = $PDO->prepare('SELECT * FROM user_table WHERE id_user=?');
            $host->bindValue(1, $data_allevents[$i]["id_user"]);
            $host->execute();

            $data_host = $host->fetchAll();

            echo '<div>
            <p>Host :</p>
            <input type="text" id="hostevent" name="host_event" value=" '. $data_host[0]["fname_user"] . ' ' .$data_host[0]["lname_user"] . ' " disabled>
            </div>
            <br>';
            echo '<br>';
        }

        ?>

    </body>
</html>