<?php

function delete_event_in_table($id_event)
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

        $delete_event = $PDO->prepare('DELETE FROM `events_table` WHERE id_event=?');
        $delete_event->bindValue(1,$id_event);
        $delete_event->execute();
    }
    catch(PDOException $pe){
        echo 'ERREUR : '.$pe->getMessage();
    }
}

function delete_rel_event($id_event)
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

        $delete_event = $PDO->prepare('DELETE FROM `rel_user_event` WHERE id_event=?');
        $delete_event->bindValue(1,$id_event);
        $delete_event->execute();
    }
    catch(PDOException $pe){
        echo 'ERREUR : '.$pe->getMessage();
    }
}

function delete_event($id_event)
{
    delete_event_in_table($id_event);
    delete_rel_event($id_event);
}