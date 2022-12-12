DELIMITER &&  
CREATE PROCEDURE getSingleMedewerker(IN emailMedewerker char(255))
BEGIN
SELECT emailadress, voornaam, achternaam, administrator, wachtwoord
FROM medewerker
WHERE emailadress = emailMedewerker;
END &&