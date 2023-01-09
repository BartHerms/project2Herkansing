DELIMITER &&  
CREATE PROCEDURE makeNewOvereenkomst (IN emailadressKlant char(255), IN inputIdDienst TINYINT, IN inputKlantOpmerking TEXT)
BEGIN
INSERT INTO overeenkomst (emailKlant, idDienst, klantOpmerking, datum, status)
VALUES (emailadressKlant, inputIdDienst, inputKlantOpmerking, curdate(), 0);
END &&