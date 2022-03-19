<?php
require('database.php');

?>
<!DOCTYPE html>
<html>

<!-- the head section -->

<head>
    <title>Nation/World/Add Country</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->

<body>
    <header>
        <h1>Add Country</h1>
    </header>

    <main>
        <h1>New Country</h1>
        <form action="add_country.php" method="post" id="addcountry_form">



            <label>Code3:</label>
            <input type="text" name="fcode3"><br>

            <label>Code2:</label>
            <input type="text" name="fcode2"><br>

            <label>Name:</label>
            <input type="text" name="fname"><br>

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