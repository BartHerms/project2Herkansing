<?php
session_start();
$emailadressKlant = $_SESSION['email'];
$Klant = new Klant();
$Klant->getKlantProcedure($Klant, $emailadressKlant);
$Knaam = $Klant->getVoornaam();


include_once("menu/header.html");
?>
<h1> Goedemorgen <?php echo $Knaam;?></h1>

<div class="fastview">
        <div class="row">
        <h3>Recente tickets</h3>
        <?php getRecentTicketsFromDb($emailadressKlant); ?>
        </div>    
        <div class="row">
            <h3>Mijn diensten</h3>
            <?php getDienstenProcedure($emailadressKlant); ?>
        </div>    
    </div>