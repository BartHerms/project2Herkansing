CREATE DATABASE Project2;

USE Project2;

CREATE TABLE KLANT(
	emailadress	char(255)	NOT NULL,
	voornaam	char(30)	NOT NULL,
	achternaam	char(30)	NOT NULL,
	woonplaats	char(30)	NOT NULL,
	adres	char(35)	NOT NULL,
	bedrijf	char(30)	NULL,
	telefoonnummer char(15) NULL,
	postcode	char(6) NOT NULL,
	wachtwoord	char(255) NOT NULL,
	profielfoto	char(255) NULL,
	
	CONSTRAINT KLANTpk PRIMARY KEY (emailadress)	
);

CREATE TABLE DIENST(
	id	TINYINT	NOT NULL AUTO_INCREMENT,
	naam	char(60) NOT NULL,
	omschrijving TEXT	NOT NULL,
	beschikbaar TINYINT	NOT NULL,
	
	CONSTRAINT	DIENSTpk	PRIMARY KEY (id)
);

CREATE TABLE MEDEWERKER(
	emailadress	char(255)	NOT NULL,
	voornaam	char(30)	NOT NULL,
	achternaam	char(30)	NOT NULL,
	administrator	TINYINT	NOT NULL,
	wachtwoord	char(255) NOT NULL,
	
	CONSTRAINT MEDEWERKERpk PRIMARY KEY (emailadress)
);

