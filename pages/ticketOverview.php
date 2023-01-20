<?php
    session_start();
    include "../classes/Medewerker.php";
    include '../classes/Ticket.php';
    include '../functions.php';

    define("SERVER_IP", "localhost");

    $Medewerkerto = new Medewerker();
    $Medewerkerto->setEmailadress($_SESSION['email']);
    $Medewerkerto->getMedewerkerProcedure($Medewerkerto->getEmailadress());
?>﻿
<!DOCTYPE HTML>
<html>
    <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link href="../style.css" type="text/css" rel="stylesheet">
       <title>ticket overzicht</title>
    </head>
    <body>
    <?php 
        if($_SESSION['isKlant'] == 3){
            include_once("../menu/header.html");
        } else{
            include_once("menu/header_empl.html");
        }
    ?>
        <main>
            <div class='leftDiv'>
                <h1>Tickets</h1>
            </div>
            <div class='rightDiv'>
                <?php
                    getTicketsFromDb($Medewerkerto);
                ?>
            </div>
        </main>
    </body>
</html>