DELIMITER &&  
CREATE PROCEDURE ticketUpdate(IN ticketText TEXT, IN ticketID BIGINT)
BEGIN
UPDATE ticket
SET logfile = ticketText
WHERE id = ticketID;
END &&