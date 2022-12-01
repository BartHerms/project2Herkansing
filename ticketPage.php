<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            include 'classes/Klant.php';
            include 'classes/Dienst.php';

            define("SERVER_IP", "localhost"); 
            $Klant = new Klant();
            $Klant->setEmailadress("test.klant@klanten.com");
            
            //a function that executes teh getDienstenOfKlantProcedur
            //it fills an array of Dienst instances with Diensten that the Klant has.
            function getDienstOfKlantProcedure($Klant){
			    $dienstenArray[] = array();
                $db = mysqli_connect(SERVER_IP, "root", null, "project2");
                $result = $db->query("CALL getDienstenOfKlant('{$Klant->getEmailadress()}')");
                $db->close();
                $rowCount = $result->num_rows;

			    for ($counter = 1; $counter <= $rowCount; $counter++){
				    $Dienst = new Dienst();
				    $Dienst->setDienst($result);
				    array_push($dienstenArray, $Dienst);
			    }
			    var_dump($dienstenArray);
            }

            $Klant->getKlantProcedure($Klant);
            getDienstOfKlantProcedure($Klant);
        ?>

        <form>
            <select name="selectedDienst">
                
            </select>
        </form>

    </body>
</html>