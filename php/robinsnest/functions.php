<?php // Example 01: functions.php

echo "enter functions.php";
define('DB_NAME', 'robinsnest');
define('DB_USER', 'robin');
define('DB_PASSWORD', 'robin.password');
define('DB_HOST', 'localhost');
define('DB_PORT', '3306');
/*
define('DB_CHARSET', 'utf8mb4');
$dsn = "mysql:host=" . DB_HOST .";dbname=" . DB_NAME .   ";charset=" . DB_CHARSET . ";port=" DB_PORT . ";" ;
/*
$pdo = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, "dbport=" . DB_PORT, DB_USER);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
echo "after seting pdo attributes.";

$data = 'robinsnest';   // Change as necessary
$user = 'robinsnest';   // Change as necessary
$pass = 'password';     // Change as necessary
$chrs = 'utf8mb4';
$attr = "mysql:host=$host;dbname=$data;charset=$chrs";
*/
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
echo "after new PDO";
/*
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
*/


function createTable($name, $query)
{
  queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
  echo "Table '$name' created or already exists.<br>";
}

function queryMysql($query)
{
  global $pdo;
  return $pdo->query($query);
}

function destroySession()
{
  $_SESSION = array();

  if (session_id() != "" || isset($_COOKIE[session_name()]))
    setcookie(session_name(), '', time() - 2592000, '/');

  session_destroy();
}

function sanitizeString($var)
{
  global $pdo;

  $var = strip_tags($var);
  $var = htmlentities($var);

  if (get_magic_quotes_gpc())
    $var = stripslashes($var);

  $result = $pdo->quote($var);          // This adds single quotes
  return str_replace("'", "", $result); // So now remove them
}

function showProfile($user)
{
  global $pdo;

  if (file_exists("$user.jpg"))
    echo "<img src='$user.jpg' style='float:left;'>";

  $result = $pdo->query("SELECT * FROM profiles WHERE user='$user'");

  while ($row = $result->fetch()) {
    die(stripslashes($row['text']) . "<br style='clear:left;'><br>");
  }

  echo "<p>Nothing to see here, yet</p><br>";
}