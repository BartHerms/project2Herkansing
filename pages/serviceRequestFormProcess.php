<?php
    include '../classes/Overeenkomst.php';
    include '../functions.php';

    define("SERVER_IP", "localhost"); 

    $Overeenkomst = new Overeenkomst();
    $Overeenkomst->getKlant()->setEmailadress('test.klant@klanten.com');
    $Overeenkomst->processForm();
?>﻿
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <main>
            <h1>Bedankt</h1>
        </main>
    </body>
</html>