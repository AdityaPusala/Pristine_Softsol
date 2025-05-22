<?php
session_start();
include 'connection.php';

// Check if email exists in session, else stop execution or handle error
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    die("Error: Email not found in session. Please log in again.");
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : '';



// Collect form data with null coalescing to avoid undefined errors
$businessName = $_POST['businessName'] ?? '';
$industryType = $_POST['industryType'] ?? '';
$targetAudience = $_POST['targetAudience'] ?? '';
$websiteType = $_POST['websiteType'] ?? '';
$technology = $_POST['technology'] ?? '';
$layoutStyle = $_POST['layoutStyle'] ?? '';
$logo = $_POST['logo'] ?? '';
$ecommerce = $_POST['ecommerce'] ?? '';
$paymentGateway = $_POST['paymentGateway'] ?? '';
$contactForm = $_POST['contactForm'] ?? '';
$liveChat = $_POST['liveChat'] ?? '';
$estimatedPrice = $_POST['estimatedPrice'] ?? '';

// Prepare SQL without colorScheme
$sql = "INSERT INTO questionnaire (
    username, email, businessName, industryType, targetAudience, websiteType,
    technology, layoutStyle, logo, ecommerce,
    paymentGateway, contactForm, liveChat, estimatedPrice
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

// 14 strings total, so 14 's's in bind_param
$stmt->bind_param(
    "ssssssssssssss",
    $username, $email, $businessName, $industryType, $targetAudience, $websiteType,
    $technology, $layoutStyle, $logo, $ecommerce,
    $paymentGateway, $contactForm, $liveChat, $estimatedPrice
);

if ($stmt->execute()) {
    echo "Form submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
