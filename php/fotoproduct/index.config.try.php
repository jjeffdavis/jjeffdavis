// index.pdo.dumptable.php



<?php
$user = 'root';
$password = '';
try {
    $rowcount = 0;
    echo "rowcount = ", $rowcount;
    $dbh = new PDO('mysql:host=localhost;dbname=nation;port=3306', $user, $password);
    foreach ($dbh->query('SELECT * from regions') as $row) {
        print_r($row);
        $rowcount++;
        echo "<br>rowcount = ", $rowcount, "<br>";
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}



/*
<?php
$user = 'test_user';
$password = '';
try {
    $rowcount = 0;
    echo "rowcount = ", $rowcount;
    $dbh = new PDO('mysql:host=localhost;dbname=test_company;port=3306', $user, $password);
    foreach ($dbh->query('SELECT * from products') as $row) {
        print_r($row);
        $rowcount++;
        echo "rowcount = ", $rowcount;
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
*/
?>