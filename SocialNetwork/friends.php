<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
        <link rel="stylesheet" href="Style.css" />
        
        <title>Social Network</title>
        
    </head>
    <body>

        <header>
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
        </header>
        <div>
        <form class="friend" id="friend1" action="" method="post">

            <div><br><br>
                <img src="image/pp.png" alt="photo de profil">
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
            <form action="" method="post">
            <button id="addfriend" name="addfriend" type="submit" >Add Friend</button>
            </form>
        </form>

        <form class="friend" id="friend2" action="" method="post">

            <div><br><br>
            <img src="image/pp.png" alt="photo de profil">
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
            <form action="" method="post">
            <button id="addfriend" name="addfriend" type="submit" >Add Friend</button>
            </form>
        </form>
        <form class="friend" id="friend3" action="" method="post">

            <div><br><br>
            <img src="image/pp.png" alt="photo de profil">
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
            <form action="" method="post">
            <button id="addfriend" name="addfriend" type="submit" >Add Friend</button>
            </form>
        </form>

        <form action="friends.php">
            <button id="refresh" name="refresh" type="submit" >Refresh</button>
        </form>

        <div>
            <select id="l_user" name="lang_user" required="required">
                <option disabled>Select language</option>
                <option value=1>English</option>
                <option value=2>French</option>
                <option value=3>Spanish</option>
                <option value=4>Deutch</option>
                <option value=5>Italian</option>
                <option value=6>Portuguese</option>
                <option value=7>Chinese</option>
                <option value=8>Japanese</option>
            </select>
        </div>

        <form action="homepage.php">
            <button id="homepage" name="homepage" type="submit" >Homepage</button>
        </form>
        </div>

    </body>
</html>