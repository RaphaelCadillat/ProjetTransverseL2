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
                <li><a href="friends_event.php">Event des amis</a></li>
            </ul>
        </nav>
        <br>
        <form action="" method="post">

            <div>
            <p>Event Name :</p>
            <input id="eventname" name="event_name" value="" disabled>
            </div>
            <br>

            <div>
            <p>Date de l'event :</p>
            <input type="datetime-local" id="eventdate" name="event_date" disabled>
            </div>
            <br>

            <div>
            <p>Description :</p>
            <br>
            <textarea id="descriptionevent" name="description_event" disabled></textarea>
            </div>
            <br>

    </body>
</html>