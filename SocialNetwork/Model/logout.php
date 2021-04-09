<?php
require 'session_util.php';
ini_php_session();
free_php_session();

header("Location: ../index.php");
//echo "<script>window.open('../View/Pages/signup.php','_self')</script>";

