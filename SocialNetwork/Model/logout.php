<?php
require 'session_util.php';

if (isset($_POST['logout']))
{
    free_php_session();
    header("Location: ../../index.php");
    //echo "<script>window.open('../View/Pages/signup.php','_self')</script>";
}