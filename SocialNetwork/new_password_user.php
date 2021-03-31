<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
        <title>Social Network</title>
    </head>
    <body>
        <p>Veuiller entrer un nouveau mot de passe</p>

        <form action="" method ="post">
            <div>
            <input type="password" name="newpass"><br>
            <input type="submit" name="submitPassword" value="Enter"/><br>
            <a href="signin.php">Connexion ?</a><br>
            
        </form>
    </body>
</html>

<?php
require 'Model/connection.php';

if(isset($_GET["email"]) && isset($_GET["token"])){
    try{
        $option = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        ];
            
        //Preparation des requetes PDO
        $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);

        $email = $_GET["email"];
        $token = $_GET["token"];

        //verifiaction dans sql existance mail et token
        $get_user = $PDO->prepare('SELECT * FROM user_table WHERE mail_user=? AND token=?');
        $get_user->bindValue(1,$email);
        $get_user->bindValue(2,$token);
        $get_user->execute();
        $check_user = $get_user->rowCount();

        if($check_user > 0){
            
            if(isset($_POST["submitPassword"])){

                if(strlen($_POST["newpass"]) < 8)
                {
                    echo"<script>alert('Password must be at least 8 characters')</script>";
                    exit();
                }
    
                $newpassword = password_hash($_POST["newpass"],PASSWORD_BCRYPT);
    
                $change_password = $PDO->prepare('UPDATE user_table SET password_user= ?, token=? WHERE mail_user = ?');
                $change_password->bindValue(1,$newpassword);
                $change_password->bindValue(2,'');
                $change_password->bindValue(3,$email);
                $change_password->execute();
        
                echo"<script>alert('Your password has been change')</script>";
                echo "<script>window.open('signin.php','_self')</script>";
            }    
        }
        else{
            echo"<script>alert('please check your link')</script>";
            echo "<script>window.open('signin.php','_self')</script>";
        }
    }
    catch(PDOException $pe){
        echo 'ERREUR : '.$pe->getMessage();
    }
}
else{
    header("Localisation: signin.php");
    exit();
}
?>