<?php
require 'Model/connection.php';

require 'req_user.php';

if(isset($_POST['addfriend1']))
{
    header("Location: confirm_req1.php");
}
else if(isset($_POST['addfriend2']))
{
    header("Location: confirm_req2.php");
}
else if(isset($_POST['addfriend3']))
{
    header("Location: confirm_req3.php");
}
