<?php
//require('database.php');

?>
<!DOCTYPE html>
<html>

<!-- the head section -->

<head>
    <title>add country</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<!-- the body section -->

<body>
    <header>
        <h1>LOGIN</h1>
    </header>

    <main>
        <h1>New Country</h1>
        <form action="proc-login.php" method="post" id="proc-login-form">



            <label>USERID:</label>
            <input type="text" name="fuserid"><br>

            <label>PASSWORD:</label>
            <input type="text" name="fpassword"><br>


            <label>&nbsp;</label>
            <input type="submit" value="Submit Login"><br>
        </form>
        <p><a href="index.php">Back to Square 1</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?>My Little Corner of the World</p>
    </footer>
</body>

</html>