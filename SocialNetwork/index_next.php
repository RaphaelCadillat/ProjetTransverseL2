<?php
if(isset($_POST['signup']))
{
    echo "<script>window.open('signup.php','_self')</script>";
}

if(isset($_POST['signin']))
{
    echo "<script>window.open('signin.php','_self')</script>";
}