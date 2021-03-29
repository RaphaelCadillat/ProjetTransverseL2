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
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
        <link rel="stylesheet" href="Style.css" />
        <form action="profile.php">
            <button id="profile" name="profile" type="submit"> Profile </button>
        </form>
        <form action="friends.php">
            <button id="friends" name="friends" type="submit"> Friends </button>
        </form>
        <form action="" method="post">
            <button name="logout" id="logout" action="">Log out</button><br>
            <?php include ("logout.php"); ?>
        </form>
        <br>
        <br>
        <title>Social Network</title>
        
    </head>
    <body>
        <p>This is your profile !</p>

        <form action="" method="post">

            <div>
            <input id="fname" name="f_name" value="<?php echo htmlspecialchars($fname_user) ?>" disabled>
            </div>
            <br>

            <div>
            <input id="lname" name="l_name" value="<?php echo htmlspecialchars($lname_user) ?>" disabled>
            </div>
            <br>

            <div>
            <input id="email" name="mail_user" value="<?php echo htmlspecialchars($mail_user) ?>" disabled>
            </div>
            <br>
            
            <div>
            <input id="userlang" name="user_lang" value="<?php echo htmlspecialchars($lang_user) ?>" disabled>
            </div>
            <br>

            <div>
            <input id="univuser" name="univ_user" value="<?php echo htmlspecialchars($univ_user) ?>" disabled>
            </div>
            <br>

            <div>
            <textarea id="statutsuser" name="statuts_user" disabled><?php echo htmlspecialchars($statuts_user) ?></textarea>
            </div>
            <br>

            <div>
            <button id="changep" name="change_p" type="submit" formaction="change_user.php">Change your profile </button>
            </div>
            <br>

            <div>
            <button id="suppr_user" name="suppr_user" type="submit">Delete your profile </button>
            </div>
            <br>
            
            
            <button id="homepage" name="homepage" type="submit" formaction="homepage.php">Homepage</button>

        </form>

    </body>
</html>