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
        <link rel="stylesheet" href="../Styles/friends.css" />
        <link rel="stylesheet" href="../Styles/Style.css" />
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

            $relfriends = $PDO->prepare("SELECT * FROM req_friends WHERE id_req_from = :username_1 OR id_req_to = :username_2");  //id_from id_to 1 -> 0
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
        <div class="body">
        <br>
        <nav id="waiting_friendnav">
            <ul id="fnav">
                <li><a href="friends.php">Amis</a></li>
                <li><a href="waiting_request.php">Demande en attente</a></li>
                <li><a href="friends.php">Rechercher un ami</a></li>
            </ul>
        </nav>
        <br>
        <!-- html liste d'attente -->
        <p>Demande envoyée</p>
        <br>
        <div class="envoi">
        <div class="demande">
        <?php
        //demande envoyé
        for($i=0;$i<sizeof($data_relfriends);$i++){
            if($data_relfriends[$i]['id_req_from'] == $id_user && $data_relfriends[$i]['req_statuts'] == 1){

                $print_waiting_friend = $PDO->prepare("SELECT * FROM user_table WHERE id_user = :id_user");
                $print_waiting_friend->execute([
                    "id_user" => $data_relfriends[$i]['id_req_to']
                ]);
                $username_wait_friend = $print_waiting_friend->fetch();
                
                $id_req = $data_relfriends[$i]['id_req'];

                echo '<p class="waiting_friends">'.$username_wait_friend['fname_user']." ".$username_wait_friend['lname_user'].'</p>';
                echo "<a class='cancel' href='../../Controller/supp_friend.php?id_req=".$id_req."'>Cancel</a>";
            }
            
        }
        ?>
        </div>
        </div>
        <p>Demande reçue</p>
        <br>
        <div class="reception">
        <?php
        //demande reçue
        
        for($i=0;$i<sizeof($data_relfriends);$i++){
            if($data_relfriends[$i]['id_req_to'] == $id_user && $data_relfriends[$i]['req_statuts'] == 1){

                $print_receive_friend = $PDO->prepare("SELECT * FROM user_table WHERE id_user = :id_user");
                $print_receive_friend->execute([
                    "id_user" => $data_relfriends[$i]['id_req_from']
                ]);
                $username_receive_friend = $print_receive_friend->fetch();

                echo '<p class="friends">'.$username_receive_friend['fname_user']." ".$username_receive_friend['lname_user'].'</p>';
                $id_req = $data_relfriends[$i]['id_req'];
                echo "<a class='accept' href='../../Controller/accept_freq.php?id_req=".$id_req."'>Accept</a>";
                echo "<a class='decline' href='../../Controller/supp_friend.php?id_req=".$id_req."'>Decline</a>";
            }     
        }
        
        ?>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
        
    </body>
</html>