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

include("../../Model/delete_user.php");
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
        <form class="objet" id="profil" action="" method="post">
            <div class='objet'>
                <img src="../../image/pp.png" alt="photo de profil" id="pp">
            </div>

            <div class='objet'> 
            <p>First Name :</p>
            <input  id="fname" name="f_name" value="<?php echo htmlspecialchars($fname_user) ?>" disabled>
            </div>
            

            <div class='objet'>
            <p>Last Name :</p>
            <input class='objet' id="lname" name="l_name" value="<?php echo htmlspecialchars($lname_user) ?>" disabled>
            </div>
            
            <div class='objet'>
            <p>Mail :</p>
            <input  class='objet' id="email" name="mail_user" value="<?php echo htmlspecialchars($mail_user) ?>" disabled>
            </div>
           
            
            <div class='objet'>
            <p>Language :</p>
            <input class='objet' id="userlang" name="user_lang" value="<?php echo htmlspecialchars($lang_user) ?>" disabled>
            </div>
           

            <div class='objet'>
            <p>University :</p>
            <input class='objet' id="univuser" name="univ_user" value="<?php echo htmlspecialchars($univ_user) ?>" disabled>
            </div>
            

            <div class='objet'>
            <p>Description :</p>
            
            <textarea class='objet' id="statutsuser" name="statuts_user"  disabled><?php echo htmlspecialchars($statuts_user) ?></textarea>
            </div>
            <br>

            <div class='objet'>
            <button  class="b_profile" id="changep" name="change_p" type="submit" formaction="change_user.php">Change your profile </button>
            </div>
            
            <div class='objet'>
            <button class="b_profile" id="suppr_user" name="suppr_user" type="submit">Delete your profile </button>
            </div>
           <br><br>

        </form>
       <br>
        </div>
    </body>
</html>