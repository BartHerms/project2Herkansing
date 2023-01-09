<?php
include '../classes/Klant.php';
include '../classes/Medewerker.php';
include '../classes/ticket.php';
include '../classes/dienst.php';
include '../functions.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" type="text/css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
 
    <?php
     $isKlant = 0;
        if($isKlant){ 
            include_once("klant_view.php");
        } else if (!$isKlant){
            include_once("emplyee_view.php");
        } else{
            Print("404 pagina niet gevonden");
        }
        
     ?>
   

</body>
</html>