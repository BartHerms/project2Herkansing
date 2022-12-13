DELIMITER &&  
CREATE PROCEDURE getDienstenOfKlant (IN emailadressKlant char(255))
BEGIN
SELECT overeenkomst.id, dienst.naam
FROM overeenkomst LEFT JOIN dienst
ON overeenkomst.idDienst  = dienst.id
WHERE emailKlant = emailadressKlant;
END &&