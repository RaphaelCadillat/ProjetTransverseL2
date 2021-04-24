<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8" />
        <link rel="stylesheet" href="../Styles/Style.css" />
        <link rel="stylesheet" href="../Styles/events.css" />
        <title>Social Network</title>
        
    </head>
    <body>
        <?php include('navigation_bar.php') ?>
        <nav id="eventnav">
            <ul id="enav">
                <li><a href="create_event.php">Créer un event</a></li>
                <li><a href="list_event.php">Tous les events</a></li>
                <li><a href="friends_event.php">Rechercher un event d'un ami</a></li>
            </ul>
        </nav>
        <br>
        <form action="" method="post">

            <div>
            <p>Event Name :</p>
            <input id="eventname" name="event_name">
            </div>
            <br>

            <div>
            <p>Description :</p>
            <br>
            <textarea id="descriptionevent" name="description_event"></textarea>
            </div>
            <br>

    </body>
</html>
