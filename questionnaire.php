<?php
session_start();

echo '<pre>'; print_r($_SESSION); echo '</pre>';

include 'connection.php';

// Check if email exists in session
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    die("Error: Email not found in session. Please log in again.");
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : '';

// Collect form data safely
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
$template_id = $_POST['template'] ?? '';  // <-- add this line to get template ID
echo "Template selected: " . $template_id;

// Prepare SQL with 'template' column added
$sql = "INSERT INTO questionnaire (
    username, email, businessName, industryType, targetAudience, websiteType,
    technology, layoutStyle, logo, ecommerce,
    paymentGateway, contactForm, liveChat, estimatedPrice, template_id
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

// 15 strings total, so 15 's's in bind_param now
$stmt->bind_param(
    "sssssssssssssss",
    $username, $email, $businessName, $industryType, $targetAudience, $websiteType,
    $technology, $layoutStyle, $logo, $ecommerce,
    $paymentGateway, $contactForm, $liveChat, $estimatedPrice, $template_id
);

if ($stmt->execute()) {
    echo "Form submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
