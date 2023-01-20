DELIMITER &&  
CREATE PROCEDURE setTicketGeopendOp(IN ticketID BIGINT)
BEGIN
UPDATE ticket
SET geopendOp = curdate()
WHERE id = ticketID;
END &&