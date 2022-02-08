-- nation.eurocountries.sql

/* Select countries.name, regions.name, continents.name
from regions inner join countries on regions.region_id = countries.region_id  
inner join continents on continents.continent_id = regions.continent_id
order by countries.name; */

select k.name, r.name, c.name
from continents k, regions r, countries c
where
k.continent_id = r.continent_id  and
r.region_id = c.region_id and
k.name = 'Europe'
order by c.name;



select * from continents;