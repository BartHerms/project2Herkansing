<?php
$emailadressKlant = $_GET['email'];
include 'classes/Klant.php';
$Klant = new Klant();
$Klant->getKlantProcedure($Klant, $emailadressKlant);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" type="text/css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<?php include_once("menu/header.html"); ?>
    <div class="container">
        <div class="item">
            <h1>Profiel</h1>
            <div class="profilephoto">
                <img src="images/profilepicture.jpg" alt="test">
                <a href="changeprofilepicture.php">Profielfoto wijzigen</a>
            </div>
        </div>
        <div class="item">
            <div class="profileinformation">
                <h2><?php echo $Klant->getVoornaam(); $Klant->getAchternaam();?></h2>
                <form action="" method="post">
                    <label for="adres">Adres</label>
                    <input type="text" name="adres" value="<?php echo $Klant->getAdres(); ?>">

                    <label for="postcode">Postcode</label>
                    <input type="text" name="postcode" value="7654TR">

                    <label for="name">Telefoon</label>
                    <input type="int" name="telephone" value="<?php echo $Klant->getTelefoonnummer(); ?>">

                    <label for="email">Email</label>
                    <input type="email" name="email" value="<?php echo $Klant->getEmailadress(); ?>">

                    <input type="submit" name="submit" value="Profiel wijzigen">
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>