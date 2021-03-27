<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
        <title>Social Network</title>
        
    </head>
    <body>
        <p>This is your profile !</p>

        <form action="" method="post">

            <div>
            <input id="fname" name="f_name" placeholder="First name" disabled>
            </div>
            <br>

            <div>
            <input id="lname" name="l_name" placeholder="Last name" disabled>
            </div>
            <br>

            <div>
            <input id="email" name="mail_user" placeholder="Email" disabled>
            </div>
            <br>
            
            <div>
            <input id="userlang" name="user_lang" placeholder="Language" disabled>
            </div>
            <br>

            <div>
            <input id="univuser" name="univ_user" placeholder="University" disabled>
            </div>
            <br>
            <div>
            <button id="changep" name="change_p" type="submit" formaction="change_user.php">Change your profile </button>
            </div>
            <br>

            <div>
            <button id="suppr_user" name="suppr_user" type="submit">Delete your profile </button>
            </div>
            <br>
            
            <button id="homepage" name="homepage" type="submit" formaction="signin.php">Homepage</button>

        </form>

    </body>
</html>