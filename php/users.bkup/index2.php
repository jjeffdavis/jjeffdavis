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
//$mainQuery = 'SELECT continent_id, name FROM continents
//                  WHERE continent_id = :contalp';
$mainQuery =

    /*     "select   
    co.name as country, co.region, co.code, co.governmentform, cit.name as city
    from
    world.country co ,
    world.city cit
    where co.continent = 'Europe'
    and cit.id = co.capital
    order by co.region, co.name";
 */
    "select   
    co.name as country, co.region, co.code, co.governmentform, cit.name as city
    from
    world.country AS co  
    LEFT JOIN world.city AS cit
    ON cit.id = co.capital
    where co.continent = 'Europe'
    order by co.region, co.name";



$statement1 = $db->prepare($mainQuery);
$statement1->execute();
$dbcountries = $statement1->fetchAll();
$statement1->closeCursor();


?>


<!DOCTYPE html>
<html>

<!-- the head section -->

<head>
    <title>World</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->

<body>
    <header>
        <h1>World</h1>
    </header>
    <main>


        <section>
            <!-- display a table of nation/world -->

            <table>
                <tr>
                    <th>Country</th>
                    <th>Region</th>
                    <th>Type Of Government</th>
                    <th>Code</th>
                    <th>Capital</th>
                    <th>&nbsp</th>
                </tr>

                <?php foreach ($dbcountries as $country) : ?>
                <tr>
                    <td><?php echo $country['country']; ?></td>
                    <td><?php echo substr($country['region'], 0, 1); ?></td>
                    <td><?php echo $country['governmentform']; ?></td>
                    <td><?php echo $country['code']; ?></td>
                    <td><?php echo $country['city']; ?></td>

                    <td>
                        <form action="crud_country.php" method="post">
                            <input type="hidden" name="country_code" value="<?php echo $country['code']; ?>">
                            <input type="submit" value="CRUD">
                        </form>
                    </td>

                </tr>
                <?php endforeach; ?>
            </table>
            <br>
            <!---
            <p><a href="addcountry_form.php">Add country</a></p>
            --->
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Little Corner of the World</p>
    </footer>
</body>

</html>