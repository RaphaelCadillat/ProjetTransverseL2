<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
        <title>Social Network</title>
        
    </head>
    <body>
        <p>Please complete all fields!</p>
        <form action="" method="post">

            <div>
            <input type="text" name="fname_user" placeholder="First Name" required="required">
            </div><br>

            <div>
            <input type="text" name="lname_user" placeholder="Last Name" required="required">
            </div><br>

            <div>
            <input id="email" type="email" name="mail_user" placeholder="Email" required="required">
            </div><br>

            <div>
            <input type="text" name="univ_user" placeholder="University" required="required">
            </div><br>

            <div>
            <select name="lang_user" required="required">
                <option disabled>Select your first language</option>
                <option value=1>English</option>
                <option value=2>French</option>
                <option value=3>Spanish</option>
                <option value=4>Deutch</option>
                <option value=5>Italian</option>
                <option value=6>Portuguese</option>
                <option value=7>Chinese</option>
                <option value=8>Japanese</option>
            </select>
            </div><br>

            <button id="modify" name="modify" type="submit" formaction="profile.php">Modify</button>
            <?php include("insert_user.php"); ?>

        </form>
    </body>
</html>