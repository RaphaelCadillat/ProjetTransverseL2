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
        <title>Social Network</title>
        
    </head>
    <body>
        <p>Please complete all fields!</p>
        <form action="" method="post">

            <div>
            First Name :
            <input type="text" name="fname_user" value="<?php echo htmlspecialchars($fname_user) ?>" required="required">
            </div><br>

            <div>
            Last Name :
            <input type="text" name="lname_user" value="<?php echo htmlspecialchars($lname_user) ?>" required="required">
            </div><br>

            <div>
            Mail :
            <input id="email" type="email" name="mail_user" value="<?php echo htmlspecialchars($mail_user) ?>" required="required">
            </div><br>

            <div>
            Language :
            <select name="lang_user" required="required">
                <option disabled>Select your first language</option>
                <option value=1 <?php if ($id_lang_user == 1) echo "selected"; ?>>English</option>
                <option value=2 <?php if ($id_lang_user == 2) echo "selected"; ?>>French</option>
                <option value=3 <?php if ($id_lang_user == 3) echo "selected"; ?>>Spanish</option>
                <option value=4 <?php if ($id_lang_user == 4) echo "selected"; ?>>Deutch</option>
                <option value=5 <?php if ($id_lang_user == 5) echo "selected"; ?>>Italian</option>
                <option value=6 <?php if ($id_lang_user == 6) echo "selected"; ?>>Portuguese</option>
                <option value=7 <?php if ($id_lang_user == 7) echo "selected"; ?>>Chinese</option>
                <option value=8 <?php if ($id_lang_user == 8) echo "selected"; ?>>Japanese</option>
            </select>
            </div><br>

            <div>
            University :
            <input type="text" name="univ_user" value="<?php echo htmlspecialchars($univ_user) ?>" required="required">
            </div><br>

            <div>
            Description :
            <br>
            <textarea id="statutsuser" name="statuts_user" required="required"><?php echo htmlspecialchars($statuts_user) ?></textarea>
            </div>
            <br>

            <button id="modify" name="modify" type="submit" >Modify</button>
            <?php include("modif_user.php"); ?>

            <button id="homepage" name="homepage" type="submit" formaction="homepage.php">Homepage</button>

        </form>
    </body>
</html>