DELIMITER &&  
CREATE PROCEDURE getTicketsofMedewerker(IN emailInput char(255))
BEGIN
SELECT ticket.id, ticket.idOvereenkomst, ticket.emailMedewerker, ticket.status, ticket.datum, ticket.logfile, dienst.naam, geopendOp
FROM ticket LEFT JOIN overeenkomst
ON ticket.idOvereenkomst = overeenkomst.id
JOIN dienst ON overeenkomst.idDienst = dienst.id
WHERE ticket.emailMedewerker = emailInput
LIMIT 25;
END &&