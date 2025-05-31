<?php
header('Content-Type: application/json');
include 'connection.php';

$status = $_GET['status'] ?? null;

// Base project query
$sql = "SELECT p.id, p.project_name, 
               p.assigned_to,
               COALESCE(e.employee_name, 'Unassigned') AS assigned_name, 
               p.status,
               p.updated_at
        FROM projects p
        LEFT JOIN employees e ON e.employee_id = CAST(TRIM(p.assigned_to) AS UNSIGNED)";
$params = [];

// If specific status is requested
if ($status) {
    $sql .= " WHERE p.status = ?";
    $params[] = $status;
}

$stmt = $conn->prepare($sql);
if ($params) {
    $stmt->bind_param(str_repeat("s", count($params)), ...$params);
}
$stmt->execute();
$result = $stmt->get_result();

$projects = [];
while ($row = $result->fetch_assoc()) {
    $projects[] = $row;
}
$stmt->close();

// Fetch summary count by status
$summary = [];
$countQuery = "SELECT status, COUNT(*) AS count FROM projects GROUP BY status";
$res = $conn->query($countQuery);
while ($row = $res->fetch_assoc()) {
    $summary[$row['status']] = (int)$row['count'];
}

$conn->close();

echo json_encode([
    'projects' => $projects,
    'summary' => $summary
]);
