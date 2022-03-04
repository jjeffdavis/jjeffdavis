<?php
// Get the product data
echo 'entering addcountry';
$code3 = filter_input(INPUT_POST, 'fcode3');
echo 'code3 = $code3';
$code2 = filter_input(INPUT_POST, 'fcode2');
$area = filter_input(INPUT_POST, 'farea', FILTER_VALIDATE_FLOAT);
$population = filter_input(INPUT_POST, 'fpopulation', FILTER_VALIDATE_INT);
$name = filter_input(INPUT_POST, 'fname');
$governmentform = filter_input(INPUT_POST, 'fgovernmentform');

$regionid = 26;  /* middle Europe */

// Validate inputs
if (
    $code3 == null || $code2 == false ||
    $area == null || $population == null || $name == null || $governmentform == null
) {
    $error = "Missing or invalid data";
    include('error.php');
} else {
    require_once('database.php');
    echo "before insert";
    // Add the product to the database  
    $query = 'INSERT INTO countries
                 ( name, area, /* national day */ 
                  country_code2, country_code3, region_id)
              VALUES
                 (:name, :area,
                 :code2, :code3, :regionid)';
    echo $statement;
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':area', $area);
    $statement->bindValue(':code2', $code2);
    $statement->bindValue(':code3', $code3);
    $statement->bindValue(':regionid', $regionid);
    echo "efore execute $query";

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