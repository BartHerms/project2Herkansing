<?php
session_start();
$Klant = new Klant();
$Klant->setEmailadress($_SESSION['email']);
$Klant->getKlantProcedure();
$Knaam = $Klant->getVoornaam();


include_once("menu/header.html");
?>
<h1> Goedemorgen <?php echo $Knaam;?></h1>

<div class="fastview">
        <div class="row">
        <h3>Recente tickets</h3>
        <?php getRecentTicketsFromDb($Klant->getEmailadress()); ?>
        </div>    
        <div class="row">
            <h3>Mijn diensten</h3>
            <?php $Klant->getDienstenProcedure(); ?>
        </div>    
    </div>