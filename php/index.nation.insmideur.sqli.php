<?php
// index.nation.insmideur.sqli.php
$servername = "localhost";
$username = "root";
$password = NULL;
$database = "nation";
$port = "3306";

// Create connection
$conn = new mysqli($servername, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";







$sql2 = 'INSERT INTO countries (name, area, national_day, country_code2, country_code3, region_id)
values ("Slavonia", 91679.00, "1918-02-11", "SX", "SLA", 26)';

if ($conn->query($sql2) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}




$conn->close();