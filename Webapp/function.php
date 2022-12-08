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
?>