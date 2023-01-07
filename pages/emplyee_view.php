<?php

$emailadressMedewerker = "henk.henkerd@serviceit.nl"; //change hard codes email to email from cookie when login is ready
$Medewerker = new Medewerker();
$Medewerker->getMedewerkerProcedure($emailadressMedewerker);
$Mnaam = $Medewerker->getVoornaam();

include_once("menu/header_empl.html");
?>
<h1> Goedemorgen <?php echo $Mnaam;?></h1>
    <div class="fastview ">
            <a href="#"class="boxitem margin_employee">
                <p>klanten</p> 
            </a> 
            <a href="#"class="boxitem margin_employee">
                <p>Diensten</p> 
            </a> 
            <a href="#"class="boxitem margin_employee">
                <p>Tickets</p> 
            </a>     
    </div>