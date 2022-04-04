<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('database.php');

// Get country code
$code = filter_input(INPUT_POST, 'country_code', FILTER_DEFAULT);


$query = "select   
code, name, continent, region, 
surfacearea, indepyear, population, lifeexpectancy,
gnp, gnpold, localname,
governmentform,
headofstate, code2
from country
 where code = :code";


$statement = $db->prepare($query);
$statement->bindValue(':code', $code);
$success = $statement->execute();
//$statement->closeCursor();

$kountries = $statement->fetchAll();
$statement->closeCursor();

foreach ($kountries as $icountry) :

endforeach;


?>


<!DOCTYPE html>
<html>

<!-- the head section -->

<head>
    <title>CRUD Country</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->

<body>
    <header>
        <h1>Country Crud</h1>
    </header>

    <main>

        <form action="add_country.php" method="post" id="addcountry_form">


            <label>Country Code 3:</label>
            <?php
            $field_name = 'fcode';
            $field_value = $icountry['code'];
            echo '<input type="text" name="' . $field_name . '" 
                value="' . $field_value . '" size="3">';
            ?><br>


            <label>Name:</label>
            <?php
            $field_name = 'fname';
            $field_value = $icountry['name'];
            echo '<input type="text" name="' . $field_name . '" value="' . $field_value . '">';
            ?><br>

            <label>Continent:</label>
            <?php
            $field_name = 'fcontinent';
            $field_value = $icountry['continent'];
            echo '<input type="text" name="' . $field_name . '" value="' . $field_value . '">';
            ?><br>

            <label>Region:</label>
            <?php
            $field_name = 'fregion';
            $field_value = $icountry['region'];
            echo '<input type="text" name="' . $field_name . '" value="' . $field_value . '">';
            ?><br>


            <label>Area:</label>
            <?php
            $field_name = 'fsurfacearea';
            $field_value = $icountry['surfacearea'];
            echo '<input type="number" name="' . $field_name . '" value="' . $field_value . '">';
            ?><br>



            <label>Year of Independence:</label>
            <?php
            $field_name = 'findepyear';
            $field_value = $icountry['indepyear'];
            echo '<input type="number" name="' . $field_name . '" value="' . $field_value .
                '" min="800" max="2030" >';
            ?><br>




            <label>Population:</label>
            <?php
            $popu = $icountry['population'];
            echo '<input type="number" name="fpopulation" value="' . $popu . '" 
            min="10" max="15000000"><br>';
            ?>

            <label>Life Expectancy:</label>
            <?php
            $lifex = $icountry['lifeexpectancy'];
            echo '<input type="number" name="flifeexpectancy" value="' . $lifex . '" 
            min="50" max="100"><br>';
            ?>


            <label>GNP:</label>
            <?php
            $gnat = $icountry['gnp'];
            echo '<input type="number" name="fgnp" value="' . $gnat . '" 
            size="10"  min="50" max="99000"><br>';
            ?>

            <label>GNP Old:</label>
            <?php
            $gnatold = $icountry['gnpold'];
            echo '<input type="number" name="fgnpold" value="' . $gnatold . '" 
            size="12"  min="50" max="99000"><br>';
            ?>




            <label>Local Name:</label>
            <?php
            $lname = $icountry['localname'];
            echo '<input type="text" name="flocalname" value="' . $lname . '" ><br>';
            ?>



            <label>Government Form:</label>
            <?php
            $gform = $icountry['governmentform'];
            echo '<input type="text" name="fgovernmentform" value="' . $gform . '" ><br>';
            ?>

            <label>Head of State:</label>
            <?php
            $hos = $icountry['headofstate'];
            echo '<input type="text" name="fheadofstate" value="' . $hos . '" ><br>';
            ?>






            <label>Code2:</label>
            <?php
            $cod2 = $icountry['code2'];
            echo '<input type="text" name="fcode2" value="' . $cod2 . '" ><br><br>';
            ?>



            <label>&nbsp;</label>
            <input type="submit" value="CRUD Country"><br>
        </form>
        <p><a href="index2.php">List Countries</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?>My Little Corner of the World</p>
    </footer>
</body>

</html>