CREATE TABLE OVEREENKOMST(
	id	INT	NOT NULL AUTO_INCREMENT,
	emailKlant	char(255)	NOT NULL,
	emailMedewerker	char(255)	NULL,
	idDienst	TINYINT	NOT NULL,
	klantOpmerking	TEXT	NULL,
	datum	DATE	NOT NULL,
	status char(1)	NOT NULL,
	contract	char(255)	NULL,
	
	CONSTRAINT OVEREENKOMSTpk	PRIMARY KEY (id),
	CONSTRAINT OVEREENKOMSTfk1	FOREIGN KEY (emailKlant)	REFERENCES KLANT(emailadress)	ON UPDATE CASCADE ON DELETE NO ACTION,
	CONSTRAINT OVEREENKOMSTfk2	FOREIGN KEY (emailMedewerker)	REFERENCES MEDEWERKER(emailadress)	ON UPDATE CASCADE ON DELETE NO ACTION,
	CONSTRAINT OVEREENKOMSTfk3	FOREIGN KEY (idDienst)	REFERENCES DIENST(id)	ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE TICKET(
	id	BIGINT	NOT NULL AUTO_INCREMENT,
	idOvereenkomst	INT NOT NULL,
	emailMedewerker	char(255)	NULL,
	status	char(1)	NOT NULL,
	datum	DATE	NOT NULL,
	logfile	TEXT	NOT NULL,
	geopendOp	DATE	NULL,
	
	CONSTRAINT TICKETpk	PRIMARY KEY (id),
	CONSTRAINT TICKETfk1	FOREIGN KEY (idOvereenkomst)	REFERENCES OVEREENKOMST(id) ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT TICKETfk2	FOREIGN KEY (emailMedewerker)	REFERENCES MEDEWERKER(emailadress) ON UPDATE CASCADE ON DELETE NO ACTION
);

INSERT INTO klant (emailadress, voornaam, achternaam, woonplaats, adres, bedrijf, telefoonnummer, postcode, wachtwoord)
VALUES
	('test.klant@klanten.com', 'Bob', 'Tester', 'Testersstad', 'Testersstraat 9', NULL, NULL, '1234AB', '$2y$10$pe48R7hLK.wREcXi6c5YauESZEC79.m.mW3vxfHD9tJnvl8tUtdJa'),
	('hanshansen@voorbeeld.nl', 'Hans', 'Hansen', 'Emmen', 'Straatinemmen 12', 'voorbeeld en co', '+31(0523)123456', '4321AB', '$2y$10$WcS6VxlW4mT6ivHFDcyS..gSTpwwxACTG9Rf6gqtyOVtEy8BUg5r6'),
	('jan.jansen@jansen.jan', 'Jan', 'Tester', 'Zwolle', 'Zwollerstraat 31', NULL, NULL, '1234BA', '$2y$10$NhD2tN8qjqrh/QGOJLtn5Oj20TaCF.q.ee2FU5W974HLt32q89fCi'),
	('kareldegrote@gamer.pizza', 'Karel', 'de Grote', 'Hardenberg', 'Kalmoes 9', 'Koning B.V', NULL, '1234CD', '$2y$10$Hl55J4PYoqw/wKv.JyBM..vvpjMyojGOwYKzmrVUuvaQkeCZp/5YK'),
	('hansanders@nhlstenden.com', 'Hans', 'Anders', 'Apeldoorn', 'Verzekeringslaan 69', NULL, '+31(0523)251970', '1111AB', '$2y$10$tHcSWZWSR6v/00fg/zU9N.nXlZClUi8ey0Y1cD/vUXW43Ql3Ifq7C');
	
INSERT INTO dienst (naam, omschrijving, beschikbaar)
VALUES
	('Webhosting', 'Via deze dienst kan de klant zijn website laten hosten op een server.', 1),
	('Reparaties', 'Via deze dienst kan de klant hardware laten repareren.', 1),
	('Webdevelopment', 'Via deze dienst kan de klant websites en andere webapplicaties laten ontwikkelen en onderhouden.', 1),
	('Hardware verhuur', 'Via deze dienst kan de klant uit een verscheidene catalogus hardware huren.', 1),
	('Server verhuur', 'Via deze dienst kan de klant ruimte en processing power op de server farm huren.', 0);
	
INSERT INTO medewerker (emailadress, voornaam, achternaam, administrator, wachtwoord)
VALUES
	('peter.peterson@serviceit.nl', 'Peter', 'Peterson', 1, '$2y$10$NOAqFpeGM/wZsQ7BzaJhUexoiwYZQahc8xb1v.P54hBo18KlIoN1W'),
	('henk.henkerd@serviceit.nl', 'Henk', 'Henkerd', 0, '$2y$10$h8p8xq6bGdcybTxyMC3KJOiVzU87HaX9EpDfIVFKh9FN4i0qbM0va'),
	('sven.svensen@serviceit.nl', 'Sven', 'Svensen', 0, '$2y$10$jrAtXjRpibUz2qWoD/WEy.tXFOeW0Rzw74Jy5OnGxWBuJvXlK3YzW');
	
INSERT INTO overeenkomst (emailKlant, emailMedewerker, idDienst, datum, status, contract)
VALUES	
	('test.klant@klanten.com', NULL, 3, curdate(), '0', 'D:/NHL Stenden/Project 2 herkansing/EDRv1.drawio.png'),
	('kareldegrote@gamer.pizza', 'peter.peterson@serviceit.nl', 1, date_sub(now(), interval 1 week), '1', 'D:/NHL Stenden/Project 2 herkansing/EDRv1.drawio.png'),
	('hansanders@nhlstenden.com', NULL, 2, date_sub(now(), interval 1 day), '2', NULL),
	('test.klant@klanten.com', 'sven.svensen@serviceit.nl', 5, date_sub(now(), interval 1 month), '3', NULL);
	
INSERT INTO ticket (idOvereenkomst, emailMedewerker, status, datum, logfile)
VALUES
	(1, NULL, 0, curdate(), 'D:/NHL Stenden/Project 2 herkansing/EDRv1.drawio.png'),
	(1, 'henk.henkerd@serviceit.nl', 3, date_sub(now(), interval 1 day), 'Dit is een domme vraag'),
	(3, 'henk.henkerd@serviceit.nl', 1, date_sub(now(), interval 6 day), 'Dit is een hele goede vraag'),
	(4, 'henk.henkerd@serviceit.nl', 1, date_sub(now(), interval 8 day), 'Dit is eigenlijk geen vraag');

DELIMITER &&
CREATE PROCEDURE getKlantInfo()
BEGIN
SELECT emailadress, voornaam, achternaam, woonplaats, adres, bedrijf, telefoonnummer, postcode
FROM klant; 
END &&

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

DELIMITER &&  
CREATE PROCEDURE getDienstenOfKlant (IN emailadressKlant char(255))
BEGIN
SELECT overeenkomst.id, dienst.naam
FROM overeenkomst LEFT JOIN dienst
ON overeenkomst.idDienst  = dienst.id
WHERE emailKlant = emailadressKlant;
END &&

DELIMITER &&  
CREATE PROCEDURE getKlant (IN emailadressKlant char(255))
BEGIN
SELECT emailadress, voornaam, achternaam, woonplaats, adres, bedrijf, telefoonnummer, postcode
FROM klant
WHERE emailadress = emailadressKlant;
END &&

DELIMITER &&
CREATE PROCEDURE getKlantenTickets(IN emailadressKlant char(255))
BEGIN
SELECT ticket.id, ticket.idOvereenkomst, ticket.emailMedewerker, ticket.status, ticket.datum, ticket.logfile, dienst.naam
FROM ticket LEFT JOIN overeenkomst
ON ticket.idOvereenkomst = overeenkomst.id 
JOIN dienst ON overeenkomst.idDienst = dienst.id
WHERE overeenkomst.emailKlant = emailadressKlant
LIMIT 25;
END &&

delimiter && 
create procedure getLoginValue(in emailInput char(255))
BEGIN
SELECT wachtwoord FROM klant WHERE emailadress = emailInput
UNION
SELECT wachtwoord FROM medewerker WHERE emailadress = emailInput;
END&&

DELIMITER &&  
CREATE PROCEDURE getMedewerker (IN emailadressMedewerker char(255))
BEGIN
SELECT emailadress, voornaam, achternaam, administrator
FROM medewerker
WHERE emailadress = emailadressMedewerker;
END &&

DELIMITER &&  
CREATE PROCEDURE getMedewerkers()
BEGIN
SELECT emailadress, voornaam, achternaam, administrator
FROM medewerker;
END &&

DELIMITER &&  
CREATE PROCEDURE getRecentTickets(IN emailadressKlant char(255))
BEGIN
SELECT ticket.id, ticket.idOvereenkomst, ticket.emailMedewerker, ticket.status, ticket.datum, ticket.logfile, dienst.naam
FROM ticket LEFT JOIN overeenkomst
ON ticket.idOvereenkomst = overeenkomst.id 
JOIN dienst ON overeenkomst.idDienst = dienst.id
WHERE overeenkomst.emailKlant = emailadressKlant
LIMIT 5;
END &&

DELIMITER &&  
CREATE PROCEDURE getSingleMedewerker(IN emailMedewerker char(255))
BEGIN
SELECT emailadress, voornaam, achternaam, administrator, wachtwoord
FROM medewerker
WHERE emailadress = emailMedewerker;
END &&

DELIMITER &&  
CREATE PROCEDURE getSingleTicket(IN selectedTicketId BIGINT)
BEGIN
SELECT ticket.id, ticket.idOvereenkomst, ticket.emailMedewerker, ticket.status, ticket.datum, ticket.logfile, dienst.naam, ticket.geopendOp
FROM ticket LEFT JOIN overeenkomst
ON ticket.idOvereenkomst = overeenkomst.id
JOIN dienst ON overeenkomst.idDienst = dienst.id
WHERE ticket.id = selectedTicketID;
END &&

DELIMITER &&  
CREATE PROCEDURE getTickets()
BEGIN
SELECT ticket.id, ticket.idOvereenkomst, ticket.emailMedewerker, ticket.status, ticket.datum, ticket.logfile, dienst.naam, geopendOp
FROM ticket LEFT JOIN overeenkomst
ON ticket.idOvereenkomst = overeenkomst.id
JOIN dienst ON overeenkomst.idDienst = dienst.id
LIMIT 25;
END &&

DELIMITER &&  
CREATE PROCEDURE getTicketsofMedewerker(IN emailInput char(255))
BEGIN
SELECT ticket.id, ticket.idOvereenkomst, ticket.emailMedewerker, ticket.status, ticket.datum, ticket.logfile, dienst.naam, geopendOp
FROM ticket LEFT JOIN overeenkomst
ON ticket.idOvereenkomst = overeenkomst.id
JOIN dienst ON overeenkomst.idDienst = dienst.id
WHERE ticket.emailMedewerker = emailInput
LIMIT 25;
END &&

DELIMITER &&  
CREATE PROCEDURE makeNewOvereenkomst (IN emailadressKlant char(255), IN inputIdDienst TINYINT, IN inputKlantOpmerking TEXT)
BEGIN
INSERT INTO overeenkomst (emailKlant, idDienst, klantOpmerking, datum, status)
VALUES (emailadressKlant, inputIdDienst, inputKlantOpmerking, curdate(), 0);
END &&

DELIMITER &&
CREATE PROCEDURE removeKlant(IN emailadressKlant char(255))
BEGIN
DELETE FROM klant
WHERE emailadress = emailadressKlant;
END &&

DELIMITER &&  
CREATE PROCEDURE setMedewerkerToTicket(IN medewerkerToSet char(255), IN ticketID BIGINT)
BEGIN
UPDATE ticket
SET emailMedewerker = medewerkerToSet
WHERE id = ticketID;
END &&

DELIMITER &&  
CREATE PROCEDURE setTicketGeopendOp(IN ticketID BIGINT)
BEGIN
UPDATE ticket
SET geopendOp = curdate()
WHERE id = ticketID;
END &&

DELIMITER &&  
CREATE PROCEDURE setTicketStatus(IN statusInput char(1), IN ticketID BIGINT)
BEGIN
UPDATE ticket
SET status = statusInput
WHERE id = ticketID;
END &&

DELIMITER &&  
CREATE PROCEDURE ticketSubmit (IN idOvereenkomstInput INT, IN ticketDescription char(255))
BEGIN
INSERT INTO ticket (idOvereenkomst, status, datum, logfile)
VALUES (idOvereenkomstInput, 1, curdate(), ticketDescription);
END&&

DELIMITER &&  
CREATE PROCEDURE ticketUpdate(IN ticketText TEXT, IN ticketID BIGINT)
BEGIN
UPDATE ticket
SET logfile = ticketText
WHERE id = ticketID;
END &&

DELIMITER &&
CREATE PROCEDURE updateKlant(IN emailadressKlant char(255), woonplaatsKlant char(30), adresKlant char(35), telefoonnummerKlant char(15), postcodeKlant char(6))
BEGIN
UPDATE klant SET emailadress = emailadressKlant, woonplaats = woonplaatsKlant, adres = adresKlant, telefoonnummer = telefoonnummerKlant, postcode = postcodeKlant
WHERE emailadress = emailadressKlant;
END&&