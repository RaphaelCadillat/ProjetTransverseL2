<?php

require '../../Model/connection.php';
require '../../Model/session_util.php';

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

        //Recuperation des donnees de l'utilisateur en database
        $row = $get_user->fetch(PDO::FETCH_ASSOC);
        $hash_user = $row['password_user'];
        $id_user = $row['id_user'];
        $id_admin = $row['id_admin'];
        $fname_user = $row['fname_user'];
        $lname_user = $row['lname_user'];
        $mail_user = $row['mail_user'];
        $reg_date_user = $row['reg_date_user'];
        $univ_user = $row['univ_user'];
        $statuts_user = $row['statuts_user'];

        //Recuperation de la langue
        $get_id_lang = $PDO->prepare('SELECT * FROM rel_user_lang WHERE id_user=?');
        $get_id_lang->bindValue(1,$id_user);
        $get_id_lang->execute();
        $row = $get_id_lang->fetch(PDO::FETCH_ASSOC);
        $id_lang_user = $row['id_lang'];

        $get_lang = $PDO->prepare('SELECT * FROM lang_table WHERE id_lang=?');
        $get_lang->bindValue(1,$id_lang_user);
        $get_lang->execute();
        $row = $get_lang->fetch(PDO::FETCH_ASSOC);
        $lang_user = $row['lang_lang'];

        //Comparaison mdp et hash
        if (password_verify($pass, $hash_user))
        {
            //On initialise la session
            ini_php_session();
            $_SESSION['id_user'] = $id_user;
            $_SESSION['id_admin'] = $id_admin;
            $_SESSION['fname_user'] = $fname_user;
            $_SESSION['lname_user'] = $lname_user;
            $_SESSION['mail_user'] = $mail_user;
            $_SESSION['reg_date_user'] = $reg_date_user;
            $_SESSION['univ_user'] = $univ_user;
            $_SESSION['statuts_user'] = $statuts_user;
            $_SESSION['password_user'] = $hash_user;
            $_SESSION['id_lang_user'] = $id_lang_user;
            $_SESSION['lang_user'] = $lang_user;

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
