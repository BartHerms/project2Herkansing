DELIMITER &&  
CREATE PROCEDURE getSingleTicket(IN selectedTicketId BIGINT)
BEGIN
SELECT ticket.id, ticket.idOvereenkomst, ticket.emailMedewerker, ticket.status, ticket.datum, ticket.logfile, dienst.naam, ticket.geopendOp
FROM ticket LEFT JOIN overeenkomst
ON ticket.idOvereenkomst = overeenkomst.id
JOIN dienst ON overeenkomst.idDienst = dienst.id
WHERE ticket.id = selectedTicketID;
END &&