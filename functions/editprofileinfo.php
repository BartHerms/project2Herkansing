<?php
if(isset($_POST["submit"])){
    $sql = "UPDATE klant SET adres = ?, postcode = ?, telefoonnummer = ?, emailadress = ? WHERE emailadress = ?";

    $adress = filter_input(INPUT_POST, "adres", FILTER_SANITIZE_STRING);
    $postcode = filter_input(INPUT_POST, "postcode", FILTER_SANITIZE_STRING);
    $telephonenumber = filter_input(INPUT_POST, "telephone", FILTER_SANITIZE_NUMBER_INT);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);


    if($statement = mysqli_prepare($connection, $sql)) {
        mysqli_stmt_bind_param($statement, 'ssiss', $adress, $postcode, $telephonenumber, $email, $email);

        if(mysqli_stmt_execute($statement)) {
            echo "Query succesvol uitgevoerd!";
        } else {
            echo "Error tijdens uitvoeren van query";
            die (mysqli_error($connection));
        }
    }
}
?>