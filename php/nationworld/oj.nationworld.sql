
/*
-- !!!!
-- !!!!
-- !!!!
--- !!!!  this works but is not quite what i want
-- !!! how can i limit it to europe at least??
-- !!!!
-- !!!!
-- !!!!

select nation.countries.country_code3 as vnkey, 
   world.country.code as vwkey, 
world.country.name as vwcountryname,
 nation.countries.name as vncountryname,
 nation.countries.region_id as vcregionid
 from nation.countries

left join world.country 
on 

nation.countries.country_code3 = world.country.code 
-- where nation.countries.region_id = 26
-- OR nation.countries.region_id = NULL

UNION

select nation.countries.country_code3 as vnkey, 
   world.country.code as vwkey, 
world.country.name as vwcountryname,
 nation.countries.name as vncountryname,
 nation.countries.region_id as vcregionid
from nation.countries
right join world.country 
on  
--no aliases on the following equality condition: 
nation.countries.country_code3 = world.country.code 
-- where nation.countries.region_id = 26
-- OR nation.countries.region_id = NULL


ORDER BY vnkey;




/*
-- !!!!
-- !!!!
-- !!!!
--- !!!!  this works but is not quite what i want
-- !!! can i limit it to europe at least??
-- !!!!
-- !!!!
-- !!!!

select nation.countries.country_code3 as vnkey, 
   world.country.code as vwkey, 
world.country.name as vwcountryname,
 nation.countries.name as vncountryname,
 nation.countries.region_id as vcregionid
 from nation.countries

left join world.country 
on 

nation.countries.country_code3 = world.country.code 
-- where nation.countries.region_id = 26
-- OR nation.countries.region_id = NULL

UNION

select nation.countries.country_code3 as vnkey, 
   world.country.code as vwkey, 
world.country.name as vwcountryname,
 nation.countries.name as vncountryname,
 nation.countries.region_id as vcregionid
from nation.countries
right join world.country 
on  
--no aliases on the following equality condition: 
nation.countries.country_code3 = world.country.code 
-- where nation.countries.region_id = 26
-- OR nation.countries.region_id = NULL


ORDER BY vnkey;




-- where nation.countries.region_id = 26 
--no aliases on the following equality condition: 
*/



/*
-- !!!!
-- !!!!
-- !!! the following works
-- !!!!
-- !!!!
select nation.countries.country_code3 as vnkey, 
   world.country.code as vwkey, 
world.country.name as vwcountryname,
 nation.countries.name as vncountryname
 from nation.countries
left join world.country 
on  
nation.countries.country_code3 = world.country.code 

UNION

select nation.countries.country_code3 as vnkey, 
   world.country.code as vwkey, 
world.country.name as vwcountryname,
 nation.countries.name as vncountryname
from nation.countries
right join world.country 
on  
nation.countries.country_code3 = world.country.code 
;


*/