
create fuction sname_avgprice (a varchar(20)) 
returns int
begin
declare c int;
select avg(price) into c 
from sname_view 
where SupplierName = a;
return c;
end