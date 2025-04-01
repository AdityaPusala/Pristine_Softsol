<?php
// Database configuration
$servername = "localhost"; // Your server name (use 'localhost' if on local machine)
$username = "root"; // Your database username
$password = ""; // Your database password (leave blank if no password for local server)
$dbname = "pristine_softsol"; // The name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>
