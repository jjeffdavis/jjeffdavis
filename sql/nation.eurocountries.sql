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



/*. nation.world.euro.misc.sql */

select c.name, r.name 
  from continents k, regions r, countries c
  where
  k.continent_id = r.continent_id and
  r.region_id = c.region_id and
  k.name = 'Europe'
  order by c.name;


  Select table1.ID ,table1.Name 
from Table1 inner join Table2 on Table1 .ID =Table2 .ID  
inner join Table3 on table2.ID=Table3 .ID 

Select countries.name, regions.name, continents.name
from regions inner join countries on regions.region_id = countries.region_id  
inner join continents on continents.continent_id = regions.continent_id
order by countries.name;


/*. join world and nation. */
select nation.countries.name, nation.countries.area, world.country.HeadOfState
from nation.countries 
inner join world.country 
on nation.countries.country_code3   = world.country.Code
order by nation.countries.name;

    select   
    nc.name,
    nr.name,
    wc.code,
    wc.governmentForm,
    ws.name
from 
    world.city ws,
    world.country wc,
    nation.countries nc,
    nation.regions nr,
    nation.continents nk
where
    nk.name = 'Europe' AND
    nk.continent_id = nr.continent_id AND
    nr.region_id = nc.region_id AND
    nc.country_code3 = wc.code AND
    wc.capital = ws.id AND
    wc.code = ws.countrycode
order by nc.name;
