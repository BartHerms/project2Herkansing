DELIMITER &&
BEGIN
CREATE PROCEDURE updateKlant(IN emailadressKlant char(255), voornaamKlant char(30), achternaamKlant char(30), woonplaatsKlant char(30), adresKlant char(35), bedrijfKlant char(30), telefoonnummerKlant char(15))
BEGIN
UPDATE klant SET emailadress = emailadressKlant, voornaam = voornaamKlant, achternaam = achternaaKlant,  woonplaats = woonplaatsKlant, adres = adresKlant, bedrijf = bedrijfKlant, telefoonnummer = telefoonnummerKlant
WHERE emailadress = emailadressKlant;
END&&