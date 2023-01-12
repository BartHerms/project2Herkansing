delimiter && 
create procedure getLoginValue(in emailInput char(255))
begin
SELECT wachtwoord FROM klant WHERE emailadress = emailInput;
end &&
