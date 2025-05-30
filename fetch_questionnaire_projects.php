<?php
include 'connection.php';

$sql = "SELECT id, businessName AS project_name, email FROM questionnaire WHERE assigned IS NULL OR assigned = 0 ORDER BY submitted_at DESC";
$result = $conn->query($sql);

$projects = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row['project_name'] = $row['project_name'] ?: 'Unnamed Project';
        $row['email'] = $row['email'] ?: 'No Email';
        $projects[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($projects);
$conn->close();
?>
