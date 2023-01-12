﻿<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            session_start();
            include '../classes/Ticket.php';
            include '../function.php';

            define("SERVER_IP", "localhost"); 

            $Ticket = new Ticket();
            $Ticket->setId($_GET['TicketId']);
            $Ticket->getSingleTicket();
            $Ticket->processForm();
        ?>
        <main>
            <h1>Bedankt</h1>
        </main>
    </body>
</html>