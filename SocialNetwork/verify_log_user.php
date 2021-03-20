<?php

require 'Model/connection.php';
include 'session_util.php';

try{
    $option = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    //Preparation des requetes PDO
    $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);

    if(isset($_POST['sign_in']))
    {

        //Securisation des données entrées
        $email = htmlentities($_POST['mail_user']);
        $pass = htmlentities($_POST['pass_user']);

        //Verification de l'adresse mail
        $get_user = $PDO->prepare('SELECT * FROM user_table WHERE mail_user=?');
        $get_user->bindValue(1,$email);
        $get_user->execute();

        $check_mail = $get_user->rowCount();

        if($check_mail == 0)
        {
            echo "<script>alert('Informations are wrong')</script>";
            echo "<script>window.open('signin.php','_self')</script>";
            exit();
        }

        //Recuperation du mdp en database
        $row = $get_user->fetch(PDO::FETCH_ASSOC);
        $hash_user = $row['password_user'];
        $fname_user = $row['fname_user'];

        //Comparaison mdp et hash
        if (password_verify($pass, $hash_user))
        {
            //ini_php_session();
            echo "<script>alert('Hi, $fname_user, you are now logged')</script>";
            echo "<script>window.open('homepage.php','_self')</script>";
            exit();
        }
        else{
            echo "<script>alert('Informations are wrong')</script>";
            echo "<script>window.open('signin.php','_self')</script>";
        }
    }
}
catch(PDOException $pe){
    echo 'ERREUR : '.$pe->getMessage();
}
?>
