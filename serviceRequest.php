<?php
    include 'classes/Klant.php';
    include 'classes/Dienst.php';
    include 'functions.php';

    define("SERVER_IP", "localhost");

    $Klant = new Klant();
    $Klant->setEmailadress('test.klant@klanten.com');
    $optionArray = array();
    $optionArray = $Klant->getDienstenNotOfKlantProcedure();
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
        <div class='leftDiv' >
            <p>Ticket</p>
            <p>aanmaken</p>
        </div>
            <div class='rightDiv'>
                <form action="serviceRequestFormProcess.php" method="POST">
                    <select class='formBox' name="selectedDienst">
                        <?php
                            makeOptionList($optionArray);
                        ?>
                    </select>
                    <textarea class='formBox' name="requestComment" placeholder="Stel hier uw vraag..." required></textarea>
                    <input class='button' type="submit" name="submitRequest" value="Aanmaken">
                </form>
            </div>
        </main>
    </body>
</html>