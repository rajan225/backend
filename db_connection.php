<?php
$servername = getenv("dbHost");
$port= getenv("dbPort");
$username   =  getenv("dbUser");
$password   =  getenv("dbPassword");
$dbname     =  getenv("dbName");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,$port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
