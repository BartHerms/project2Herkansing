<?php
    session_start();
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
<?php 
        if($_SESSION['isKlant'] == 3){
            include_once("../menu/header.html");
        } else{
            include_once("menu/header_empl.html");
        }
    ?>


<main>    
    <div class='leftDiv'>
                <h1>klanten</h1>
            </div>
            <div class='rightDiv customers'>
                <?php
                   getCustomerList();
                ?>
            </div>
</main>  
</body>
</html>