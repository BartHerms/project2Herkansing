<?php
session_start();
include '../classes/Klant.php';
include '../classes/Medewerker.php';
include '../classes/ticket.php';
include '../classes/dienst.php';
include '../functions.php';
define("SERVER_IP", "localhost");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style.css" type="text/css" rel="stylesheet">
    <title>Home</title>
</head>
<body>
 
    <?php

    
  
        if($_SESSION['isKlant'] == 3){ 
            include_once("klant_view.php");
        } else if ($_SESSION['isKlant'] == 2){
            include_once("emplyee_view.php");
        } else{
            Print("404 pagina niet gevonden");
        }
        
     ?>
   

</body>
</html>