DELIMITER &&  
CREATE PROCEDURE getDienstenNotOfKlant (IN emailadressKlant char(255))
BEGIN
SELECT id, naam, omschrijving
FROM dienst
WHERE id NOT IN
	(SELECT idDienst
	FROM overeenkomst
	WHERE emailKlant = emailadressKlant);
END &&