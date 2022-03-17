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
    name, region, code, governmentform
    from
    world.country  
    where continent = 'Europe'
    order by region, name";



$statement1 = $db->prepare($queryContinent);

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

                    <!----                  
                    <th class="">Capital</th>
------>

                </tr>

                <?php foreach ($dbcountries as $country) : ?>
                <tr>
                    <td><?php echo $country['name']; ?></td>
                    <td><?php echo $country['region']; ?></td>
                    <td><?php echo $country['governmentform']; ?></td>

                    <td><?php echo $country['code']; ?></td>

                </tr>
                <?php endforeach; ?>
            </table>

            <p><a href="addcountry_form.php">Add country</a></p>

        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Little Corner of the World</p>
    </footer>
</body>

</html>