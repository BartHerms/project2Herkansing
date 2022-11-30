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
            $Klant = new Klant();
            $Klant->setEmailadress("test.klant@klanten.com");

            //a function that executes the getKlant stored procedure.
            //it fills a Klant instance with info form the database
            function getKlantProcedure($Klant){
                $db = mysqli_connect(SERVER_IP, "root", null, "project2");
                $result = $db->query("CALL getKlant('{$Klant->getEmailadress()}')");
                $db->close();
                $Klant->setKlant($result);
            }

            //a function that executes teh getDienstenOfKlantProcedur
            //it fills an array of Dienst instances with Diensten that the Klant has.
            function getDienstOfKlantProcedure($Klant){
                $db = mysqli_connect(SERVER_IP, "root", null, "project2");
                $result = $db->query("CALL getDienstOfKlantProcedure('{$Klant->getEmailadress()}')");
                $db->close();
            }
            
            getKlantProcedure($Klant);
            var_dump($Klant);

        ?>

        <form>
            <select name="selectedDienst">
                
            </select>
        </form>
    </body>
</html>