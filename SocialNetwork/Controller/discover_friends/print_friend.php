<?php

require '../../Model/connection.php';
require '../../Model/session_util.php';


//AFFICHER LES PROFILS

$lang_user = 1;

if (isset($_POST['refresh']))
{
    $lang_user = $_POST['lang_user'];
}
try{
    $option = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ];
    //Preparation des requetes PDO
    $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);
    
   
    $get_users = $PDO->prepare('SELECT id_user FROM rel_user_lang WHERE id_lang=? AND id_user<>? ORDER BY RAND() LIMIT 3');
    $get_users->bindValue(1, $lang_user);
    $get_users->bindValue(2, $id_user);
    $get_users->execute();
    $users = $get_users->fetchAll(PDO::FETCH_ASSOC);
    
    
    //On recupere l'user 1
    $get_user1 = $PDO->prepare('SELECT * FROM user_table WHERE id_user=?');
    $get_user1->bindValue(1, $users[0]['id_user']);
    $get_user1->execute();
    $user1 = $get_user1->fetch(PDO::FETCH_ASSOC);
    //On recupere l'user 2
    $get_user2 = $PDO->prepare('SELECT * FROM user_table WHERE id_user=?');
    $get_user2->bindValue(1, $users[1]['id_user']);
    $get_user2->execute();
    $user2 = $get_user2->fetch(PDO::FETCH_ASSOC);
    //On recupere l'user 3
    $get_user3 = $PDO->prepare('SELECT * FROM user_table WHERE id_user=?');
    $get_user3->bindValue(1, $users[2]['id_user']);
    $get_user3->execute();
    $user3 = $get_user3->fetch(PDO::FETCH_ASSOC);
    //On met chaque donnée de chaque user dans une variable pour les injecter dans le html
    $id_user1 = $user1['id_user'];
    $fname_user1 = $user1['fname_user'];
    $lname_user1 = $user1['lname_user'];
    $mail_user1 = $user1['mail_user'];
    $univ_user1 = $user1['univ_user'];
    $statuts_user1 = $user1['statuts_user'];
    $get_id_lang_user1 = $PDO->prepare('SELECT * FROM rel_user_lang WHERE id_user=?');
    $get_id_lang_user1->bindValue(1,$id_user1);
    $get_id_lang_user1->execute();
    $row = $get_id_lang_user1->fetch(PDO::FETCH_ASSOC);
    $id_lang_user1 = $row['id_lang'];
    $get_lang_user1 = $PDO->prepare('SELECT * FROM lang_table WHERE id_lang=?');
    $get_lang_user1->bindValue(1,$id_lang_user1);
    $get_lang_user1->execute();
    $row = $get_lang_user1->fetch(PDO::FETCH_ASSOC);
    $lang_user1 = $row['lang_lang'];
    $id_user2 = $user2['id_user'];
    $fname_user2 = $user2['fname_user'];
    $lname_user2 = $user2['lname_user'];
    $mail_user2 = $user2['mail_user'];
    $univ_user2 = $user2['univ_user'];
    $statuts_user2 = $user2['statuts_user'];
    $get_id_lang_user2 = $PDO->prepare('SELECT * FROM rel_user_lang WHERE id_user=?');
    $get_id_lang_user2->bindValue(1,$id_user2);
    $get_id_lang_user2->execute();
    $row = $get_id_lang_user2->fetch(PDO::FETCH_ASSOC);
    $id_lang_user2 = $row['id_lang'];
    $get_lang_user2 = $PDO->prepare('SELECT * FROM lang_table WHERE id_lang=?');
    $get_lang_user2->bindValue(1,$id_lang_user2);
    $get_lang_user2->execute();
    $row = $get_lang_user2->fetch(PDO::FETCH_ASSOC);
    $lang_user2 = $row['lang_lang'];
    $id_user3 = $user3['id_user'];
    $fname_user3 = $user3['fname_user'];
    $lname_user3 = $user3['lname_user'];
    $mail_user3 = $user3['mail_user'];
    $univ_user3 = $user3['univ_user'];
    $statuts_user3 = $user3['statuts_user'];
    $get_id_lang_user3 = $PDO->prepare('SELECT * FROM rel_user_lang WHERE id_user=?');
    $get_id_lang_user3->bindValue(1,$id_user3);
    $get_id_lang_user3->execute();
    $row = $get_id_lang_user3->fetch(PDO::FETCH_ASSOC);
    $id_lang_user3 = $row['id_lang'];
    $get_lang_user3 = $PDO->prepare('SELECT * FROM lang_table WHERE id_lang=?');
    $get_lang_user3->bindValue(1,$id_lang_user3);
    $get_lang_user3->execute();
    $row = $get_lang_user3->fetch(PDO::FETCH_ASSOC);
    $lang_user3 = $row['lang_lang'];

    // on met les users dans la SESSION
    $_SESSION['id_user1'] = $user1['id_user'];
    $_SESSION['id_user2'] = $user2['id_user'];
    $_SESSION['id_user3'] = $user3['id_user'];
}
catch(PDOException $pe){
    echo 'ERREUR : '.$pe->getMessage();
}



