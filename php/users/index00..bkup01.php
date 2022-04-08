<?php

//  index00.php





// enhanced error reporting.  Remove in production.
ini_set('display_errors', 1);
error_reporting(E_ALL);

// disable caching.  Remove in production.
// Set a past date
// source : https://www.geeksforgeeks.org/php-header-function/
//
header("Expires: Sun, 25 Jul 1997 06:02:34 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");


echo "<br>starting session<br>";
session_start();
$_SESSION["program"] = "index00.php";
$_SESSION["function"] = "TBD";
print_r($_SESSION);



?>


<!DOCTYPE html>
<html>

<!-- the head section -->

<head>
    <meta charset="UTF-8">
    <meta name="description" content="CS130 Insert/Update users">
    <meta name="author" content="Jeff Davis">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER</title>
    <!-- 
    the following `echo date` REALLY, REALLY forces the CSS 
    to be checked and implemented everytime.
    Source: https://www.impressivewebs.com/force-browser-newest-stylesheet/ 
    -->
    <link rel="stylesheet" href="main.css?v=<?php echo date('his'); ?>" </head>



<body>
    <header>
        <h3> USERS </h3>
    </header>

    <main>
        <!-- 
        user display, insert and update is handled in a flexbox
        the box-1, box2, etc are in container-1.  see also main.css.  

         -->
        <div class="container-1">
            <div class=" box-3">
                <h3>Tigers</h3>
                <div class="cchild flexcenter">
                    <img class="image-center" src="/img/babyCats.jpg" alt="***Problem***">
                </div>
            </div>
            <h3>Box Two</h3>



            <div class=" box-2">
                <h3>Tigers</h3>
                <div class="cchild flexcenter">
                    <img class="image-center" src="/img/babyCats.jpg" alt="***Problem***">
                </div>
            </div>

            <div class=" box-3">
                <h3>Tigers</h3>
                <div class="cchild flexcenter">
                    <img class="image-center" src="/img/babyCats.jpg" alt="***Problem***">
                </div>
            </div>

        </div>

    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?>USERS</p>
    </footer>
</body>

</html>