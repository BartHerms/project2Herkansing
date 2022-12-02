<?php
include 'Klant.php';
include 'functions.php';

$Klant = new Klant();
getKlantProcedure($Klant);
$Knaam = $Klant->getVoornaam();



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
    <?php include_once("menu/header.html"); ?>
    <h1> Goedemorgen <?php print $Knaam;?></h1>
    <?php
     $isGeenMederwerker;
        if($isGeenMederwerker){
            include_once("klant_view.php");
        } else if (!$isGeenMederwerker){
            include_once("emplyee_view.php");
        } else{
            Print("404 pagina niet gevonden");
        }
        
     ?>
   

</body>
</html>