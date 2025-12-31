<?php
$servername = getevn("dbHost");
$username   =  getevn("dbUser");
$password   =  getevn("dbPassword");
$dbname     =  getevn("dbHost");
$port= getevn("dbPort");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,$port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
