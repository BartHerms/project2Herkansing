DELIMITER &&
CREATE PROCEDURE getKlantInfo()
BEGIN
SELECT emailadress, voornaam, achternaam, woonplaats, adres, bedrijf, telefoonnummer
FROM klant; 
END &&