<?php


function getKlantProcedure($Klant){
    define("SERVER_IP", "localhost");
    $emailadressKlant = "test.klant@klanten.com";
    $db = mysqli_connect(SERVER_IP, "root","root" , "project2");
    $result = $db->query("CALL getKlant('{$emailadressKlant}')");
    $db->close();
    $Klant->setKlant($result);
}

function getMedewerkerProcedure($Medewerker){
    define("SERVER_IP", "localhost");
    $emailadressMedewerker = "henk.henkerd@serviceit.nl";
    $db = mysqli_connect(SERVER_IP, "root","root" , "project2");
    $result = $db->query("CALL getMedewerker('{$emailadressMedewerker}')");
    $db->close();
    $Medewerker->setMedewerker($result);
}

function getRecentTicketsFromDb(){
    $db = mysqli_connect(SERVER_IP, "root", "root", "project2");
        $result = $db->query("CALL getTickets()");
        $db->close();
        $rowCount = $result->num_rows;

        for ($counter = 1; $counter <= $rowCount; $counter++){
            $Ticket = new Ticket();
            $Ticket->setTicket($result);
            echo "<a href='' class='entry'>{$Ticket->getOnderwerp()} <br> {$Ticket->getStatus()}</a>";
           
        }
}

function getDienstenProcedure(){
    //define("SERVER_IP", "localhost");
    $emailadressKlant = "test.klant@klanten.com";
    $db = mysqli_connect("localhost", "root", "root", "project2");
    $result = $db->query("CALL getDienstenOfKlant('{$emailadressKlant}')");
    $db->close();
    $rowCount = $result->num_rows;


    for ($counter = 1; $counter <= $rowCount; $counter++){
        $Dienst = new Dienst();
        $Dienst->setDienst($result);
        echo "<a href='' class='entry'>{$Dienst->getNaam()} <br> {$Dienst->getId()}</a>";
       
    }

}


?>