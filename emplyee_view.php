<?php
$Medewerker = new Medewerker();
getMedewerkerProcedure($Medewerker);
$Mnaam = $Medewerker->getVoornaam();

include_once("menu/header_empl.html");
?>
<h1> Goedemorgen <?php print $Mnaam;?></h1>
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
