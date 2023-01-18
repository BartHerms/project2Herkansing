<?php
    session_start();
    include '../classes/Klant.php';
    include '../classes/Ticket.php';
    
    include '../functions.php';

    define("SERVER_IP", "localhost"); 

    $Klant = new Klant();
    $Klant->setEmailadress($_SESSION['email']);
    $Ticket = new Ticket();
    $Ticket->setId($_GET['TicketId']);
    $Ticket->getSingleTicket();
    $_SESSION['memail'] = $Ticket->getMedewerker()->getEmailadress();
  
?>﻿
<!DOCTYPE HTML>
<html>
    <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link href="../style.css" type="text/css" rel="stylesheet">
       <title>Ticket: <? print $Ticket->getId();?></title>
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
                    $b = $Ticket->getMedewerker()->getVoornaam();
                    if($b !== NULL){
                        print $b;
                    } else{
                        print "Nog niet aangewezen";
                    }
                        
                    ?>
                </p>
            </div>    
  
            <div class='rightDiv'>
                <div class='onderwerpDiv formBox'>
                    <?php
                        echo "<p>{$Ticket->getOnderwerp()}</p>";
                    ?>
                </div>
                <form action="<?php echo "stFormAction.php?TicketId={$Ticket->getId()}"; ?>" method="POST">
                    <textarea class='formBox' name="ticketText" required><?php echo $Ticket->getLogfile(); ?></textarea>
                    <input class='button' type="submit" name="submitTicket" value="Aanmaken">
                </form>
            </div>
        </main>
    </body>
</html>