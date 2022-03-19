<?php
// Get the product data
echo 'entering addcountry';


$code = filter_input(INPUT_POST, 'fcode3');
echo 'code3 = $code';

$code2 = filter_input(INPUT_POST, 'fcode2');
$name = filter_input(INPUT_POST, 'fname');
$continent = "Europe";
$region = "Mitteleuropa";
$surfacearea = filter_input(
    INPUT_POST,
    'fsurfarea',
    FILTER_VALIDATE_FLOAT
);
$indepyear = filter_input(
    INPUT_POST,
    'findepyear',
    FILTER_VALIDATE_INT
);
$population = filter_input(
    INPUT_POST,
    'fpopulation',
    FILTER_VALIDATE_INT
);
$lifeexpectancy = filter_input(
    INPUT_POST,
    'flifeexpectancy',
    FILTER_VALIDATE_INT
);
$gnp = filter_input(
    INPUT_POST,
    'fgnp',
    FILTER_VALIDATE_INT
);
$gnpold = filter_input(
    INPUT_POST,
    'fgnpold',
    FILTER_VALIDATE_INT
);
$localname = filter_input(INPUT_POST, 'flocalname');
$governmentform = filter_input(INPUT_POST, 'fgovernmentform');
$headofstate = filter_input(INPUT_POST, 'fheadofstate');



// Validate inputs
if (
    $code == null ||
    $code2 == null ||
    $name == null ||
    $surfacearea == null ||
    $indepyear == null ||
    $population == null ||
    $lifeexpectancy == null ||
    $gnp == null ||
    $gnpold == null ||
    $localname == null ||
    $governmentform == null ||
    $headofstate == null
) {
    $error = "Missing or invalid data";
    include('error.php');
} else {
    require_once('database.php');
    echo "before insert";
    // Add the product to the database  
    $query = 'INSERT INTO country
        (code, code2, 
        name, continent, region, surfacearea,
        indepyear, population,
        lifeexpectancy, gnp, gnpold,
        governmentform, headofstate)
    VALUES
        (:code, :code2, 
        :name, :continent, :region, :surfacearea,
        :indepyear, :population,
        :lifeexpectancy, :gnp, :gnpold,
        :governmentform, :headofstate
        )';
    echo "<br><br>"  . $query . "<br><br>";

    $statement = $db->prepare($query);

    $statement->bindValue(':code', $code);
    $statement->bindValue(':code2', $code2);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':continent', $continent);
    $statement->bindValue(':region', $region);
    $statement->bindValue(':surfacearea', $surfacearea);
    $statement->bindValue(':indepyear', $indepyear);
    $statement->bindValue(':population', $population);
    $statement->bindValue(':lifeexpectancy', $lifeexpectancy);
    $statement->bindValue(':gnp', $gnp);
    $statement->bindValue(':gnpold', $gnpold);
    $statement->bindValue(':governmentform', $governmentform);
    $statement->bindValue(':headofstate', $headofstate);

    /* 
    echo "efore execute $query";
    $error = "data edits passed";
    include('error.php');
    exit - 1;
 */

    try {
        $statement->execute();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
    $statement->closeCursor();
    echo 'after close cursor $statement';
    // Display the Product List page
    include('index.php');
}