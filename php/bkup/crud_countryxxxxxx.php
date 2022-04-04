<?php
require_once('database.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Get country code
$kk = filter_input(INPUT_POST, 'country_code', FILTER_DEFAULT);
var_dump($kk);

$sql = "select   
name, region, code, governmentform
from world.country";
// where country.code = " . $kk;

var_dump($sql);

//$stmt = $pdo->query($sql);
$stmt = $db->query($sql);

echo "here2";
$icountry = $stmt->fetch();
//$kountries = $fetch->fetchAll(PDO::FETCH_ASSOC);
//if ($kountries) {
if ($icountry) {

    echo "here7";
} else {
    echo "else";
}

/*
$statement1 = $db->prepare($mainQuery);
$statement1->execute();
$dbcountries = $statement1->fetchAll();
$statement1->closeCursor();
*/
echo "here3";

var_dump($icountry);
exit - 1;
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
        <h1>
            <?php echo "CRUD for $kk"; ?>
    </header>

    <main>

        <form action="add_country.php" method="post" id="addcountry_form">


            <label>Country Code 3:</label>
            <?php
            $field_name = 'fcode3';
            $field_value = $icountry['code'];

            echo '<input type="text" name="' . $field_name . '" value="' . $field_value . '">';
            ?>
            <label>Code3:</label>
            <input type="text" name="fcode3" value="<$?php echo $icountry['code']; ?>"><br>

            <label>Code2:</label>
            <input type="text" name="fcode2"><br>

            <label>Name:</label>
            <input type="text" name="fname"><br>

            <label>Region:</label>
            <?php
            $field_name = 'fregion';  /* fill in */
            $field_value = 'Middle Europe'; /* fill in */
            echo '<input type="text" name="' . $field_name . '" value="' . $field_value . '">';
            ?>

            <label>Area:</label>
            <input type="text" name="fsurfarea"><br>

            <label>Year of Independence:</label>
            <input type="number" name="findepyear" min="800" max="2030"><br>



            <label>Population:</label>
            <input type="number" name="fpopulation" min="10" max="15000000"><br>

            <label>Life Expectancy:</label>
            <input type="number" name="flifeexpectancy" min="40" max="99"><br>

            <label>GNP:</label>
            <input type="text" name="fgnp"><br>

            <label>GNP Old:</label>
            <input type="text" name="fgnpold"><br>




            <label>Local Name:</label>
            <input type="text" name="flocalname"><br>



            <label>Government Form:</label>
            <input type="text" name="fgovernmentform"><br>

            <label>Head of State:</label>
            <input type="text" name="fheadofstate"><br>







            <label>&nbsp;</label>
            <input type="submit" value="Add Country"><br>
        </form>
        <p><a href="index.php">List Countries</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?>My Little Corner of the World</p>
    </footer>
</body>

</html>