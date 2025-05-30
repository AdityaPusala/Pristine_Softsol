<?php
header('Content-Type: application/json');
include 'connection.php';

$data = json_decode(file_get_contents('php://input'), true);

$project_id = $data['id'] ?? null;
$assigned_to = $data['assigned_to'] ?? null;

if (!$project_id || !$assigned_to) {
    echo json_encode(["success" => false, "error" => "Missing project_id or assigned_to"]);
    exit;
}

// Get project details from questionnaire
$stmt = $conn->prepare("SELECT businessName, email FROM questionnaire WHERE id = ?");
$stmt->bind_param("i", $project_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(["success" => false, "error" => "Project not found"]);
    exit;
}

$project = $result->fetch_assoc();

// Insert into projects table
$insertStmt = $conn->prepare("INSERT INTO projects (project_name, email, status, assigned_to) VALUES (?, ?, 'In Progress', ?)");
$insertStmt->bind_param("sss", $project['businessName'], $project['email'], $assigned_to);
$executeSuccess = $insertStmt->execute();

if (!$executeSuccess) {
    echo json_encode(["success" => false, "error" => "Failed to assign project: " . $insertStmt->error]);
    exit;
}

// Update questionnaire table to mark assigned
$updateStmt = $conn->prepare("UPDATE questionnaire SET assigned = 1 WHERE id = ?");
$updateStmt->bind_param("i", $project_id);
$updateStmt->execute();

echo json_encode(["success" => true, "message" => "Project assigned successfully"]);

$stmt->close();
$insertStmt->close();
$updateStmt->close();
$conn->close();
?>
