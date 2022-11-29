<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            include 'classes/Klant.php';

            define("SERVER_IP", "localhost");
            $emailadressKlant = "test.klant@klanten.com";
            $Klant = new Klant();

            $db = mysqli_connect(SERVER_IP, "root", null, "project2");
            $result = $db->query("CALL getKlant('{$emailadressKlant}')");
            $db->close();
            $Klant->setKlant($result);
        ?>
    </body>
</html>