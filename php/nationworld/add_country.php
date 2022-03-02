<?php
// Get the product data

$code3 = filter_input(INPUT_POST, 'fcode3');
$code2 = filter_input(INPUT_POST, 'fcode2');
$area = filter_input(INPUT_POST, 'farea', FILTER_VALIDATE_FLOAT);
$population = filter_input(INPUT_POST, 'fpopulation', FILTER_VALIDATE_INT);
$name = filter_input(INPUT_POST, 'fname');
$governmentform = filter_input(INPUT_POST, 'fgovernmentform');

$regionid = 27;  /* middle Europe */

// Validate inputs
if (
    $code3 == null || $code2 == false ||
    $area == null || $population == null || $name == null || $governmentform == false
) {
    $error = "Missing or invalid data";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database  
    $query = 'INSERT INTO nation
                 ( name, area, /* national day */ 
                  code2, code3, region_id)
              VALUES
                 (:name, :area,
                 :code2, :code3, :regionid)';

    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':area', $area);
    $statement->bindValue(':code2',$code2);
    $statement->bindValue(':code3', $code3);
    $statement->bindValue(':regionid', $regionid);

    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}




<label>&nbsp;</label>
<input type="submit" value="Add Product"><br>