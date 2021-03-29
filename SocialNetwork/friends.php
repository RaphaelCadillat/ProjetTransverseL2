<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
        <link rel="stylesheet" href="Style.css" />
        <form action="profile.php">
            <button id="profile" name="profile" type="submit"> Profile </button>
        </form>
        <form action="friends.php">
            <button id="friends" name="friends" type="submit"> Friends </button>
        </form>
        <form action="" method="post">
            <button name="logout" id="logout" action="">Log out</button><br>
            <?php include ("logout.php"); ?>
        </form>
        <br>
        <title>Social Network</title>
        
    </head>
    <body>
        <form id="friend1" action="" method="post">

            <div>
            <input id="fname" name="f_name" value="Fname" disabled>
            </div>
            <br>

            <div>
            <input id="lname" name="l_name" value="Lname" disabled>
            </div>
            <br>

            <div>
            <input id="email" name="mail_user" value="Mail" disabled>
            </div>
            <br>
            
            <div>
            <input id="userlang" name="user_lang" value="Language" disabled>
            </div>
            <br>

            <div>
            <input id="univuser" name="univ_user" value="University" disabled>
            </div>
            <br>

            <div>
            <textarea id="statutsuser" name="statuts_user" disabled>Description</textarea>
            </div>
            <br>
        </form>

        <form id="friend2" action="" method="post">

            <div>
            <input id="fname" name="f_name" value="Fname" disabled>
            </div>
            <br>

            <div>
            <input id="lname" name="l_name" value="Lname" disabled>
            </div>
            <br>

            <div>
            <input id="email" name="mail_user" value="Mail" disabled>
            </div>
            <br>

            <div>
            <input id="userlang" name="user_lang" value="Language" disabled>
            </div>
            <br>

            <div>
            <input id="univuser" name="univ_user" value="University" disabled>
            </div>
            <br>

            <div>
            <textarea id="statutsuser" name="statuts_user" disabled>Description</textarea>
            </div>
            <br>
        </form>
        <form id="friend3" action="" method="post">

            <div>
            <input id="fname" name="f_name" value="Fname" disabled>
            </div>
            <br>

            <div>
            <input id="lname" name="l_name" value="Lname" disabled>
            </div>
            <br>

            <div>
            <input id="email" name="mail_user" value="Mail" disabled>
            </div>
            <br>
            
            <div>
            <input id="userlang" name="user_lang" value="Language" disabled>
            </div>
            <br>

            <div>
            <input id="univuser" name="univ_user" value="University" disabled>
            </div>
            <br>

            <div>
            <textarea id="statutsuser" name="statuts_user" disabled>Description</textarea>
            </div>
            <br>
        </form>

        <form action="homepage.php">
            <button id="homepage" name="homepage" type="submit" >Homepage</button>
        </form>
        

    </body>
</html>