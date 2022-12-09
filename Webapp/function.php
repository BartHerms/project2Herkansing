<?php
	function getTicketsFromDb(){
		$db = mysqli_connect(SERVER_IP, "root", null, "project2");
        $result = $db->query("CALL getTickets()");
        $db->close();
        $rowCount = $result->num_rows;

        for ($counter = 1; $counter <= $rowCount; $counter++){
            $Ticket = new Ticket();
            $Ticket->setTicket($result);
            echo "<a href='singleTicketOverview.php?TicketId={$Ticket->getId()}' ><div class='ticketList'><p>{$Ticket->getOnderwerp()}, TicketID: {$Ticket->getId()}</p></div></a>";
        }
	}

    function showStatusIcon($status){
        switch ($status){
            case 1: echo "<img src='icons/icon-action-check_circle_24px.svg' alt='green check'/>";
                    break;
            case 2: echo "<img src='icons/icon-alert-error_24px.svg' alt='orange exclemation point'/>";
                    break;
            case 3: echo "<img src='icons/icon-navigation-close_24px.svg' alt='red cross'/>";
                    break;
            default: echo "<p>Ongelezen</p>";
        }
    }

    function showMedewerkerNaam($medewerker){
        if($medewerker != NULL){
            echo "{$medewerker->getVoornaam()} {$medewerker->getAchternaam()}";
        }
        else{
            echo "<form action='singleTicketOverview.php' method='POST'><input type='submit' name='assignMedewerker' value='Behandelen'></form>";
        }
    }
?>