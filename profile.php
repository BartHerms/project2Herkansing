<?php
include_once("functions/dbconnect.php");
include_once("functions/getprofileinfo.php");
include_once("functions/editprofileinfo.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/style.css">
    <title>Profiel</title>
</head>
<body>
    <?php include_once("menu/header_empl.html"); ?>
    <div class="container">
        <div class="item">
            <h1>Profiel</h1>
            <div class="profilephoto">
                <img src="images/profilepicture.jpg" alt="test" width="200" height="200">
                <a href="">Profielfoto wijzigen</a>
            </div>
        </div>
        <div class="item">
            <div class="profileinformation">
                <h2><?php echo $surname." ".$lastname; ?></h2>
                <form action="" method="post">
                    <label for="adres">Adres</label>
                    <input type="text" name="adres" value="<?php echo $adress; ?>">

                    <label for="postcode">Postcode</label>
                    <input type="text" name="postcode" value="<?php echo $postcode; ?>">

                    <label for="name">Telefoon</label>
                    <input type="int" name="telephone" value="<?php echo $telephonenumber; ?>">

                    <label for="email">Email</label>
                    <input type="email" name="email" value="<?php echo $email; ?>">

                    <input type="submit" name="submit" value="Profiel wijzigen">
                </form>
            </div>
        </div>
    </div>
</body>
</html>