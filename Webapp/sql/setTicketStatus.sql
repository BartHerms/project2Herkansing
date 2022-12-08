DELIMITER &&  
CREATE PROCEDURE setTicketStatus(IN statusInput char(1), IN ticketID BIGINT)
BEGIN
UPDATE ticket
SET status = statusInput
WHERE id = ticketID;
END &&