<?php // pdo login 

echo "enter functions.php";
define('DB_NAME', 'my_guitar_shop2');
define('DB_USER', 'root');
define('DB_PASSWORD', NULL);
define('DB_HOST', 'localhost');
define('DB_PORT', '3306');

$opts =
    [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

$dsn =     "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME .  ";dbport=" . DB_PORT;
try {
    $pdo = new PDO(
        $dsn,
        DB_USER,
        DB_PASSWORD,
        $opts
    );
} catch (PDOException $e) {
    $error_message = $e->getMessage();

    include('database_error.php');
    exit();
}
echo "manager.database.hph. success......fall thru.";
echo "manager.database.hph. success......fall thru.";
echo "manager.database.hph. success......fall thru.";