<?php
    include '../classes/Klant.php';
    include '../functions.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style.css" type="text/css" rel="stylesheet">
    <title>Klanten overzicht</title>
</head>
<body>
    <?php include_once("menu/header_empl.html");?>


    <div class="customers">
    <aside><p>Klanten</p></aside>
        <div class="crow">
        <?php  getCustomerList();?>
        </div>
    </div>
    
</body>
</html>