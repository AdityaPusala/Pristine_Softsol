<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the connection script
include 'connection.php';

// Check if the form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if all necessary fields are filled
    if (isset($_POST['name'], $_POST['email'], $_POST['need'], $_POST['message'])) {
        
        // Collect form data and sanitize to prevent SQL injection
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $issue = mysqli_real_escape_string($conn, $_POST['need']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        $time = date("Y-m-d H:i:s"); // Current timestamp

        // SQL query to insert form data into the database
        $sql = "INSERT INTO `query` (`Name`, `Email`, `Issue`, `Message`, `Time`) 
                VALUES ('$name', '$email', '$issue', '$message', '$time')";

        // Execute the query and check for success
        if ($conn->query($sql) === TRUE) {
            // Success: Show alert and redirect
            echo "<script>alert('Message sent successfully!'); window.location.href='Query.html';</script>";
        } else {
            // Error: Show alert with error message
            echo "<script>alert('Error: " . $conn->error . "'); window.location.href='Query.html';</script>";
        }

        // Close the database connection
        $conn->close();
    } else {
        // Error: Missing fields
        echo "<script>alert('Error: Please fill in all required fields!'); window.location.href='Query.html';</script>";
    }
} else {
    // Error: Invalid request method
    echo "<script>alert('Invalid request method!'); window.location.href='Query.html';</script>";
}
?>
