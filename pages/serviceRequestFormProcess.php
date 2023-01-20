<?php
    session_start();
    include '../classes/Overeenkomst.php';
    include '../functions.php';

    define("SERVER_IP", "localhost"); 

    $Overeenkomst = new Overeenkomst();
    $Overeenkomst->getKlant()->setEmailadress($_SESSION['email']);
    
?>﻿
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link href="../style.css" type="text/css" rel="stylesheet">
       <title>Service IT</title>
    </head>
    <body>
        <?php
	        include_once 'menu/header.html';
        ?>
        <main>
            <?php
            $selectedDienst = filter_input(INPUT_POST, 'selectedDienst', FILTER_SANITIZE_STRING);
            if (!empty($selectedDienst)){
                echo "<h1>Bedankt</h1>";
                $Overeenkomst->processForm();
            }else{
                echo "<h1>U heeft geen dienst geselecteerd</h1>";
            }
        ?>
        </main>
    </body>
</html>