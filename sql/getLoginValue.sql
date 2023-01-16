delimiter && 
create procedure getLoginValue(in emailInput char(255))
BEGIN
SELECT wachtwoord FROM klant WHERE emailadress = emailInput
UNION
SELECT wachtwoord FROM medewerker WHERE emailadress = emailInput;
END&&
