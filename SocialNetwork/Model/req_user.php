<?php
function add_req_friend($id_current_user, $id_user_to_add)
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

        //Verification si la request existe deja
        $ever_exist = $PDO->prepare('SELECT * FROM req_friends WHERE id_req_from=? AND id_req_to=?');
        $ever_exist->bindValue(1, $id_current_user);
        $ever_exist->bindValue(2, $id_user_to_add);
        $ever_exist->execute();
        $check_req = $ever_exist->rowCount();
        if($check_req==1)
        {
            return false;
        }

        //Ajout de la request dans la base de donnée
        $add_req = $PDO->prepare('INSERT INTO `req_friends` (`id_req_from`, `id_req_to`, `req_statuts`, `req_datetime`) VALUES (?,?,?,NOW())');
        $add_req->bindValue(1, $id_current_user);
        $add_req->bindValue(2, $id_user_to_add);
        $add_req->bindValue(3, 1);
        $add_req->execute();

        return true;
    }
    catch(PDOException $pe){
        echo 'ERREUR : '.$pe->getMessage();
    }    
}