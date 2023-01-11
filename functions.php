<?php
//get the tickets based on customer email
function getRecentTicketsFromDb(){
    $db = mysqli_connect(SERVER_IP, "root", "root", "project2");
    $result = $db->query("CALL getTickets()");
    $db->close();
    $rowCount = $result->num_rows;

        for ($counter = 1; $counter <= $rowCount; $counter++){
            $Ticket = new Ticket();
            $Ticket->setTicket($result);
            echo "<a href='' class='entry'><p>{$Ticket->getOnderwerp()}</p></a>";  
        }
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
        echo "<option value='null'>U heeft alle diensten all</option>";
    }
}

//This function checks if the user is an admin, if so it shows all the tickets, otherwise it shows the tickets assigned to the user.
function getTicketsFromDb($Medewerker){
    $db = mysqli_connect(SERVER_IP, "root", "root", "project2");
    if($Medewerker->getAdmin() == (int)1){
        $result = $db->query("CALL getTickets()");
    }else{
        $result = $db->query("CALL getTicketsofMedewerker('{$Medewerker->getEmailadress()}')");
    }
    $db->close();
    $rowCount = $result->num_rows;
    for ($counter = 1; $counter <= $rowCount; $counter++){
        $Ticket = new Ticket();
        $Ticket->setTicket($result);
        echo "<a href='singleTicketOverview.php?TicketId={$Ticket->getId()}' ><div class='ticketList'><p>{$Ticket->getOnderwerp()}, TicketID: {$Ticket->getId()} {$Ticket->checkGeopendOp()}</p></div></a>";
    }
}

//This function takes a int of a status and displays the correct image
function showStatusIcon($status){
    switch ($status){
        case 1: echo "<img src='../icons/icon-action-check_circle_24px.svg' alt='green check'/>";
                break;
        case 2: echo "<img src='../icons/icon-alert-error_24px.svg' alt='orange exclemation point'/>";
                break;
        case 3: echo "<img src='../icons/icon-navigation-close_24px.svg' alt='red cross'/>";
                break;
        default: echo "<p>Ongelezen</p>";
    }
}

//This function makes a list of links to Customers profiles
function getCustomerList(){
    $db = mysqli_connect("localhost", "root", "root", "project2");
    $result = $db->query("CALL getKlantinfo()");
    $db->close();
    $rowCount = $result->num_rows;
    for ($counter = 1; $counter <= $rowCount; $counter++){
        $Klant = new Klant();
        $Klant->setKlant($result);
        $Kemail = $Klant->getEmailadress();
        echo "<a href='ind_klant.php?email=$Kemail' class='entry'><p>{$Klant->getVoornaam()} {$Klant->getAchternaam()}</p> </a>";
    }
}

//This function puts all the Employee's in a array
function getMedewerkers(){
	$medewerkerArray = array();
	$db = mysqli_connect(SERVER_IP, "root", "root", "project2");
	$result = $db->query("CALL getMedewerkers()");
	$db->close();
	$rowCount = $result->num_rows;
	for ($counter = 1; $counter <= $rowCount; $counter++){
		$tempMedewerker = new Medewerker();
		$tempMedewerker->setMedewerker($result);
		array_push($medewerkerArray, $tempMedewerker);
	}
	return $medewerkerArray;
}

//This function checks if the self assign button has been pressed and, if so, the ticket gets added too the Employee
function employeeAssignSelf($tempTicket){
    if (isset($_POST['assignSelf'])){
		$tempTicket->addMedewerkerToTicket($Medewerker->getEmailadress());
	}
}

//This function checks if a new Employee has been selected for a Tickets and assigns them too it
function employeeAssign($tempTicket){
    if (isset($_POST['assignMedewerker'])){
		$selectedMedewerker = filter_input(INPUT_POST, 'selectedMedewerker', FILTER_SANITIZE_STRING);
		if (!empty($selectedMedewerker)){
			$tempTicket->addMedewerkerToTicket($selectedMedewerker);
		}
	}
}  
?>