<?php

if (!function_exists('ini_php_session'))
{
    function ini_php_session() : bool
    {
        if(!session_id())
        {
            session_start();
            session_regenerate_id(true);
        }
        return false;
    }
}


if (!function_exists('free_php_session'))
{
    function free_php_session() : void
    {

        session_unset();
        session_destroy();
        session_write_close();
        setcookie(session_name(), '', 0, null, null, false, true);
        
    }
}


if (!function_exists('is_logged'))
{
    function is_logged($email, $hash) : bool
    {
        require '../../Model/connection.php';

        if(!$email || !$hash) //check if the session is on
        {
            return false;
        }
        
        try{
            $option = [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
        
            //Preparation des requetes PDO
            $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);
        
            $get_user = $PDO->prepare('SELECT * FROM user_table WHERE mail_user=?');
            $get_user->bindValue(1,$email);
            $get_user->execute();

            $row = $get_user->fetch(PDO::FETCH_ASSOC);

            $real_hash = $row['password_user'];

            if($hash != $real_hash) // check if password in the session is the same than that on our table
            {
                return false;
            }
        }
        catch(PDOException $pe){
            echo 'ERREUR : '.$pe->getMessage();
        }

        return true;
    }
}