<?php

//  index01.php





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


// set all local variables to '' or default values:
$luserid = $lusername
    = $lpassword
    = $lfirstname
    = $lmiddle
    = $llastname
    = $lbirthday
    = $lemail = '';
$lage = 0;
$lsubmit = "INSERT USER";
//$lisadmin = 0;
//$lisregistereduser = 0;

$lbirthday = "1900-01-01T00:00";


$logusername
    = $logpassword
    = '';
$logsubmit = "LOGIN HERE";

// set errors to NUL
$errors = array(
    'username' => '',
    'password' =>  '',
    'firstname'  =>  '',
    'middle'  =>  '',
    'lastname'  =>  '',
    'birthday'  =>  '',
    'email'  =>  '',
    'age'  =>  ''
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

    //check firstname:
    if (empty($_POST['firstname'])) {
        $errors['firstname'] = 'firstname is required';
    } else {
        $lfirstname = filter_input(INPUT_POST, 'firstname');
        if ($lfirstname) {
            if (!preg_match('/^([a-zA-Z\s]+)(\$*\.*_*-*\s*[a-zA-Z\s]*)*$/', $lfirstname)) {
                $errors['firstname'] = "invalid first name. (letters, ' ',   '$'.   '_',   '-',   '.'} are allowed";
            }
        }
    }

    //check middle:
    if (!empty($_POST['middle'])) {
        $lmiddle = filter_input(INPUT_POST, 'middle');
        if ($lmiddle) {
            if (!preg_match('/^[a-zA-Z\s]+$/', $lmiddle)) {
                $errors['middle'] = "invalid middle initial. Only a letter or blank is allowed";
            }
        }
    }



    //check lastname:
    if (empty($_POST['lastname'])) {
        $errors['lastname'] = 'lastname is required';
    } else {
        $llastname = filter_input(INPUT_POST, 'lastname');
        if ($llastname) {

            if (!preg_match('/^([a-zA-Z\s]+)(\$*\.*_*-*\s*[a-zA-Z\s]*)*$/', $llastname)) {
                $errors['lastname'] = "invalid username. (letters, ' ',   '$'.   '_',   '-',   '.'} are allowed";
            }
        }
    }


    // check birthday
    if (empty($_POST['birthday'])) {
        $errors['birthday'] = 'An birthday is required';
    } else {
        $lbirthday = $_POST['birthday'];
    }

    //calculate age
    $birthDate = $lbirthday;
    $currentDate = date("d-m-Y");
    $age = date_diff(date_create($birthDate), date_create($currentDate));
    $lage = $age->format("%y");

    /* 
        if (!filter_var($lbirthday, FILTER_VALIDATE_birthday)) {
            $errors['birthday'] = 'birthday must be a valid date-time';
        }
     */

    // check email
    if (empty($_POST['email'])) {
        $errors['email'] = 'An email is required';
    } else {
        $lemail = $_POST['email'];
        if (!filter_var($lemail, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email must be a valid email address';
        }
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
        <h3> USERS </h3>
    </header>

    <main>
        <!-- 
        user display, insert and update is handled in a flexbox
        the box-1, box2, etc are in container-1.  see also main.css.  

         -->
        <div class="container-1">
            <div class="greybox box-1">
                <h3>The cat came back.</h3>
                <img class="image-center" src="/root-ennui/img/oneBabyTiger.jpg" alt="***Problem***">
                <!--                 <img class="image-center" src="/root-ennui/img/prayforukraine.jpg" alt="***Problem***"> -->
                <h5>If registered, login here:</h5>

                <form class="white" action='index02.php' method="POST">
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
            <div class="greybox box-2">
                <h3>Box Two</h3>


                <form class="white" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

                    &nbsp <br>
                    <label>username</label>
                    <input type="text" name="username" value="<?php echo htmlspecialchars($lusername) ?>">
                    <div class="red-text"><?php echo $errors['username']; ?> &nbsp </div>

                    <label>password</label>
                    <input type="text" name="password" value="<?php echo htmlspecialchars($lpassword) ?>">
                    <div class="red-text"><?php echo $errors['password']; ?> &nbsp </div>


                    <label>firstname</label>
                    <input type="text" name="firstname" value="<?php echo htmlspecialchars($lfirstname) ?>">
                    <div class="red-text"><?php echo $errors['firstname']; ?> &nbsp </div>

                    <label>middle</label>
                    <input type="text" name="middle" maxlength="1" value="<?php echo htmlspecialchars($lmiddle) ?>">
                    <div class="red-text"><?php echo $errors['middle']; ?> &nbsp </div>

                    <label>lastname</label>
                    <input type="text" name="lastname" value="<?php echo htmlspecialchars($llastname) ?>">
                    <div class="red-text"><?php echo $errors['lastname']; ?> &nbsp </div>

                    <label>birthday</label>
                    <input type="datetime-local" name="birthday" value="<?php echo $lbirthday; ?>">
                    <div class="red-text"><?php echo $errors['birthday']; ?> &nbsp </div>

                    <label>email</label>
                    <input type="text" name="email" value="<?php echo htmlspecialchars($lemail) ?>">
                    <div class="red-text"><?php echo $errors['email']; ?> &nbsp </div>

                    <label>age</label>
                    <input type="text" name="age" readonly="readonly" value="<?php echo htmlspecialchars($lage) ?>">
                    <div class="red-text"><?php echo $errors['age']; ?> &nbsp </div>

                    <label>&nbsp;</label>
                    <input class="genbutton" type="submit" name="submit"
                        value="<?php echo htmlspecialchars($lsubmit) ?>"><br>
                </form>
                <p><a href="index02.php">List Users</a></p>


                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
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