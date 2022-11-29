<?php
include 'Klant.php';

define("SERVER_IP", "localhost");
$emailadressKlant = "test.klant@klanten.com";
$Klant = new Klant();

$db = mysqli_connect(SERVER_IP, "root","root" , "project2");
$result = $db->query("CALL getKlant('{$emailadressKlant}')");
$db->close();
$Klant->setKlant($result);
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

    <div class="fastview">
        <div class="row">
        <h3>Laatste tickets</h3>
            <div class="entry">
                <p> onderwerp ticket </p>
            </div>
            <div class="entry">
                <p> onderwerp ticket </p>
            </div>
            <div class="entry">
                <p> onderwerp ticket </p>
            </div>
            <div class="entry">
                <p> onderwerp ticket </p>
            </div>
        </div>    
        <div class="row">
            <h3>Mijn diensten</h3>
            <div class="entry">
                <p> onderwerp ticket </p>
            </div>
            <div class="entry">
                <p> onderwerp ticket </p>
            </div>
            <div class="entry">
                <p> onderwerp ticket </p>
            </div>
            <div class="entry">
                <p> onderwerp ticket </p>
            </div>
        </div>    
    </div>

</body>
</html>