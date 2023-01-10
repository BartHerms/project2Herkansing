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

function getTicketsFromDb(){
    $db = mysqli_connect(SERVER_IP, "root", "root", "project2");
    $result = $db->query("CALL getTickets()");
    $db->close();
    $rowCount = $result->num_rows;

    for ($counter = 1; $counter <= $rowCount; $counter++){
        $Ticket = new Ticket();
        $Ticket->setTicket($result);
        echo "<a href='singleTicketOverview.php?TicketId={$Ticket->getId()}' ><div class='ticketList'><p>{$Ticket->getOnderwerp()}, TicketID: {$Ticket->getId()}</p>{$Ticket->checkGeopendOp()}</div></a>";
    }
}

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
?>