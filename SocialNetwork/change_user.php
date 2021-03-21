<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
        <title>Social Network</title>
        
    </head>
    <body>
        <p>Vous etes sur la page de modification de votre compte !</p>

        <form action="" method="post">

            <div>
            First Name   <button id="userfname" name="user_fname">Edit</button>
            </div>
            <br>

            <div>
            Last Name   <button id="userlname" name="user_lname">Edit</button>
            </div>
            <br>

            <div>
            E-mail   <button id="mailuser" name="mail_user">Edit</button>
            </div>
            <br>

            <div>
            Language <select id="userlang" name="user_lang">
                <option value="1">english</option>
                <option value="2">french</option>
                <option value="3">spanish</option>
                <option value="4">deutch</option>
                <option value="5">italian</option>
                <option value="6">portuguese</option>
                <option value="7">chinese</option>
                <option value="8">japanese</option>
            </select>
            <div>
            <br>

            <button id="homepage" name="homepage">Homepage</button>
            <?php include("signup.php"); ?>

        </form>

    </body>
</html>