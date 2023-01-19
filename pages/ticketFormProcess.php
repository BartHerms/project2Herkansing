<?php
    session_start();
    include '../classes/Klant.php';
    include '../classes/Dienst.php';
    include '../functions.php';
            
    define("SERVER_IP", "localhost"); 
    $Klant = new Klant();
    $Klant->setEmailadress($_SESSION['email']);

	$Klant->processForm();
?>
<!DOCTYPE HTML>
<html>
    <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link href="../style.css" type="text/css" rel="stylesheet">
       <title>bedankt voor uw ticket</title>
    </head>
    <body>
        <?php
	        include_once 'menu/header.html';
        ?>
        <main class='thanksMessage'>
        <?php
            $selectedDienst = filter_input(INPUT_POST, 'selectedDienst', FILTER_SANITIZE_STRING);
            if (!empty($selectedDienst)){
                echo "<h1>Bedankt voor uw ticket</h1>";
            }else{
                echo "<h1>U heeft nog geen producten bij ons</h1>";
            }
        ?>
        </main>
    </body>
</html>