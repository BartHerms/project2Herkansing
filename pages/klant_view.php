<?php
$emailadressKlant = "kareldegrote@gamer.pizza"; //change hard codes email to email from cookie when login is ready
$Klant = new Klant();
$Klant->getKlantProcedure($Klant, $emailadressKlant);
$Knaam = $Klant->getVoornaam();


include_once("menu/header.html");
?>
<h1> Goedemorgen <?php echo $Knaam;?></h1>

<div class="fastview">
        <div class="row">
        <h3>Laatste tickets</h3>
        <?php getRecentTicketsFromDb(); ?>
        </div>    
        <div class="row">
            <h3>Mijn diensten</h3>
            <?php getDienstenProcedure($emailadressKlant); ?>
        </div>    
    </div>