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
        <link rel="stylesheet" href="../Styles/navbar_friends.css" />
        <title>Social Network</title>
    </head>

    <body>
        <?php include('navigation_bar.php');
        try{
            $option = [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
        
            //Preparation des requetes PDO
            $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);

            $relfriends = $PDO->prepare("SELECT * FROM req_friends WHERE id_req_from = :username_1 OR id_req_to = :username_2");
            $relfriends->execute([
                "username_1" => $id_user,
                "username_2" => $id_user
            ]);

            $data_relfriends = $relfriends->fetchAll();
        }
        catch(PDOException $pe){
            echo 'ERREUR : '.$pe->getMessage();
        }
        ?>
        <nav id="friendnav">
            <ul id="fnav">
                <li><a href="friends.php">Amis</a></li>
                <li><a href="waiting_request.php">Demande en attente</a></li>
                <li><a href="friends.php">Rechercher un ami</a></li>
            </ul>
        </nav>
        <br>

        <!-- html liste d'amis -->


        <?php
        for($i=0;$i<sizeof($data_relfriends);$i++){
            if($data_relfriends[$i]['id_req_from'] == $id_user && $data_relfriends[$i]['req_statuts'] == 0){

                $print_username_friend = $PDO->prepare("SELECT * FROM user_table WHERE id_user = :id_user");
                $print_username_friend->execute([
                    "id_user" => $data_relfriends[$i]['id_req_to']
                ]);
                $username_friend = $print_username_friend->fetch();

                $id_req = $data_relfriends[$i]['id_req'];
                echo '<p class="friends">'.$username_friend["fname_user"]." ".$username_friend["lname_user"].'</p>';
                echo "<a href='../../Controller/supp_friend.php?id_req=".$id_req."'>Delete</a>";
            }

            if( $data_relfriends[$i]['id_req_to'] == $id_user && $data_relfriends[$i]['req_statuts'] == 0){

                $print_username_friend = $PDO->prepare("SELECT * FROM user_table WHERE id_user = :id_user");
                $print_username_friend->execute([
                    "id_user" => $data_relfriends[$i]['id_req_from']
                ]);
                $username_friend = $print_username_friend->fetch();
                $id_req = $data_relfriends[$i]['id_req'];
                echo '<p class="friends">'.$username_friend["fname_user"]." ".$username_friend["lname_user"].'</p>';
                echo "<a href='../../Controller/supp_friend.php?id_req=".$id_req."'>Delete</a>";
            }
        }
        ?>
    </body>
</html>
