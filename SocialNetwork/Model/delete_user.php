<?php
require '../../Model/user_management.php';

if(isset($_POST['suppr_user']))
{
    delete_account($id_user);
    header("Location: ../../index.php");
}