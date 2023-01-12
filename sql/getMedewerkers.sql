DELIMITER &&  
CREATE PROCEDURE getMedewerkers()
BEGIN
SELECT emailadress, voornaam, achternaam, administrator
FROM medewerker
END &&