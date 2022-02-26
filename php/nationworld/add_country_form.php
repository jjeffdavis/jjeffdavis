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

        <form action="add_country.php" method="post" id="add_country_form">

            <!--             <label>Category:</label>
            <select name="category_id">
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br> -->



            <label>Name:</label>
            <input type="text" name="fname"><br>
            <label>national day:</label>
            <input type="text" name="fnationalday"><br>
            <label>Area:</label>
            <input type="text" name="farea"><br>
            <label>Code 2:</label>
            <input type="text" name="fcountrycode2"><br>
            <label>Code 3:</label>
            <input type="text" name="fcountrycode3"><br>
            <label>Region:</label>
            <input type="text" name="fregion"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add country"><br>
        </form>
        <p><a href="index.php">View country List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Little Corner of the World</p>
    </footer>
</body>

</html>