
<?php

require '../../Model/session_util.php';
ini_php_session();
$id_user = $_SESSION['id_user'];
$id_admin = $_SESSION['id_admin'];
$fname_user = $_SESSION['fname_user'];
$lname_user = $_SESSION['lname_user'];
$mail_user = $_SESSION['mail_user'];
$reg_date_user = $_SESSION['reg_date_user'];
$univ_user = $_SESSION['univ_user'];
$statuts_user = $_SESSION['statuts_user'];
$hash_user = $_SESSION['password_user'];
$id_lang_user = $_SESSION['id_lang_user'];
$lang_user = $_SESSION['lang_user'];


$is_logged = is_logged($mail_user, $hash_user);
if ($is_logged == false)
{
    echo "<script>window.open('../../index.php','_self')</script>";
}

require '../../Controller/discover_friends/print_friend.php';
require '../../Controller/discover_friends/add_friend.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
        <link rel="stylesheet" href="../Styles/Style.css" />
        <title>Social Network</title>
    </head>
    <body>
        <?php include('navigation_bar.php') ?>
        <div class="pagehorizontal">
        <div class="container1">
        <form class="friend" id="friend1" action="../../Controller/discover_friends/confirm_req/confirm_req1.php" method="post">
            <div> <img src="../../image/pp.png" alt="photo de profil" id="pp">

            <input id="fname" name="f_name1" value="<?php echo htmlspecialchars($fname_user1) ?>" disabled>
            </div>
         

            <div>
            <input id="lname" name="l_name1" value="<?php echo htmlspecialchars($lname_user1) ?>" disabled>
            </div>
            

            <div>
            <input id="email" name="mail_user1" value="<?php echo htmlspecialchars($mail_user1) ?>" disabled>
            </div>
          
            
            <div>
            <input id="userlang" name="user_lang1" value="<?php echo htmlspecialchars($lang_user1) ?>" disabled>
            </div>
         

            <div>
            <input id="univuser" name="univ_user1" value="<?php echo htmlspecialchars($univ_user1) ?>" disabled>
            </div>
          

            <div>
            <textarea id="statutsuser" name="statuts_user1" disabled><?php echo htmlspecialchars($statuts_user1) ?></textarea>
            </div>
            
            
            <button id="addfriend" name="addfriend1" type="submit">Add <?php echo htmlspecialchars($fname_user1) ?> as friend</button>
        </form>
        
        

        
        <form class="friend" id="friend2" action="../../Controller/discover_friends/confirm_req/confirm_req2.php" method="post">
            <div> <img src="../../image/pp.png" alt="photo de profil" id="pp">

            <input id="fname" name="f_name2" value="<?php echo htmlspecialchars($fname_user2) ?>" disabled>
            </div>
            

            <div>
            <input id="lname" name="l_name2" value="<?php echo htmlspecialchars($lname_user2) ?>" disabled>
            </div>
          

            <div>
            <input id="email" name="mail_user2" value="<?php echo htmlspecialchars($mail_user2) ?>" disabled>
            </div>
            

            <div>
            <input id="userlang" name="user_lang2" value="<?php echo htmlspecialchars($lang_user2) ?>" disabled>
            </div>
            
            <div>
            <input id="univuser" name="univ_user2" value="<?php echo htmlspecialchars($univ_user2) ?>" disabled>
            </div>
            

            <div>
            <textarea id="statutsuser" name="<?php echo htmlspecialchars($statuts_user2) ?>" disabled>Description</textarea>
            </div>
            

            <button id="addfriend" name="addfriend2" type="submit" >Add <?php echo htmlspecialchars($fname_user2) ?> as friend</button>
        </form>
        


       
        <form class="friend" id="friend3" action="../../Controller/discover_friends/confirm_req/confirm_req3.php" method="post">
            <div> <img src="../../image/pp.png" alt="photo de profil" id="pp">
            <input class="objet" id="fname" name="f_name3" value="<?php echo htmlspecialchars($fname_user3) ?>" disabled>
            </div>
           

            <div>
            <input class="objet" id="lname" name="l_name3" value="<?php echo htmlspecialchars($lname_user3) ?>" disabled>
            </div>
            

            <div>
            <input class="objet" id="email" name="mail_user3" value="<?php echo htmlspecialchars($mail_user3) ?>" disabled>
            </div>
            
            <div>
            <input class="objet" id="userlang" name="user_lang3" value="<?php echo htmlspecialchars($lang_user3) ?>" disabled>
            </div>
           

            <div>
            <input class="objet" id="univuser" name="univ_user3" value="<?php echo htmlspecialchars($univ_user3) ?>" disabled>
            </div>
            

            <div>
            <textarea class="objet" id="statutsuser" name="statuts_user3" disabled><?php echo htmlspecialchars($statuts_user3) ?></textarea>
            </div>

            <button class="objet" id="addfriend" name="addfriend3" type="submit" >Add <?php echo htmlspecialchars($fname_user3) ?> as friend</button>
        </form>
        </div>
        
        <br><br>
       <div class="container2">
        <div  class="objet" id= "refresh">
        
        <form  class="objet"  action="homepage.php" method="post">

            <button class="objet" id="refresh" name="refresh" type="submit" >Refresh</button>

            <div  class="objet">
                <select class="objet" id="l_user" name="lang_user" required="required">
                    <option disabled>Select language</option>
                    <option value=1 <?php if ($lang_user == 1) echo "selected"; ?>>English</option>
                    <option value=2 <?php if ($lang_user == 2) echo "selected"; ?>>French</option>
                    <option value=3 <?php if ($lang_user == 3) echo "selected"; ?>>Spanish</option>
                    <option value=4 <?php if ($lang_user == 4) echo "selected"; ?>>Deutch</option>
                    <option value=5 <?php if ($lang_user == 5) echo "selected"; ?>>Italian</option>
                    <option value=6 <?php if ($lang_user == 6) echo "selected"; ?>>Portuguese</option>
                    <option value=7 <?php if ($lang_user == 7) echo "selected"; ?>>Chinese</option>
                    <option value=8 <?php if ($lang_user == 8) echo "selected"; ?>>Japanese</option>
                </select>
            </div>
        </form>
        </div>
        </div>
        </div>
    </body>
</html>