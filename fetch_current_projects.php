<?php
header('Content-Type: application/json');
include 'connection.php';

$sql = "SELECT q.id, q.businessName AS project_name, q.email, e.employee_name AS assigned_to
        FROM questionnaire q
        LEFT JOIN employees e ON q.assigned_to = e.employee_id
        WHERE q.assigned = 1
        ORDER BY q.assigned_at DESC";

$result = $conn->query($sql);

$projects = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row['project_name'] = $row['project_name'] ?: 'Unnamed Project';
        $row['email'] = $row['email'] ?: 'No Email';
        $row['assigned_to'] = $row['assigned_to'] ?: 'Unknown';
        $projects[] = $row;
    }
}

echo json_encode($projects);
$conn->close();
?>
