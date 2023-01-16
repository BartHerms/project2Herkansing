<?php
    session_start();
    include '../classes/medewerker.php';
    include '../classes/Ticket.php';
    
    include '../functions.php';

    define("SERVER_IP", "localhost"); 

    $optionArray = array();
    $optionArray = getMedewerkers();

    $Medewerker = new medewerker();
    $Medewerker->setEmailadress($_SESSION['email']);
    $Ticket = new Ticket();
    $Ticket->setId($_GET['TicketId']);

    employeeAssignSelf($Ticket);
    employeeAssign($Ticket);

    $Ticket->getSingleTicket();
    $Ticket->processForm();
    header("Location: singleTicketOverview.php?TicketId={$_GET['TicketId']}");
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