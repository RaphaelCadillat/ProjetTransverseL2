<?php // PAS ENCORE TESTE

// change fname
// change lname
// change univ
// change langue
// change statuts
// delete account


function delete_user($id_user)
{
    require 'connection.php';
    try{
        $option = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        ];
    
        //Preparation des requetes PDO
        $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);

        $delete_user = $PDO->prepare('DELETE FROM `user_table` WHERE id_user=?');
        $delete_user->bindValue(1,$id_user);
        $delete_user->execute();
    }
    catch(PDOException $pe){
        echo 'ERREUR : '.$pe->getMessage();
    }
}

function delete_rel_lang_user($id_user)
{
    require 'connection.php';
    try{
        $option = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        ];
    
        //Preparation des requetes PDO
        $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);

        $delete = $PDO->prepare('DELETE FROM `rel_user_lang` WHERE id_user=?');
        $delete->bindValue(1,$id_user);
        $delete->execute();
    }
    catch(PDOException $pe){
        echo 'ERREUR : '.$pe->getMessage();
    }
}

function delete_friend_user($id_user)
{
    require 'connection.php';
    try{
        $option = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        ];
    
        //Preparation des requetes PDO
        $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);

        $delete = $PDO->prepare('DELETE FROM `friends_user` WHERE user1=?');
        $delete->bindValue(1,$id_user);
        $delete->execute();

        $delete = $PDO->prepare('DELETE FROM `friends_user` WHERE user2=?');
        $delete->bindValue(1,$id_user);
        $delete->execute();
    }
    catch(PDOException $pe){
        echo 'ERREUR : '.$pe->getMessage();
    }
}

function delete_req_friends($id_user)
{
    require 'connection.php';
    try{
        $option = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        ];
    
        //Preparation des requetes PDO
        $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);

        $delete = $PDO->prepare('DELETE FROM `req_friends` WHERE id_user1=?');
        $delete->bindValue(1,$id_user);
        $delete->execute();

        $delete = $PDO->prepare('DELETE FROM `req_friends` WHERE id_user2=?');
        $delete->bindValue(1,$id_user);
        $delete->execute();
    }
    catch(PDOException $pe){
        echo 'ERREUR : '.$pe->getMessage();
    }
}

function delete_message($id_user)
{
    require 'connection.php';
    try{
        $option = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        ];
    
        //Preparation des requetes PDO
        $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);

        $delete = $PDO->prepare('DELETE FROM `message_table` WHERE id_sender_message=?');
        $delete->bindValue(1,$id_user);
        $delete->execute();

        $delete = $PDO->prepare('DELETE FROM `message_table` WHERE id_receiver_message=?');
        $delete->bindValue(1,$id_user);
        $delete->execute();
    }
    catch(PDOException $pe){
        echo 'ERREUR : '.$pe->getMessage();
    }
}

function delete_account($id_user)
{

    delete_user($id_user);
    delete_rel_lang_user($id_user);
    delete_friend_user($id_user);
    delete_req_friends($id_user);
    delete_message($id_user);
    
    require 'session_util.php';
    free_php_session();
    header("Location: ../index.php");

}