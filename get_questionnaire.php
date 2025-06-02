<?php
header('Content-Type: application/json');
include 'connection.php';

if (!isset($_GET['project_id'])) {
    echo json_encode(['error' => 'Missing project_id']);
    exit;
}

$project_id = intval($_GET['project_id']);

$sql = "SELECT * FROM questionnaire WHERE id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(['error' => 'Prepare failed: ' . $conn->error]);
    exit;
}

$stmt->bind_param("i", $project_id);

if (!$stmt->execute()) {
    echo json_encode(['error' => 'Execute failed: ' . $stmt->error]);
    exit;
}

$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(['error' => 'No record found']);
    exit;
}

$row = $result->fetch_assoc();

$response = [
    "questionnaire" => [
        "businessName" => $row['businessName'],
        "email" => $row['email'],
        "template_id" => $row['template_id'],
        "industryType" => $row['industryType'],
        "targetAudience" => $row['targetAudience'],
        "websiteType" => $row['websiteType'],
        "technology" => $row['technology'],
        "layoutStyle" => $row['layoutStyle'],
        "logo" => $row['logo'],
        "ecommerce" => $row['ecommerce'],
        "paymentGateway" => $row['paymentGateway'],
        "contactForm" => $row['contactForm'],
        "liveChat" => $row['liveChat'],
        "estimatedPrice" => $row['estimatedPrice']
    ]
];

echo json_encode($response);

$stmt->close();
$conn->close();
