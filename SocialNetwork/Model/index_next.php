<?php
if(isset($_POST['signup']))
{
    echo "<script>window.open('View/Pages/signup.php','_self')</script>";
}

if(isset($_POST['signin']))
{
    echo "<script>window.open('View/Pages/signin.php','_self')</script>";
}