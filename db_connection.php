<?php
$servername = "mysql-4426148-rajan-fd02.l.aivencloud.com";
$username   = "avnadmin";
$password   = "AVNS_h5mG7pN3S6PnLsDcl33";
$dbname     = "learnapp";
$port="27759";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,$port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
