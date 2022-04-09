<?php
// db.tuser.insertupdate.php
// does the actual insert or update of table tuser
// in database users.  This file is brought into
// index02.php with the following require;
// require('db.tuser.insertupdate.php' );
//
// This file is separate simply due to the length
// and complexity of the mother program.  all
// variables are global.
//



echo 'entering db_insertupdate.php';



require_once('db_connect.php');


// test if username already exists.




$squery = 'SELECT * FROM tuser
              WHERE  tusername = :tusername';
$statementq = $db->prepare($squery);
$statementq->bindValue(':tusername', $lusername);
$success = $statementq->execute();
if ($success) {
}
$row = $statementq->fetch(PDO::FETCH_ASSOC);
$statementq->closeCursor();
echo '<br>after select<br><br>';
var_dump($row);
if (!$row) {
    echo '<br><br>nothing found<br><br>';
    echo "before insert";
    // Insert user 
    $insertuser = 'INSERT INTO tuser
        (tusername, tpassword, tfirstname, tmiddle, tlastname,
        tbirthday, temail, tage,tisregistereduser)
    VALUES
        (:username, :password, :firstname, :middle, :lastname,
        :birthday, :email, :age, :isregistereduser)';

    echo "<br><br> query is "  . $insertuser . "<br><br>";

    $statement = $db->prepare($insertuser);
    $statement->bindValue(':username', $lusername);
    $statement->bindValue(':password', $lpassword);
    $statement->bindValue(':firstname', $lfirstname);
    $statement->bindValue(':middle', $lmiddle);
    $statement->bindValue(':lastname', $llastname);
    $statement->bindValue(':birthday', $lbirthday);
    $statement->bindValue(':email', $lemail);
    $statement->bindValue(':age', $lage);
    $statement->bindValue(':isregistereduser', $lisregistereduser);

    echo "after binding parms <br>";
    try {
        $statement->execute();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }

    $statement->closeCursor();
    echo 'after close cursor $statement, insert complete';
    exit - 1;

    // 'return' to calling program
    // do not display HTML, go to php file below:
    header('Location: index01.user.php');
} else {
    $errors['topofpage'] = "*** Error ***  username " . $lusername . " already exists";
}