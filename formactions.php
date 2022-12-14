<?php
$emailadressKlant = $_POST['email'];
$adresKlant = $_POST['adres'];
$woonplaatsKlant = $_POST['woonplaats'];
$postcodeKlant = $_POST['postcode'];
$telefoonnummerKlant = $_POST['telefoon'];

include 'classes/Klant.php';
$Klant = new Klant();
$Klant->getKlantProcedure($Klant, $emailadressKlant);

if(isset($_POST['edit'])){
    define("SERVER_IP", "localhost");
    $db = mysqli_connect(SERVER_IP, "root","root" , "project2");
    $result = $db->query("CALL updateKlant('{$emailadressKlant}', '{$woonplaatsKlant}', '{$adresKlant}', '{$telefoonnummerKlant}', '{$postcodeKlant}')");
    header("Location: ind_klant.php?email='{$emailadressKlant}'");
    //header('Location: klanten.php');

}

if(isset($_POST['remove'])){
    define("SERVER_IP", "localhost");
    $db = mysqli_connect(SERVER_IP, "root","root" , "project2");
    $result = $db->query("CALL removeKlant('{$emailadressKlant}')");
    header('Location: klanten.php');
    
}
?>