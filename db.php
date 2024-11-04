<?php
$servername = "localhost"; // Usually localhost
$username = "your_username"; // Your MySQL username
$password = "your_password"; // Your MySQL password
$dbname = "coffee_shop"; // Your database name

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} else {
    echo "Connected successfully";
}
?>
