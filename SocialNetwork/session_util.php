<?php

function ini_php_session() : bool
{
    if(!session_id())
    {
        session_start();
        session_regenerate_id();
    }
    return false;
}

function free_php_session() : void
{
    session_unset();
    session_destroy();
}

function is_logged() : bool
{
    //code here
    return true;
}

function is_admin() : bool
{
    //code here
    return true;
}