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

//get the services requested by customers
function getDienstenProcedure($emailadressKlant){
    $db = mysqli_connect("localhost", "root", "root", "project2");
    $result = $db->query("CALL getDienstenOfKlant('{$emailadressKlant}')");
    $db->close();
    $rowCount = $result->num_rows;


    for ($counter = 1; $counter <= $rowCount; $counter++){
        $Dienst = new Dienst();
        $Dienst->setDienst($result);
        echo "<a href='' class='entry'><p>{$Dienst->getNaam()}</p></a>";
       
    }

}


?>