
DELIMITER &&  
CREATE PROCEDURE getMedewerker (IN emailadressMedewerker char(255))
BEGIN
SELECT emailadress, voornaam, achternaam, administrator
FROM medewerker
WHERE emailadress = emailadressMedewerker;
END &&