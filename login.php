<?php
session_start(); // Start session to store user information

// Include database connection
include('connection.php');

// Check if the form is submitted
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to check if the user exists with the given credentials
    $sql = "SELECT * FROM users WHERE email = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Store user info in session and redirect to homepage or dashboard
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            header("Location: homepage.php"); // Redirect to homepage after login
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found with that email!";
    }
}
?>
