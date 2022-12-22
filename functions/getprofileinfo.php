<?php
$sql = "SELECT voornaam, achternaam, adres, postcode, telefoonnummer, emailadress, profielfoto FROM klant";

if($statement = mysqli_prepare($connection, $sql)) {
    if(mysqli_stmt_execute($statement)) {
        mysqli_stmt_bind_result($statement, $surname, $lastname, $adress, $postcode, $telephonenumber, $email, $profilepicture);
        mysqli_stmt_store_result($statement);
        mysqli_stmt_fetch($statement);
    } else {
        echo "Error tijdens uitvoeren van query";
        die (mysqli_error($connection));
    }
}


?>