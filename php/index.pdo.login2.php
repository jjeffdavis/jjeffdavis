<?php // pdo login 

echo "enter functions.php";
define('DB_NAME', 'robinsnest');
define('DB_USER', 'robin');
define('DB_PASSWORD', 'robin.password');
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
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
