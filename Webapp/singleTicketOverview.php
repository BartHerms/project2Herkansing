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

            $Ticket = new Ticket();
            $Ticket->setId(3);
            $Ticket->getSingleTicket();
            var_dump($Ticket);
        ?>
        <main>
            <div>
                <h1>Tickets</h1>
                <p>Nummer:</p>
                <p>Status:</p>
                <p>Behandelaar:</p>
                <p>Beoordelen:</p>
            </div>
            <div>
                <div>
                /* insert onderwerp hier */
                </div>
                <textarea>
                /* insert vraag hier */
                </textarea>
            </div>
        </main>
    </body>
</html>