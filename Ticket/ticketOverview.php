﻿<?php
    include '../classes/Ticket.php';
    include '../functions.php';

    define("SERVER_IP", "localhost");
?>﻿
<!DOCTYPE HTML>
<html>
    <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link href="../style.css" type="text/css" rel="stylesheet">
       <title>placeholder</title>
    </head>
    <body>
        <?php
            include_once '../menu/header.html';
        ?>
        <main>
            <div class='leftDiv'>
                <h1>Tickets</h1>
            </div>
            <div class='rightDiv'>
                <?php
                    getTicketsFromDb();
                ?>
            </div>
        </main>
    </body>
</html>