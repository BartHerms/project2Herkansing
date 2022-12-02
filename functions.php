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

?>