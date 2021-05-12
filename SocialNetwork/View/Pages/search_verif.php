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

try{
    $option = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    //Preparation des requetes PDO
    $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);


    
    $mail_user_to_search = htmlentities($_POST['mail_user_to_search']);
    $req_user_to_search = $PDO->prepare('SELECT * FROM user_table WHERE mail_user=?');
    $req_user_to_search->bindValue(1, $mail_user_to_search);
    $req_user_to_search->execute();
    $check_user = $req_user_to_search->rowCount();
    if ($check_user==0 || $mail_user_to_search==$mail_user)
    {
        header("Location: search_friend.php");
    }
    else{
        header("Location: search_add.php?mail_user_to_search=$mail_user_to_search");
    }
    
}
catch(PDOException $pe){
    echo 'ERREUR : '.$pe->getMessage();
}
?>

