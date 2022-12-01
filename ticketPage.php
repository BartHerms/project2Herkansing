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
            $dienstenArray[] = array();
            
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
                array_shift($dienstenArray);
			    return $dienstenArray;
            }

            //takes an array filled with Diensten and makes <option>'s for a <select> from them
            function makeOptionList($array){
                if (!empty($array)){
                    foreach ($array as Dienst){
                        $value = Dienst->getNaam();
                        echo "<option value='{$value}'>{$value}</option>";
                    }
                }
                else{
                        echo "<option value='null'>None</option>";
                }
            }

            $Klant->getKlantProcedure($Klant);
            $dienstenArray = getDienstOfKlantProcedure($Klant);
        ?>

        <form>
            <select name="selectedDienst">
                <?php
                    makeOptionList($dienstenArray);
                ?>
            </select>
            <textarea name="ticketText" placeholder="Stel hier uw vraag..." required></textarea>
            <input type="submit" value="Submit">
        </form>

    </body>
</html>