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

	        $Klant->processForm();
        ?>

        <h1>Thanks for ticket mjen</h1>
    </body>
</html>