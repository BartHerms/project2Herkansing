<?php
include '../classes/Klant.php';

$Klant = new Klant();
$Klant->setEmailadress($_GET['email']);
$Klant->getKlantProcedure();
$knaam = $Klant->getVoornaam();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style.css" type="text/css" rel="stylesheet">
    <title>overizicht: <?php print $knaam;?></title>
</head>
<body>
<?php 
        if($_SESSION['isKlant'] == 3){
            include_once("menu/header.html");
        } else{
            include_once("menu/header_empl.html");
        }
    ?>
    <main>
        <div class="leftDiv klant">
            <h1>Profiel</h1>
            <div class="profilephoto">
                <img src="images/profilepicture.jpg" alt="test">
                <a class="quicklink"href="ticketOverview.php">Tickets bekijken</a>
                <a class="quicklink"href="#">Diensten bekijken</a>
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
    </main>
    
</body>
</html>