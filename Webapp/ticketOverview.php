﻿<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            include 'classes/Ticket.php';
            include 'function.php';

            define("SERVER_IP", "localhost"); 

        ?>
        <main>
        <div><h1>Tickets</h1></div>
        <div id="ticketList">
            <?php
                getTicketsFromDb();
            ?>
        </div>
        </main>
    </body>
</html>