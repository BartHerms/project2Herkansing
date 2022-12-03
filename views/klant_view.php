<?php
$Klant = new Klant();
getKlantProcedure($Klant);
$Knaam = $Klant->getVoornaam();


include_once("menu/header.html");
?>
<h1> Goedemorgen <?php print $Knaam;?></h1>

<div class="fastview">
        <div class="row">
        <h3>Laatste tickets</h3>
        <?php getRecentTicketsFromDb(); ?>
        </div>    
        <div class="row">
            <h3>Mijn diensten</h3>
            <?php getDienstenProcedure(); ?>
        </div>    
    </div>