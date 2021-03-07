<?php
require 'db-config.php';

try{
    $option = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false

    ];
    $PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);
    $request = $PDO->prepare('INSERT INTO `table_users_test` (`id_user`, `fname_user`, `lname_user`, `pass_user`, `lang_en_user`, `lang_fr_user`, `lang_jp_user`) VALUES (NULL, ?,?,?, ?, ?, ?) ');
    
    $fname = htmlspecialchars($_POST["fname"]);
    $lname= htmlspecialchars($_POST["lname"]);
    $pass = htmlspecialchars($_POST["pass"]);

    $lang1 = 0;
    if(isset($_POST["lang1"])){
        $lang1 = 1;
    }
    $lang2 =0;
    if(isset($_POST["lang2"])){
        $lang2 = 1;
    }
    $lang3=0;
    if(isset($_POST["lang3"])){
        $lang3 = 1;
    }
    $request->bindValue(1,$fname);
    $request->bindValue(2,$lname);
    $request->bindValue(3,$pass);
    $request->bindValue(4,$lang1);
    $request->bindValue(5,$lang2);
    $request->bindValue(6,$lang3);

    $request->execute();
    echo '<pre>';
    print_r($request->fetch(PDO::FETCH_ASSOC));
    echo '</pre>';
}
catch(PDOException $pe){
    echo 'ERREUR : '.$pe->getMessage();
}
