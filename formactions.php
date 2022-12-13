<?php
$emailadressKlant = $_POST['email'];

if(isset($_POST['edit'])){
    

}

if(isset($_POST['remove'])){
    define("SERVER_IP", "localhost");
    $db = mysqli_connect(SERVER_IP, "root","root" , "project2");
    $result = $db->query("CALL removeKlant('{$emailadressKlant}')");
    header('Location: klanten.php');
    
}
?>