<?php

$emailadressMedewerker = "henk.henkerd@serviceit.nl"; //change hard codes email to email from cookie when login is ready
$Medewerker = new Medewerker();
$Medewerker->getMedewerkerProcedure($Medewerker, $emailadressMedewerker);
$Mnaam = $Medewerker->getVoornaam();

include_once("menu/header_empl.html");
?>
<h1> Goedemorgen <?php echo $Mnaam;?></h1>
    <div class="fastview ">
            <a href="klanten.php"class="boxitem margin_employee">
                <p>klanten</p> 
            </a> 
            <a href="#"class="boxitem margin_employee"> /* Pagina mist*/
                <p>Diensten</p> 
            </a> 
            <a href="ticketOverview.php"class="boxitem margin_employee">
                <p>Tickets</p> 
            </a>     
    </div>