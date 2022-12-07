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
                    <?php
                        echo "<p>{$Ticket->getOnderwerp()}</p>";
                    ?>
                </div>
                <form action="ticketUpdateFormProcess.php" method="POST">
                    <textarea name="ticketText" required><?php echo $Ticket->getLogfile(); ?></textarea>
                    <input class='button' type="submit" name="submitTicket" value="Aanmaken">
                </form>
            </div>
        </main>
    </body>
</html>