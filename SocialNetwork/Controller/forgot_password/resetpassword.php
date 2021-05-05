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

    if(isset($_POST["forgotpassword"])){
        //Securisation donnee email user
        $email = htmlentities($_POST["email"]);

        //Verification mail existant dans la base de donnée
        $get_data_mail = $PDO->prepare('SELECT * FROM user_table WHERE mail_user= ?');
        $get_data_mail->bindValue(1,$email);
        $get_data_mail->execute();

        $check_data_mail = $get_data_mail->rowCount();

        if($check_data_mail > 0){
            //token pour créer une url unique
            $token = bin2hex(random_bytes(32));

            //Contruction de l'url unique
            $url = "http://localhost/ProjetTransverseL2/SocialNetwork/Controller/forgot_password/new_password_user.php?email=".$email."&token=".$token;

            //Envoye d'un mail avec l'url pour creation new mdp par utlisateur
            mail($email,"Reset Password","To reset your password, please click on the link: $url","From: socialnetworkprojetl2@gmail.com");

            //On ajoute le token crée dans la table
            $set_token = $PDO->prepare('UPDATE user_table SET token=? WHERE mail_user=?');
            $set_token->bindValue(1,$token);
            $set_token->bindValue(2,$email);
            $set_token->execute();

            echo"<script>alert('An email has been sent to you')</script>";
            echo "<script>window.open('forgot_password_page.php','_self')</script>";
        }
        else{
            echo"<script>alert('Email unknow,please try again')</script>";
            echo "<script>window.open('forgot_password_page.php','_self')</script>";
        }
    }
}
catch(PDOException $pe){
    echo 'ERREUR : '.$pe->getMessage();
}