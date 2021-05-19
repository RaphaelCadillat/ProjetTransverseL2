<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
        <link rel="stylesheet" href="../../../View/Styles/Style.css" />
        <title>Social Network</title>
        
    </head>
    <body>
        <div class="reussi">
<?php
require '../../../Model/session_util.php';
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
    echo "<script>window.open('../../../index.php','_self')</script>";
}

require '../../../Model/req_user.php';
$a = add_req_friend($id_user, $_SESSION['id_user3']);
if($a==false)
{
    echo '<p style="flex: 1">Erreur</p>';
}
else{
    echo '<p style="flex: 1">Réussite</p>';
}
?>
        <form action="../../../View/Pages/homepage.php" method="post">
            <button id="confirm" type="submit">nice</button>
        </form>
</div>
    </body>
</html>