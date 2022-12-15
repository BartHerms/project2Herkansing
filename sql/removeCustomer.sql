DELIMITER &&
BEGIN
CREATE PROCEDURE removeKlant(IN emailadressKlant char(255))
DELETE FROM klant
WHERE emailadress = emailadressKlant;
END &&