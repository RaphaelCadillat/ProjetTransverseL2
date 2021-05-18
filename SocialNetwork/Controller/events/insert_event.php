<?php 

require '../../Model/connection.php';

try{
    $option = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    //Preparation des requetes PDO
    $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);

    if(isset($_POST['submit_event']))
    {
        //Verif si ya pas deja un event de cet id_user
        $verif_event = $PDO->prepare('SELECT * FROM events_table WHERE id_user=?');
        $verif_event->bindValue(1, $id_user);
        $verif_event->execute();

        $check_event = $verif_event->rowCount();

        if($check_event == 1)
        {
            echo"<script>alert('You can only have one active event at time !')</script>";
            echo "<script>window.open('create_event.php','_self')</script>";
            exit();
        }

        //Recuperation des données
        $event_name = htmlentities($_POST['event_name']);
        $event_date = htmlentities($_POST['event_date']);
        $event_hour = htmlentities($_POST['event_hour']);
        $event_description = htmlentities($_POST['description_event']);

        //Sécurisation des données
        if(strlen($event_name) > 50)
        {
            echo"<script>alert('Event name must be less than 50 characters')</script>";
            echo "<script>window.open('create_event.php','_self')</script>";
            exit();
        }

        if(strlen($event_description) > 200)
        {
            echo"<script>alert('Event description must be less than 200 characters')</script>";
            echo "<script>window.open('create_event.php','_self')</script>";
            exit();
        }

        //Insertion des données dans la database
        $insert_event = $PDO->prepare('INSERT INTO `events_table`(`id_event`,`name_event`, `info_event`, `posted_event`, `date_event`, `hour_event`, `id_user`) VALUES(NULL, ?, ?, NOW(), ?, ?, ?)');
        $insert_event->bindValue(1, $event_name);
        $insert_event->bindValue(2, $event_description);
        $insert_event->bindValue(3, $event_date);
        $insert_event->bindValue(4, $event_hour);
        $insert_event->bindValue(5, $id_user);
        $insert_event->execute();

    }

}
catch(PDOException $pe){
    echo 'ERREUR : '.$pe->getMessage();
}