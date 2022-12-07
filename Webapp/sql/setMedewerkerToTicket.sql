DELIMITER &&  
CREATE PROCEDURE setMedewerkerToTicket(IN medewerkerToSet char(255), IN ticketID BIGINT)
BEGIN
UPDATE ticket
SET emailMedewerker = medewerkerToSet
WHERE id = ticketID;
END &&