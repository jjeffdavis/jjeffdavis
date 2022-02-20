//config.pdo.php
<?php
echo "enter config.php";
define('DB_NAME', 'test_company');
define('DB_USER', 'test_user');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_PORT', '3306');
$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
// sqli equivalent: $conn = new mysqli($servername, $username, $password, $database, $port);
$pdo = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, "dbport=" . DB_PORT, DB_USER /* , DB_PASSWORD */);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
echo "after seting pdo attributes.";

?>