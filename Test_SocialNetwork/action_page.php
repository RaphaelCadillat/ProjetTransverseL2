<?php
require 'table_user_connec.php';

echo "Bonjour"."".$_POST["fname"]."".$_POST["lname"];
if(isset($_POST["lang1"])){
    echo $_POST["lang1"];

}
if(isset($_POST["lang2"])){
    echo $_POST["lang2"];

}
if(isset($_POST["lang3"])){
    echo $_POST["lang3"];
}
?>