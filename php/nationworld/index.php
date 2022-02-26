<?php

require_once('database.php');
/*
// Get/set continent ID
if (!isset($contalp)) {
    $contalp = filter_input(
        INPUT_GET,
        'contalp',
        FILTER_VALIDATE_INT
    );
    if ($contalp == NULL || $contalp == FALSE) {
        $contalp = '1';
    }
}
*/
//$contalp = 4;  //europe

// Get name for selected continent
//$queryContinent = 'SELECT continent_id, name FROM continents
//                  WHERE continent_id = :contalp';
$queryContinent =
    "select   
    nc.name AS countryname,
    nr.name AS regionname,
    wc.code,
    wc.governmentForm,
    ws.name AS cityname
from 
    world.city ws,
    world.country wc,
    nation.countries nc,
    nation.regions nr,
    nation.continents nk
where
    nk.name = 'South America' AND
    nk.continent_id = nr.continent_id AND
    nr.region_id = nc.region_id AND
    nc.country_code3 = wc.code AND
    wc.capital = ws.id AND
    wc.code = ws.countrycode
order by nc.name";

$statement1 = $db->prepare($queryContinent);
//$statement1->bindValue(':contalp', $contalp);
$statement1->execute();

$dbcountries = $statement1->fetchAll();

$statement1->closeCursor();


?>


<!DOCTYPE html>
<html>

<!-- the head section -->

<head>
    <title>Nation World</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->

<body>
    <header>
        <h1>Nation/World</h1>
    </header>
    <main>


        <section>
            <!-- display a table of nation/world -->

            <table>
                <tr>
                    <th>Country</th>
                    <th>Region</th>
                    <th>Type Of Government</th>
                    <th class="">Capital</th>

                </tr>

                <?php foreach ($dbcountries as $country) : ?>
                <tr>
                    <td><?php echo $country['countryname']; ?></td>
                    <td><?php echo $country['regionname']; ?></td>
                    <td><?php echo $country['governmentForm']; ?></td>

                    <td><?php echo $country['cityname']; ?></td>

                </tr>
                <?php endforeach; ?>
            </table>

            <p><a href="add_country_form.php">Add country</a></p>

        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Little Corner of the World</p>
    </footer>
</body>

</html>