<?php
$servername = "sql103.infinityfree.com";
$username   = "if0_40792773";
$password   = "RAjan9199";
$dbname     = "if0_40792773_learnapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
