<?php

// error reporting above and beyond
ini_set('display_errors', 1);
error_reporting(E_ALL);




// $returning and all other variables will be null/false first time thru
if (isset($returning)) {
    // process input form


    if ($ferrors) { //if errors found on edit
        $ffunction = "REGISTER -- PLEASE CORRECT ERRORS";
    }
    require_once('database.php');

    /* 
    $iusername = $icountry['fusername'];
    $ipassword = $icountry['fpassword'];
    $ifirstname = $icountry['ffirstname'];
    $ilastname = $icountry['flastname'];
    
    */
} else {  //first time thru
    // display user entry form

    $returning = TRUE;
    echo "first time thru";

    $ffunction = "WELCOME, PLEASE REGISTER";
    $iusername = "";
    $ipassword = "";
    $ifirstname = "";
    $ilastname = "";
}



?>


<!DOCTYPE html>
<html>

<!-- the head section -->

<head>
    <title>CRUD USER</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->

<body>
    <header>
        <h1>
            <?php echo $ffunction; ?>
        </h1>
    </header>

    <main>

        <form action="index01.user.php" method="post" id="index.user">


            <label>username:</label>
            <?php
            $fieldname = 'fusername';

            echo '<input type="text" name="' . $fieldname .
                '" value="' . $iusername . '">';
            ?>
            <br>


            <label>password:</label>
            <?php
            $fieldname = 'fpassword';
            echo '<input type="text" name="' . $fieldname .
                '" value="' . $ipassword . '" size="55">';
            ?>
            <br>

            <label>first name:</label>
            <?php
            $fieldname = 'ffirstname';
            echo '<input type="text" name="' . $fieldname .
                '" value="' . $ifirstname . '" size="55">';
            ?>
            <br>


            <label>last name:</label>
            <?php
            $fieldname = 'flastname';
            echo '<input type="text" name="' . $fieldname .
                '" value="' . $ilastname . '" size="55">';
            ?>
            <br>




            <label>&nbsp;</label>
            <input type="submit" value="CRUD Country"><br>
        </form>
        <p><a href="index01.listusers.php">List Users</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?>My Little Corner of the World</p>
    </footer>
</body>

</html>