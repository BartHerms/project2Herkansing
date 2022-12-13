DELIMITER &&  
CREATE PROCEDURE getKlant (IN emailadressKlant char(255))
BEGIN
SELECT emailadress, voornaam, achternaam, woonplaats, adres, bedrijf, telefoonnummer, postcode
FROM klant
WHERE emailadress = emailadressKlant;
END &&