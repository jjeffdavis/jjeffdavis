select   
    nation.countries.name AS countryname,
    nation.regions.name AS regionname,
    world.country.code,
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



/* select   
    nation.countries.name AS countryname,
    nation.regions.name AS regionname,
    world.country.code,
    world.country.governmentForm,
    world.city.name AS cityname
from 
    world.city,
    world.country,
    nation.countries,
    nation.regions,
    nation.continents
FULL OUTER JOIN nation.countries ON   
 world.country.code = nation.countries.country_code3 
INNER JOIN nation.continents ON
nation.continents.continent_id = nation.regions.continent_id

INNER JOIN nation.regions ON
 nation.regions.region_id = nation.countries.region_id 

INNER JOIN world.country ON 
world.country.capital = world.city.id

INNER JOIN world.country ON 
world.country.code = world.city.countrycode

WHERE nation.continents.name = 'Europe'
OR world.country.continent = 'Europe'

ORDER BY nation.countries.name;  */