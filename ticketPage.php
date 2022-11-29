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
                echo "succes <br>";
            }
            $result = $db->query("CALL getKlant('{$emailadressKlant}')");
            if (isset($result)){
                echo "succes <br>";
            }

            foreach ($result->fetch_all() as &$field){
                
            }
        ?>
    </body>
</html>