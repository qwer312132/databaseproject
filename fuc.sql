create fuction fuc (a varchar(20), b int) returns int
begin
declare c int;
set c = a + b;
return c;
end;