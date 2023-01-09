DELIMITER &&  
CREATE PROCEDURE ticketSubmit (IN idOvereenkomstInput INT, IN ticketDescription char(255))
BEGIN
INSERT INTO ticket (idOvereenkomst, status, datum, logfile)
VALUES (idOvereenkomstInput, 1, curdate(), ticketDescription);
END&&