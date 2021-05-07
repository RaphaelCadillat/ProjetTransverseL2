<?php

require '../../Model/connection.php';
require '../../Model/event_management.php';

try{
    $option = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    //Preparation des requetes PDO
    $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);

    if(isset($_POST['del_event']))
    {
        delete_event($id_event);
        header("Location: create_event.php");
    }

}
catch(PDOException $pe){
    echo 'ERREUR : '.$pe->getMessage();
}