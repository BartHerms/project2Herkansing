delimiter && 
create procedure getLoginValue(in emailInput char(255))
begin
SELECT password FROM klant WHERE emailadress = emailInput;
end &&
