<?php
    include '../classes/Klant.php';
    include '../classes/Dienst.php';
    include '../function.php';
            
    define("SERVER_IP", "localhost"); 
    $Klant = new Klant();
    $Klant->setEmailadress("test.klant@klanten.com");

	$Klant->processForm();
?>
<!DOCTYPE HTML>
<html>
    <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link href="style.css" type="text/css" rel="stylesheet">
       <title>placeholder</title>
    </head>
    <body>
        <?php
	        include_once 'menu/header.html';
        ?>
        <main class='thanksMessage'>
            <h1>Bedankt voor uw ticket</h1>
        </main>
    </body>
</html>