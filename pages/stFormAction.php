<?php
    session_start();
    include '../classes/Ticket.php';
    
    include '../functions.php';

    define("SERVER_IP", "localhost"); 

    $Ticket = new Ticket();
    $Ticket->setId($_GET['TicketId']);

    employeeAssign($Ticket);

    $Ticket->getSingleTicket();
    $Ticket->processForm();
    header("Location: stocustomer.php?TicketId={$_GET['TicketId']}");
    die();
?>﻿