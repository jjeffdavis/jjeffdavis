//ionos.mysqli.php
//
<?php
$host_name = 'db5006594655.hosting-data.io';
$database = 'dbs5469787';
$user_name = 'dbu730058';
$password = 'Park$ion$9606';

$link = new mysqli($host_name, $user_name, $password, $database);

if ($link->connect_error) {
    die('<p>Failed to connect to MySQL: ' . $link->connect_error . '</p>');
} else {
    echo '<p>Connection to MySQL server successfully established.</p>';
    echo '<p>host = $host-name, nation database = $database</p>';
    echo '<p>user = $username</p>';
}
?>