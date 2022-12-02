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
            <!--<div class="entry">
                <p>  </p>
            </div>
            <div class="entry">
                <p> onderwerp ticket </p>
            </div>
            <div class="entry">
                <p> onderwerp ticket </p>
            </div>
            <div class="entry">
                <p> onderwerp ticket </p>
            </div>-->
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