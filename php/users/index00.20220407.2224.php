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
$_SESSION["program"] = "index01.php";
$_SESSION["function"] = "TBD";
print_r($_SESSION);



// for all variables
// $t for table, $tuserid, $tusername, $tpassword 
// $l for local values: $luserid, $lmiddle, $lemail,
//





$lusername  = $lpassword   = '';
$logsubmit = "REGISTERED USER";


// set errors to NUL
$errors = array(
    'username' => '',
    'password' =>  ''
);


if (isset($_POST['submit'])) {
    // data has been entered and submitted
    // process input form
    // this could be insert OR update 

    //check username:
    if (empty($_POST['username'])) {
        $errors['username'] = 'username is required';
    } else {
        $lusername = filter_input(INPUT_POST, 'username');
        if ($lusername) {
            if (!preg_match('/^([a-zA-Z\s]+)(\$*\.*_*-*\s*[a-zA-Z\s]*)*$/', $lusername)) {
                $errors['username'] = "invalid username. (letters, ' ',   '$'.   '_',   '-',   '.'} are allowed";
            }
        }
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'password is required';
    } else {
        $lpassword = filter_input(INPUT_POST, 'password');
    }





    $lisregistereduser = TRUE;
    // isadmin will default to FALSE.


    // isadmin and isregistereduser
    //  are currently not enterable/updatable.  These
    //  must temporaraily be set using sql. 

    // check for errors.  List if found.
    if (array_filter($errors)) {
        // if errors continue below, displaying the
        // HTML with input values and errors in red.

    } else {
        // insert/update tuser table
        require('db_insertupdate.php');
    }
}
/* else { // (!isset($_POST['submit'])
    // do nothing, fall thru and display HTML below.
} */
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


        <button class="genbutton" onclick="window.location.href='/root-ennui/production/index01.php';"> LOGIN AS
            GUEST</button>
    </header>

    <main>
        <!-- 
        user display, insert and update is handled in a flexbox
        the box-1, box2, etc are in container-1.  see also main.css.  

         -->
        <div class="container-vertical">
            <div class="greybox box-1">
                <h3>The cat came back.</h3>
                <img class="image-center" src="/root-ennui/img/whtAndbufTigers.jpg" alt="***Problem***">
                <!--                 <img class="image-center" src="/root-ennui/img/prayforukraine.jpg" alt="***Problem***"> -->
                <h5>If registered, login here:</h5>
                <form class="white" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <!--                 <form class="white" action='index01.php' method="POST"> -->
                    <label>username</label>
                    <input type="text" name="logusername" value="<?php echo htmlspecialchars($lusername) ?>">
                    <div class="red-text"><?php echo $errors['username']; ?> &nbsp </div>

                    <label>password</label>
                    <input type="text" name="logpassword" value="<?php echo htmlspecialchars($lpassword) ?>">
                    <div class="red-text"><?php echo $errors['password']; ?> &nbsp </div>


                    <label>&nbsp;</label>

                    <input class="genbutton" type="submit" name="Login"
                        value="<?php echo htmlspecialchars($logsubmit) ?>"><br>
                </form>

            </div>

            <div class=" box-3">
                <h3>Tigers</h3>
                <div class="cchild flexcenter">
                    <img class="image-center" src="/root-ennui/img/oneBabyTiger.jpg"
                        alt="**ERROR: picture file not found.**">
                </div>
            </div>
        </div>

    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?>USERS</p>
    </footer>
</body>

</html>