// joinWorldNation.sql


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
