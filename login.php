<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT id, username, email, password, role FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_name'] = $user['username'];
      $_SESSION['user_email'] = $user['email'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['role'] = $user['role']; // Store the role

      if ($user['role'] === 'admin') {
        header("Location: adminpanel.php");
      } else {
        header("Location: home.php");
      }
      exit();
    } else {
      echo "Invalid password.";
    }
  } else {
    echo "User not found.";
  }

  $stmt->close();
  $conn->close();
}
?>
