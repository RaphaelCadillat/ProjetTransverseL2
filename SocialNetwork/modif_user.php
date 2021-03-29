<?php
require 'Model/connection.php';
//require 'session_util.php';

try{
    $option = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    //Preparation des requetes PDO
    $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);

    if(isset($_POST['modify']))
    {
        //id de l'utilisateur
        
        //Recuperation des nouvelles données
        $new_fname = htmlentities($_POST['fname_user']);
        $new_lname = htmlentities($_POST['lname_user']);
        $new_email = htmlentities($_POST['mail_user']);
        $new_univ = htmlentities($_POST['univ_user']);
        $new_id_lang = htmlentities($_POST['lang_user']);
        $new_statuts = htmlentities($_POST['statuts_user']);

        //Verification des longueurs des champs

        if(strlen($new_fname) >30 || strlen($new_lname) > 30)
        {
            echo"<script>alert('First and last names must to be less than 30 characters each one')</script>";
            exit();
        }

        if(strlen($new_email) > 50)
        {
            echo"<script>alert('Email must to be less than 50 characters')</script>";
            exit();
        }

        if(strlen($new_univ) > 50)
        {
            echo"<script>alert('University name must to be less than 50 characters')</script>";
            exit();
        }

        if(strlen($new_statuts) > 300)
        {
            echo"<script>alert('Statut must to be less than 300 characters')</script>";
            exit();
        }

        //Verification de l'unicité de l'email

        if($new_email != $mail_user)
        {
            $get_mail = $PDO->prepare('SELECT * FROM user_table WHERE mail_user=?');
            $get_mail->bindValue(1,$new_email);
            $get_mail->execute();

            $check_mail = $get_mail->rowCount();

            if($check_mail == 1)
            {
                echo "<script>alert('Email already exist, try to enter another one')</script>";
                exit();
            }
        }

        //Modification de la table user_table
        $modif_user_cmd = 'UPDATE user_table SET fname_user = ?, lname_user = ?, mail_user = ?, univ_user = ?, statuts_user = ? WHERE id_user = ?';
        $modif_user = $PDO->prepare($modif_user_cmd);
        $modif_user->bindValue(1,$new_fname);
        $modif_user->bindValue(2,$new_lname);
        $modif_user->bindValue(3,$new_email);
        $modif_user->bindValue(4,$new_univ);
        $modif_user->bindValue(5,$new_statuts);
        $modif_user->bindValue(6,$id_user);
        $modif_user->execute();

        //Modification de la table rel_lang_user
        $modif_lang_user_cmd = 'UPDATE rel_user_lang SET id_lang = ? WHERE id_user = ?';
        $modif_lang_user = $PDO->prepare($modif_lang_user_cmd);
        $modif_lang_user->bindValue(1,$new_id_lang);
        $modif_lang_user->bindValue(2,$id_user);
        $modif_lang_user->execute();

        //Récuperation de la langue
        $get_lang = $PDO->prepare('SELECT * FROM lang_table WHERE id_lang=?');
        $get_lang->bindValue(1,$new_id_lang);
        $get_lang->execute();
        $row = $get_lang->fetch(PDO::FETCH_ASSOC);
        $new_lang = $row['lang_lang'];

        //Finalisation de la requete
        if($modif_user || $modif_lang_user)
        {
            //Mise a jour de la variable superglobale de session
            $_SESSION['fname_user'] = $new_fname;
            $_SESSION['lname_user'] = $new_lname;
            $_SESSION['mail_user'] = $new_email;
            $_SESSION['univ_user'] = $new_univ;
            $_SESSION['statuts_user'] = $new_statuts;
            $_SESSION['id_lang_user'] = $new_id_lang;
            $_SESSION['lang_user'] = $new_lang;

            
            echo "<script>alert('Informations are modified')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
        }
        else
        {
            echo "<script>alert('Modification failed')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
        }
        
    }
}
catch(PDOException $pe){
    echo 'ERREUR : '.$pe->getMessage();
}