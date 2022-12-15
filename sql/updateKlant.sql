DELIMITER &&
CREATE PROCEDURE updateKlant(IN emailadressKlant char(255), woonplaatsKlant char(30), adresKlant char(35), telefoonnummerKlant char(15), postcodeKlant char(6))
BEGIN
UPDATE klant SET emailadress = emailadressKlant, woonplaats = woonplaatsKlant, adres = adresKlant, telefoonnummer = telefoonnummerKlant, postcode = postcodeKlant
WHERE emailadress = emailadressKlant;
END&&