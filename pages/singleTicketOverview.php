<?php
    session_start();
    include '../classes/Medewerker.php';
    include '../classes/Ticket.php';
    
    include '../functions.php';

    define("SERVER_IP", "localhost"); 

    $optionArray = array();
    $optionArray = getMedewerkers();

    $Medewerkerst = new Medewerker();
    $Medewerkerst->setEmailadress($_SESSION['email']);
    $Medewerkerst->getMedewerkerProcedure($Medewerkerst->getEmailadress());
    $Ticket = new Ticket();
    $Ticket->setId($_GET['TicketId']);
    $Ticket->updateStatus();
    $Ticket->setTicketGeopendOp();
    $Ticket->getSingleTicket();
    if(!empty($Ticket->getMedewerker()->getEmailadress())){
        $Ticket->getMedewerker()->getMedewerkerProcedure($Ticket->getMedewerker()->getEmailadress());
    }
?>﻿
<!DOCTYPE HTML>
<html>
    <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link href="../style.css" type="text/css" rel="stylesheet">
       <title>placeholder</title>
    </head>
    <body>
    <?php 
        if($_SESSION['isKlant'] == 3){
            include_once("menu/header.html");
        } else{
            include_once("menu/header_empl.html");
        }
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
                        $Medewerkerst->medewerkerAssignment($Ticket->getMedewerker(), $optionArray);            
                    ?>
                </p>
                <p id='bottomP'>Beoordelen: </p>
                    <form action=' <?php echo "singleTicketOverview.php?TicketId={$Ticket->getId()}"; ?>' method='POST'>  
                        <button type="submit" name="setStatusGreen" class="icons">
                            <img src="../icons/icon-action-check_circle_24px.svg" alt='green check'/>
                        </button>
                        <button type="submit" name="setStatusOrange" class="icons">
                            <img src="../icons/icon-alert-error_24px.svg" alt='orange exclemation point'/>
                        </button>
                        <button type="submit" name="setStatusRed" class="icons">
                            <img src="../icons/icon-navigation-close_24px.svg" alt='red cross'/>
                        </button>
                    </form>
            </div>
            <div class='rightDiv'>
                <div class='onderwerpDiv formBox'>
                    <?php
                        echo "<p>{$Ticket->getOnderwerp()}</p>";
                    ?>
                </div>
                <form action="<?php echo "singleTicketAction.php?TicketId={$Ticket->getId()}"; ?>" method="POST">
                    <textarea class='formBox' name="ticketText" required><?php echo $Ticket->getLogfile(); ?></textarea>
                    <input class='button' type="submit" name="submitTicket" value="Aanmaken">
                </form>
            </div>
        </main>
    </body>
</html>