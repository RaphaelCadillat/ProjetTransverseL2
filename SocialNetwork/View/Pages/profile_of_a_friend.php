<?php
require '../../Model/connection.php';
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

include("../../Model/delete_user.php");

$id_user_to_show= $_GET['id_user_to_show'];

try{
    $option = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    //Preparation des requetes PDO
    $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);

    //Recup user
    $req_friend_to_show = $PDO->prepare('SELECT * FROM user_table WHERE id_user=?');
    $req_friend_to_show->bindValue(1, $id_user_to_show);
    $req_friend_to_show->execute();
    $friend_to_show = $req_friend_to_show->fetch();

    //Recup lang_user
    $req_lang_friend = $PDO->prepare('SELECT * FROM rel_user_lang WHERE id_user=?');
    $req_lang_friend->bindValue(1, $id_user_to_show);
    $req_lang_friend->execute();
    $lang_friend = $req_lang_friend->fetch();


    $req_lang = $PDO->prepare('SELECT * FROM lang_table WHERE id_lang=?');
    $req_lang->bindValue(1, $lang_friend['id_lang']);
    $req_lang->execute();
    $lang = $req_lang->fetch();
    
}

catch(PDOException $pe){
    echo 'ERREUR : '.$pe->getMessage();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
        <link rel="stylesheet" href="../Styles/Style.css" />
        <title>Social Network</title>
        
    </head>
    <body>
        <?php include('navigation_bar.php') ?>
        <div class= "body">
        <form class="profil" action="" method="post">
            <div>
                <img src="../../image/pp.png" alt="photo de profil" id="pp">
            </div>

            <div>
            <p>First Name :</p>
            <input class='objet' id="fname" name="f_name" value="<?php echo htmlspecialchars($friend_to_show['fname_user']) ?>" disabled>
            </div>
            

            <div>
            <p>Last Name :</p>
            <input class='objet' id="lname" name="l_name" value="<?php echo htmlspecialchars($friend_to_show['lname_user']) ?>" disabled>
            </div>
            
            <div>
            <p>Mail :</p>
            <input  class='objet' id="email" name="mail_user" value="<?php echo htmlspecialchars($friend_to_show['mail_user']) ?>" disabled>
            </div>
           
            
            <div>
            <p>Language :</p>
            <input class='objet' id="userlang" name="user_lang" value="<?php echo htmlspecialchars($lang['lang_lang']) ?>" disabled>
            </div>
           

            <div>
            <p>University :</p>
            <input class='objet' id="univuser" name="univ_user" value="<?php echo htmlspecialchars($friend_to_show['univ_user']) ?>" disabled>
            </div>
            

            <div>
            <p>Description :</p>
            
            <textarea class='objet' id="statutsuser" name="statuts_user"  disabled><?php echo htmlspecialchars($friend_to_show['statuts_user']) ?></textarea>
            </div>
            

            <div>
            <button  class="b_profile" id="changep" name="back_p" type="submit" formaction="friends.php">Go to your friends list </button>
            </div>
            <div>
            <button  class="b_profile" id="changep" name="back_p" type="submit" formaction="list_event.php">Go to the event list </button>
            </div>
            
           

        </form>
        <br> <br>
        </div>
    </body>
</html>