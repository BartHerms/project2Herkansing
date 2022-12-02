<?php
	//ticketPage functions! ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    //please keep in order

    //a function that executes teh getDienstenOfKlantProcedur
    //it fills an array of Dienst instances with Diensten that the Klant has.
    function getDienstOfKlantProcedure($Klant){
		$dienstenArray = array();
        $db = mysqli_connect(SERVER_IP, "root", null, "project2");
        $result = $db->query("CALL getDienstenOfKlant('{$Klant->getEmailadress()}')");
        $db->close();
        $rowCount = $result->num_rows;

		for ($counter = 1; $counter <= $rowCount; $counter++){
			$DienstOfKlant = new Dienst();
			$DienstOfKlant->setDienst($result);
			array_push($dienstenArray, $DienstOfKlant);
		}
		return $dienstenArray;
    }

    //takes an array filled with Diensten and makes <option>'s for a <select> from them
    function makeOptionList($array){
        if (!empty($array)){
            foreach ($array as $DienstOfKlant){
                $value = $DienstOfKlant->getNaam();
                echo "<option value='{$value}'>{$value}</option>";
            }
        }
        else{
            echo "<option value='null'>Dienst vereist</option>";
        }
    }

    //puts tickets in the database
    function pushTicket($Klant, $selectedDienst, $ticketText){
        $dienstOfKlantArray = array();
        $dienstOfKlantArray = getDienstOfKlantProcedure($Klant);
        foreach ($dienstOfKlantArray as $DienstOfKlant){
            if ($selectedDienst == $DienstOfKlant->getNaam()){
                $db = mysqli_connect(SERVER_IP, "root", null, "project2");
                $result = $db->query("CALL ticketSubmit({$DienstOfKlant->getId()}, '{$ticketText}')");
                $db->close();
            }
        }
    }
            
    //checks validity of form data and runs pushTicket
    function processForm($Klant){
        if (isset($_POST['submitTicket'])){
            $selectedDienst = filter_input(INPUT_POST, 'selectedDienst', FILTER_SANITIZE_STRING);
            $ticketText = filter_input(INPUT_POST, 'ticketText', FILTER_SANITIZE_STRING);

            if (!empty($selectedDienst) && !empty($ticketText)){
                pushTicket($Klant, $selectedDienst, $ticketText);
            }
        }
    }

    //End ticketPage Functions! ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
?>