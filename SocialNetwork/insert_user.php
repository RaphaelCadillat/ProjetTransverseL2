<?php 

require 'Model/connection.php';

try{
    $option = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    //Preparation des requetes PDO
    $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);

    if(isset($_POST['sign_up']))
    {
        //Securiation des données rentrées
        $first_name = htmlentities($_POST['fname_user']); //$PDO->quote();
        $last_name = htmlentities($_POST['lname_user']);
        $password = password_hash($_POST['pass_user'], PASSWORD_BCRYPT);
        $email = htmlentities($_POST['mail_user']);
        $univ = htmlentities($_POST['univ_user']);
        $lang = htmlentities($_POST['lang_user']);


        //Verification des longueurs des champs

        if(strlen($first_name) >30 || strlen($last_name) > 30)
        {
            echo"<script>alert('First and last names must to be less than 30 characters each one')</script>";
            exit();
        }

        if(strlen($email) > 50)
        {
            echo"<script>alert('Email must to be less than 50 characters')</script>";
            exit();
        }

        if(strlen($univ) > 50)
        {
            echo"<script>alert('University name must to be less than 50 characters')</script>";
            exit();
        }

        if(strlen($_POST['pass_user']) < 8)
        {
            echo"<script>alert('Password must be at least 8 characters')</script>";
            exit();
        }



        //Verification de l'unicité de l'email
        $get_mail = $PDO->prepare('SELECT * FROM user_table WHERE mail_user=?');
        $get_mail->bindValue(1,$email);
        $get_mail->execute();

        $check_mail = $get_mail->rowCount();

        if($check_mail == 1)
        {
            echo "<script>alert('Email already exist, try to enter another one')</script>";
            echo "<script>window.open('signup.php','_self')</script>";
            exit();
        }


        //Insertion des données dans la base sql
        $insert_user_cmd = 'INSERT INTO `user_table` (`id_admin`, `fname_user`, `lname_user`, `password_user`, `mail_user`, `reg_date_user`, `univ_user`, `statuts_user`) VALUES(0, ?, ?, ?, ?,NOW(), ?, ?)';
        $insert_user = $PDO->prepare($insert_user_cmd);
        $insert_user->bindValue(1, $first_name);
        $insert_user->bindValue(2, $last_name);
        $insert_user->bindValue(3, $password);
        $insert_user->bindValue(4, $email);
        $insert_user->bindValue(5, $univ);
        $insert_user->bindValue(6, '...');
        $insert_user->execute();


        //Insertion de la langue
        if($insert_user)
        {
            $get_id_user_cmd = 'SELECT id_user FROM user_table WHERE mail_user= ?';
            $get_id_user = $PDO->prepare($get_id_user_cmd);
            $get_id_user->bindValue(1,$email);
            $get_id_user->execute();

            $lang = $_POST['lang_user'];

            $row = $get_id_user->fetch(PDO::FETCH_ASSOC);
            $id_user = $row['id_user'];


            $insert_rel_user_lang_cmd = 'INSERT INTO `rel_user_lang` (`id_user`, `id_lang`) VALUES(?, ?)';
            $insert_rel_user_lang = $PDO->prepare($insert_rel_user_lang_cmd);
            $insert_rel_user_lang->bindValue(1, $id_user);
            $insert_rel_user_lang->bindValue(2, $lang);
            $insert_rel_user_lang->execute();
        }

        //Finalisation de la requete
        if($insert_user && $insert_rel_user_lang)
        {
            echo "<script>alert('Good $first_name, your account is created')</script>";
            echo "<script>window.open('signin.php','_self')</script>";
        }
        else{
            echo "<script>alert('Too bad, registration failed :-/')</script>";
            echo "<script>window.open('signup.php','_self')</script>";
            //rajouter la fonction de suppression de compte
        }
    }


}
catch(PDOException $pe){
    echo 'ERREUR : '.$pe->getMessage();
}


/* VERSION PROCEDURALE
include("Model/connection.php");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

    if(isset($_POST['sign_up']))
    {
        //Securiation des données rentrées
        $first_name = htmlentities(mysqli_real_escape_string($con,$_POST['fname_user']));
        $last_name = htmlentities(mysqli_real_escape_string($con,$_POST['lname_user']));
        $password = password_hash($_POST['pass_user'], PASSWORD_BCRYPT);
        $email = htmlentities(mysqli_real_escape_string($con,$_POST['mail_user']));
        $univ = htmlentities(mysqli_real_escape_string($con,$_POST['univ_user']));
        $lang = htmlentities(mysqli_real_escape_string($con,$_POST['lang_user']));


        //Verification des longueurs des champs

        if(strlen($first_name) >30 || strlen($last_name) > 30)
        {
            echo"<script>alert('First and last names must to be less than 30 characters each one')</script>";
            exit();
        }

        if(strlen($email) > 50)
        {
            echo"<script>alert('Email must to be less than 50 characters')</script>";
            exit();
        }

        if(strlen($univ) > 50)
        {
            echo"<script>alert('University name must to be less than 50 characters')</script>";
            exit();
        }

        if(strlen($password) < 8)
        {
            echo"<script>alert('Password must be at least 8 characters')</script>";
            exit();
        }

        //Verification de l'unicité de l'email
        $check_email = "SELECT * FROM user_table WHERE mail_user='$email'";
        $run_email = mysqli_query($con, $check_email);

        $check = mysqli_num_rows($run_email);

        if($check == 1)
        {
            echo "<script>alert('Email already exist, try to enter another one')</script>";
            echo "<script>window.open('signup.php','_self')</script>";
            exit();
        }


        //Insertion des données dans la base sql
        $insert = "INSERT INTO user_table (id_admin, fname_user, lname_user, password_user, mail_user, reg_date_user, univ_user, statuts_user) VALUES(0,'$first_name', '$last_name', '$password', '$email',NOW(), '$univ', '...')";
        $query = mysqli_query($con, $insert);

        //Insertion de la langue

        if($query)
        {
            $get_id_user = "SELECT id_user FROM user_table WHERE mail_user='$email'";
            $run_get_id_user = mysqli_query($con, $get_id_user);

            $lang = $_POST['lang_user'];

            while($row = mysqli_fetch_assoc($run_get_id_user)) {
                $id_user = $row["id_user"];
                echo $id_user;
              }

            $insert = "INSERT INTO rel_user_lang (id_user, id_lang) VALUES('$id_user', '$lang')";
            $query2 = mysqli_query($con, $insert);
        }

        //Finalisation de la requete
        if($query && $query2)
        {
            echo "<script>alert('Good $first_name, your account is created')</script>";
            echo "<script>window.open('signin.php','_self')</script>";
        }
        else{
            echo "<script>alert('Too bad, registration failed :-/')</script>";
            echo "<script>window.open('signup.php','_self')</script>";
        }
    }
*/