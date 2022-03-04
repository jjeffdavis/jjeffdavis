
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


/*


drop view if exists vnationworld;

CREATE VIEW `vnationworld`
(vnkey, vwkey, vncountryname, vwcountryname )
AS
(
( 
select nation.countries.country_code3 as vnkey, 
   world.country.code as vwkey, 
world.country.name as vwcountryname,
 nation.countries.name as vncountryname
 from nation.countries
left join world.country 
on  vnkey = vwkey  
)
UNION
(
select nation.countries.country_code3 as vnkey, 
   world.country.code as vwkey, 
world.country.name as vwcountryname,
 nation.countries.name as vncountryname
from nation.countries
right join world.country 
on  vnkey = vwkey
)
  )  ;
*/

/*
drop view if exists vnationworld;

create view vnationworld 
( vnkey, vwkey, vncountryname, vwcountryname )
AS
 
select nation.countries.country_code3 as vnkey, 
   world.country.code as vwkey, 
world.country.name as vwcountryname,
 nation.countries.name as vncountryname
 from nation.countries
left join world.country 
on  nation.countries.country_code3 = world.country.code  

UNION

select nation.countries.country_code3 as vnkey, 
   world.country.code as vwkey, 
world.country.name as vwcountryname,
 nation.countries.name as vncountryname
from nation.countries
right join world.country 
on  nation.countries.country_code3 = world.country.code  

;
*/


/*
 SELECT * FROM A 
   LEFT JOIN B ON A.key = B.key 

 UNION 

 SELECT * FROM A 
   RIGHT JOIN B ON A.key = B.key
*/

/*

DROP VIEW IF EXISTS vcontent;
CREATE VIEW `vcontent` ( vkey, vtext )
AS
  SELECT
    ckeys.kkey, ctext.ttext
  FROM
    `ctext`, `ckeys`
  WHERE
    ckeys.kid = ctext.tid;
)

select  vtext 
from  vcontent
where vkey = "date";

*/

/*
drop view if exists vnationworld;
create view vnationworld (
 nation.countries.country_code3,    world.country.code, 
world.country.name, nation.countries.name)
AS
(
select * from nation.countries
left join world.country 
on  nation.countries.country_code3 = world.country.code  
UNION
select * from nation.countries
right join world.country 
on  nation.countries.country_code3 = world.country.code  
)
;

*/







/* 
select * from nation.countries
FULL OUTER JOIN world.country
on  nation.countries.country_code3 = world.country.code ;

 */



/* 
SELECT 

nation.countries.country_id AS vncountryid,
nation.countries.name as vnname,
nation.countries.area as vnarea,
nation.countries.national_day as vnnationalday,
nation.countries.country_code2 as vncountrycode2,
nation.countries.country_code3 as vncountrycode3,
nation.countries.region_id as vnregionid,
world.country.code as vwcode,
world.country.name as vwname,
world.country.continent as vwcontinent,
world.country.region as vwregion,
world.country.surfacearea as vwsurfacearea,
world.country.indepyear as vwindepyear,
world.country.population as vwpopulation,
world.country.lifeexpectancy as vwlifeexpectancy,
world.country.gnp as vwgnp,
world.country.gnpold as vwgnpold,
world.country.localname as vwlocalname,
world.country.governmentform vwgovernmentform,
world.country.headofstate as vwheadofstate,
world.country.capital as vwcapital,
world.country.code2 as vwcode2
FROM nation.countries
FULL OUTER JOIN world.country
ON  world.country.code = nation.countries.countrycode3; */



/* 

SELECT 
country_code3 as vncountrycode3,
country_id AS vncountryid,
name as vnname,
area as vnarea,
national_day as vnnationalday,
country_code2 as vncountrycode2,

region_id as vnregionid
FROM nation.countries

UNION

SELECT
code as vwcode,
name as vwname,
continent as vwcontinent,
region as vwregion,
surfacearea as vwsurfacearea,
indepyear as vwindepyear,
population as vwpopulation,
lifeexpectancy as vwlifeexpectancy,
gnp as vwgnp,
gnpold as vwgnpold,
localname as vwlocalname,
governmentform vwgovernmentform,
headofstate as vwheadofstate,
capital as vwcapital,
code2 as vwcode2
FROM world.country 
;
 */




/* 

DROP VIEW IF EXISTS vcontent;
CREATE VIEW `vcontent` ( vkey, vtext )
AS
  SELECT
    ckeys.kkey, ctext.ttext
  FROM
    `ctext`, `ckeys`
  WHERE
    ckeys.kid = ctext.tid;
) 
*/

/* DROP VIEW IF EXISTS nationworldunion;
CREATE VIEW nationworldunion(


vkey, */

/* 
SELECT 
country_id AS vncountryid,
name as vnname,
area as vnarea,
national_day as vnnationalday,
country_code2 as vncountrycode2,
country_code3 as vncountrycode3,
region_id as vnregionid
FROM nation.countries

UNION

SELECT
code as vwcode,
name as vwname,
continent as vwcontinent,
region as vwregion,
surfacearea as vwsurfacearea,
indepyear as vwindepyear,
population as vwpopulation,
lifeexpectancy as vwlifeexpectancy,
gnp as vwgnp,
gnpold as vwgnpold,
localname as vwlocalname,
governmentform vwgovernmentform,
headofstate as vwheadofstate,
capital as vwcapital,
code2 as vwcode2
FROM world.country 

WHERE  vwcode = vncountrycode3
AND vnregionid = 26; */




/* select   
    nation.countries.name AS ncountryname,
    nation.regions.name AS nregionname,
    world.country.code as wcode3,
    world.country.governmentForm,
    world.city.name AS cityname
from 
    world.city,
    world.country,
    nation.countries,
    nation.regions,
    nation.continents
FULL OUTER JOIN world.country ON   
 world.country.code = nation.countries.country_code3 

AND
(nation.continents.name = 'Europe'
OR world.country.continent = 'Europe')



INNER JOIN nation.continents ON
nation.continents.continent_id = nation.regions.continent_id

INNER JOIN nation.regions ON
 nation.regions.region_id = nation.countries.region_id 

INNER JOIN world.country ON 
world.country.capital = world.city.id

INNER JOIN world.country ON 
world.country.code = world.city.countrycode


ORDER BY nation.countries.name;  
 */


