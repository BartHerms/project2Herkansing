<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            define("SERVER_IP", "localhost");
            $emailadressKlant = "test.klant@klanten.com";
            $db = mysqli_connect(SERVER_IP, "root", null, "project2");
            if (isset($db)){
                echo "succes";
            }
            $result = $db->query("CALL getKlant()");
            if (isset($result)){
                echo "succes";
            }
        ?>
    </body>
</html>