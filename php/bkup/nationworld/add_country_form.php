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
        <form action="add_country.php" method="post" id="add_country_form">



            <label>Code3:</label>
            <input type="text" name="fcode3"><br>

            <label>Code2:</label>
            <input type="text" name="fcode2"><br>

            <label>Name:</label>
            <input type="text" name="fname"><br>

            <label>Area:</label>
            <input type="text" name="farea"><br>

            <label>Population:</label>
            <input type="text" name="fpopulation"><br>

            <label>Government Form:</label>
            <input type="text" name="fgovernmentform"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Country"><br>
        </form>
        <p><a href="index.php">View Countries</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?>My Little Corner of the World</p>
    </footer>
</body>

</html>