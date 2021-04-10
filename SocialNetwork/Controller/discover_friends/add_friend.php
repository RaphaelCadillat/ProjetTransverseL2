<?php
require '../../Model/connection.php';

require '../../Model/req_user.php';

if(isset($_POST['addfriend1']))
{
    header("Location: ../../Controller/discover_friends/confirm_req/confirm_req1.php");
}
else if(isset($_POST['addfriend2']))
{
    header("Location: ../../Controller/discover_friends/confirm_req/confirm_req2.php");
}
else if(isset($_POST['addfriend3']))
{
    header("Location: ../../Controller/discover_friends/confirm_req/confirm_req3.php");
}
