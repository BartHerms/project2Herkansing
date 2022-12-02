﻿<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            include 'classes/Ticket.php';

            define("SERVER_IP", "localhost"); 
            
            $db = mysqli_connect(SERVER_IP, "root", null, "project2");
            $result = $db->query("CALL getTickets()");
            $db->close();
            $rowCount = $result->num_rows;

            for ($counter = 1; $counter <= $rowCount; $counter++){
                $Ticket = new Ticket();
                $Ticket->setTicket($result);
                echo "<div>'{$Ticket->getOnderwerp()}'</div>";
            }
        ?>
    </body>
</html>