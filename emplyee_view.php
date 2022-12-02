<?php
$Klant = new Klant();
getKlantProcedure($Klant);
$Knaam = $Klant->getVoornaam();

include_once("menu/header_empl.html");
?>
<h1> Goedemorgen <?php print $Knaam;?></h1>
    <div class="fastview ">
            <a href="#"class="boxitem margin_employee">
                <p>klanten</p> 
            </a> 
            <a href="#"class="boxitem margin_employee">
                <p>Dienstaanvragen</p> 
            </a> 
            <a href="#"class="boxitem margin_employee">
                <p>Tickets</p> 
            </a>     
    </div>
