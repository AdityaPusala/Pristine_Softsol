<?php
// Include the database connection file
include('connection.php');

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $contact = $_POST['contact'];

    // Check if password and confirm password match
    if ($password === $confirm_password) {
        // Hash the password before saving it in the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Use prepared statements for security
        $sql = "INSERT INTO users (username, email, password, contact) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind the parameters
            $stmt->bind_param('sssi', $fullname, $email, $hashed_password, $contact);

            // Execute the query
            if ($stmt->execute()) {
                echo "<p style='color:white;text-align:center;'>Registration successful! Please <a href='login.html'>login here</a>.</p>";
            } else {
                echo "<p style='color:red;text-align:center;'>Error: Could not execute the query.</p>";
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "<p style='color:red;text-align:center;'>Error: Could not prepare the statement.</p>";
        }
    } else {
        echo "<p style='color:red;text-align:center;'>Passwords do not match!</p>";
    }
}
?>
