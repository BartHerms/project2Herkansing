<?php
    session_start();
    include "../classes/Klant.php";
    include '../classes/Ticket.php';
    include '../functions.php';

    $Klant = new Klant();
    $Klant->setEmailadress($_SESSION['email']);
    $Klant->getKlantProcedure();
    

    
?>﻿
<!DOCTYPE HTML>
<html>
    <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link href="../style.css" type="text/css" rel="stylesheet">
       <title>Ticket overzicht</title>
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
            <div class='leftDiv wide'>
                <h1>Tickets</h1>
                <a class="reqTick" href="ticketPage.php">Ticket aanmaken</a>
            </div>
            <div class='rightDiv customers'>
                <?php
                    getKlantTicketsFromDb($Klant->getEmailadress());
                ?>
                
            </div>
        </main>
    </body>
</html>