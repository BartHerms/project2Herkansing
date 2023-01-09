<?php
include '../classes/Klant.php';

$emailadressKlant = $_GET['email'];
$Klant = new Klant();
$Klant->getKlantProcedure($Klant, $emailadressKlant);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style.css" type="text/css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<?php include_once("../menu/header_empl.html"); ?>
    <div class="container">
        <div class="item">
            <h1>Profiel</h1>
            <div class="profilephoto">
                <img src="images/profilepicture.jpg" alt="test">
                <a href="#">Tickets bekijken</a>
                <a href="#">Diensten bekijken</a>
            </div>
        </div>
        <div class="item">
            <div class="profileinformation">
                <h2><?php echo $Klant->getVoornaam(); $Klant->getAchternaam();?></h2>
                <form action="formactions.php" method="post">
                    <label for="adres">Adres</label>
                    <input type="text" name="adres" value="<?php echo $Klant->getAdres(); ?>">

                    <label for="postcode">Postcode</label>
                    <input type="text" name="postcode" value="<?php echo $Klant->getPostcode();?>">

                    <label for="Woonplaats">Woonplaats</label>
                    <input type="text" name="woonplaats" value="<?php echo $Klant->getWoonplaats();?>">

                    <label for="name">Telefoon</label>
                    <input type="int" name="telefoon" value="<?php echo $Klant->getTelefoonnummer(); ?>">

                    <label for="email">Email</label>
                    <input type="email" name="email" value="<?php echo $Klant->getEmailadress(); ?>">

                    <input type="submit" name="edit" value="Profiel wijzigen">
                    <input type="submit" name="remove" value="Profiel verwijderen">
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>