<?php
    include 'classes/Ticket.php';
    include 'function.php';

    define("SERVER_IP", "localhost"); 

    $emailMedewerker = "peter.peterson@serviceit.nl";

    $Ticket = new Ticket();
    $Ticket->setId($_GET['TicketId']);
    $Ticket->addMedewerkerToTicket($emailMedewerker);
    $Ticket->updateStatus();
    $Ticket->getSingleTicket();
    $Ticket->setMedewerker();
?>﻿
<!DOCTYPE HTML>
<html>
    <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link href="style.css" type="text/css" rel="stylesheet">
       <title>placeholder</title>
    </head>
    <body>
        <?php
            include_once 'menu/header.html';   
        ?>
        <main>
            <div class='leftDiv'>
                <h1>Tickets</h1>
                <p>Nummer: <?php echo $Ticket->getId()?></p>
                <p>Status: <br>
                    <?php 
                        showStatusIcon($Ticket->getStatus());
                    ?> 
                </p>
                <p>Behandelaar: <br>
                    <?php 
                        showMedewerkerNaam($Ticket->getMedewerker());              
                    ?>
                </p>
                <p id='bottomP'>Beoordelen: </p>
                    <form action=' <?php echo "singleTicketOverview.php?TicketId={$Ticket->getId()}"; ?>' method='POST'>  
                        <button type="submit" name="setStatusGreen" class="icons">
                            <img src="icons/icon-action-check_circle_24px.svg" alt='green check'/>
                        </button>
                        <button type="submit" name="setStatusOrange" class="icons">
                            <img src="icons/icon-alert-error_24px.svg" alt='orange exclemation point'/>
                        </button>
                        <button type="submit" name="setStatusRed" class="icons">
                            <img src="icons/icon-navigation-close_24px.svg" alt='red cross'/>
                        </button>
                    </form>
            </div>
            <div class='rightDiv'>
                <div class='onderwerpDiv formBox'>
                    <?php
                        echo "<p>{$Ticket->getOnderwerp()}</p>";
                    ?>
                </div>
                <form action="ticketUpdateFormProcess.php" method="POST">
                    <textarea class='formBox' name="ticketText" required><?php echo $Ticket->getLogfile(); ?></textarea>
                    <input class='button' type="submit" name="submitTicket" value="Aanmaken">
                </form>
            </div>
        </main>
    </body>
</html>