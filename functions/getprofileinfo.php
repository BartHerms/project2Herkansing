<?php
session_start();
$sql = "SELECT emailadress, voornaam, achternaam, adres, bedrijf, telefoonnummer, postcode, profielfoto FROM klant WHERE emailadress = '" . $_SESSION['email'] . "'";

if($statement = mysqli_prepare($conn, $sql)) {
    if(mysqli_stmt_execute($statement)) {
        mysqli_stmt_bind_result($statement, $email, $surname, $lastname, $adress, $company, $telephonenumber, $postcode, $profilepicture);
        mysqli_stmt_store_result($statement);
        mysqli_stmt_fetch($statement);
    } else {
        echo "Error tijdens uitvoeren van query";
        die (mysqli_error($conn));
    }
}


?>