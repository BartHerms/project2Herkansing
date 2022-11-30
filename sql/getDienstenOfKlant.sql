DELIMITER &&  
CREATE PROCEDURE getDienstenOfKlant (IN emailadressKlant char(255))
BEGIN
SELECT id, naam
FROM dienst
WHERE id IN
		(SELECT idDienst
		FROM overeenkomst
		WHERE emailKlant = emailadressKlant);
END &&