<?php
header('Content-Type: application/json');
include 'connection.php';

$data = json_decode(file_get_contents('php://input'), true);
$project_id = $data['project_id'] ?? null;

if (!$project_id) {
    echo json_encode(["success" => false, "error" => "Missing project_id"]);
    exit;
}

$stmt = $conn->prepare("UPDATE projects SET status = 'Delivered' WHERE id = ?");
if (!$stmt) {
    echo json_encode(["success" => false, "error" => "Prepare failed: " . $conn->error]);
    exit;
}

$stmt->bind_param("i", $project_id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => "No rows updated"]);
}

$stmt->close();
$conn->close();
?>
