<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            include 'classes/Klant.php';
            include 'classes/Dienst.php';
            include 'function.php';

            define("SERVER_IP", "localhost"); 
            $Klant = new Klant();
            $Klant->setEmailadress("test.klant@klanten.com");
            $optionArray = array();

            $Klant->getKlantProcedure($Klant);
            $optionArray = $Klant->getDienstOfKlantProcedure();
        ?>

        <form action="ticketFormProcess.php" method="POST">
            <select name="selectedDienst">
                <?php
                    makeOptionList($optionArray);
                ?>
            </select>
            <textarea name="ticketText" placeholder="Stel hier uw vraag..." required></textarea>
            <input type="submit" name="submitTicket">
        </form>

    </body>
</html>