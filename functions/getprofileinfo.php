<?php
$sql = "SELECT emailadress, voornaam, achternaam, adres, bedrijf, telefoonnummer, postcode, profielfoto FROM klant";

if($statement = mysqli_prepare($connection, $sql)) {
    if(mysqli_stmt_execute($statement)) {
        mysqli_stmt_bind_result($statement, $email, $surname, $lastname, $adress, $company, $telephonenumber, $postcode, $profilepicture);
        mysqli_stmt_store_result($statement);
        mysqli_stmt_fetch($statement);
    } else {
        echo "Error tijdens uitvoeren van query";
        die (mysqli_error($connection));
    }
}


?>