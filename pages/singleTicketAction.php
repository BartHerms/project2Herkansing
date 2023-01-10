<?php
    include '../classes/medewerker.php';
    include '../classes/Ticket.php';
    
    include '../functions.php';

    define("SERVER_IP", "localhost"); 

    $optionArray = array();
    $optionArray = getMedewerkers();

    $Medewerker = new medewerker();
    $Medewerker->setEmailadress("peter.peterson@serviceit.nl");
    $Ticket = new Ticket();
    $Ticket->setId($_GET['TicketId']);
    $Ticket->updateStatus();
    $Ticket->setTicketGeopendOp();

    if (isset($_POST['assignSelf'])){
		$Ticket->addMedewerkerToTicket($Medewerker->getEmailadress());
        $Ticket->setMedewerker($Medewerker->getEmailadress());
	}
    
    
    $Ticket->getSingleTicket();
    $Ticket->getMedewerker()->getMedewerkerProcedure($Ticket->getMedewerker()->getEmailadress());
    header("Location: singleTicketOverview.php");
    die();
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
    </body>
</html>