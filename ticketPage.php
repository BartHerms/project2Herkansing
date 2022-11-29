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
            $Klant = new Klant;

            $db = mysqli_connect(SERVER_IP, "root", null, "project2");
            if (isset($db)){
                echo "succes <br>";
            }
            $result = $db->query("CALL getKlant('{$emailadressKlant}')");
            if (isset($result)){
                echo "succes <br>";
            }

            $Klant->setKlant($result);
            var_dump($Klant);
        ?>
    </body>
</html>