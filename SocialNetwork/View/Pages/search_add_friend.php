<?php
require '../../Model/connection.php';
require '../../Model/session_util.php';
require '../../Model/req_user.php';
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

    $id_user_to_add = $_GET['id_user_to_add'];

    $req_verif = $PDO->prepare('SELECT * FROM req_friends WHERE (id_req_from=? AND id_req_to=?) OR (id_req_from=? AND id_req_to=?)');
    $req_verif->bindValue(1,$id_user );
    $req_verif->bindValue(2, $id_user_to_add);
    $req_verif->bindValue(3, $id_user_to_add);
    $req_verif->bindValue(4, $id_user);
    $req_verif->execute();
    $check_req = $req_verif->rowCount();
    if($check_req == 1)
    {
        header("Location: search_add_fail.php");
    }
    else{
        add_req_friend($id_user, $id_user_to_add);
        header("Location: search_add_success.php");
    }

}
catch(PDOException $pe){
    echo 'ERREUR : '.$pe->getMessage();
}