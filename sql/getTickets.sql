DELIMITER &&  
CREATE PROCEDURE getTickets()
BEGIN
SELECT ticket.id, ticket.idOvereenkomst, ticket.emailMedewerker, ticket.status, ticket.datum, ticket.logfile, dienst.naam, geopendOp
FROM ticket LEFT JOIN overeenkomst
ON ticket.idOvereenkomst = overeenkomst.id
JOIN dienst ON overeenkomst.idDienst = dienst.id
LIMIT 25;
END &&