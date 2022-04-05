<?php

// users/index01.user.php

// error reporting above and beyond
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Set a past date
// source : https://www.geeksforgeeks.org/php-header-function/
//
header("Expires: Sun, 25 Jul 1997 06:02:34 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

require_once('db_connect.php');

// for all variables
// $t for table, $tuserid, $tusername, $tpassword 
// $f for input form: $fuserid, $fusername, $fbirthday 
// $l for local values: $luserid, $lmiddle, $lemail,
//
//

// set all local variables to ''
$luserid = $lusername
    = $lpassword
    = $lfirstname
    = $lmiddle
    = $llastname
    = $lbirthday
    = $lemail = '';
$lage = $lisadmin = $lisregistereduser = 0;
$lbirthday = NULL;

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




if (isset($_POST['submit'])) {  // data has been entered and submitted
    // process input form
    // this could be insert OR update 

    //check username:
	if (empty($_POST['username'])) {
		$errors['username'] = 'username is required';
	} else {
		$lusername = filter_input(INPUT_POST['username'];
        if ($lusername) {
            if (!preg_match('/^[a-zA-Z\s]+$/', $lusername)) {
                $errors['username'] = 'username must be letters and spaces only';
            }
        else {
            $errors['username'] = 'invalid username: illegal entry';
        }
	}

    if (array_filter($errors)) {
        echo "errors";
        var_dump($errors);
    } else {
        echo "no errors found";
    }






?>


<!DOCTYPE html>
<html>

<!-- the head section -->

<head>
    <title>USER</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->

<body>
    <header>
        <h1> USERS
            <!--             <?php echo $ffunction; ?> -->
        </h1>
    </header>

    <main>

        <form action="index01.user.php" method="post" id="index.user">


            <label>username</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($username) ?>">
            <div class="red-text"><?php echo $errors['username']; ?></div>


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