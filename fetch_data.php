<?php
header('Content-Type: application/json');
include 'connection.php';

// Status filter, default to 'In Progress' but can accept any valid status from URL
$status = $_GET['status'] ?? 'In Progress';

// Prepare SQL query with JOIN to get employee names and updated_at timestamp
$sql = "SELECT p.id, p.project_name, 
               p.assigned_to,
               COALESCE(e.employee_name, 'Unassigned') AS assigned_name, 
               p.status,
               p.updated_at
        FROM projects p
        LEFT JOIN employees e ON e.employee_id = CAST(TRIM(p.assigned_to) AS UNSIGNED)
        WHERE p.status = ?";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(['error' => "Prepare failed: " . $conn->error]);
    exit;
}

$stmt->bind_param('s', $status);
$stmt->execute();
$result = $stmt->get_result();

$projects = [];
while ($row = $result->fetch_assoc()) {
    $projects[] = $row;
}

echo json_encode(['projects' => $projects]);

$stmt->close();
$conn->close();
?>
