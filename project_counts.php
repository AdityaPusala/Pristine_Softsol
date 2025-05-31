<?php
header('Content-Type: application/json');
include 'connection.php';

$response = [];

$statuses = ['In Progress' => 'currentProjects', 'Delivered' => 'deliveredProjects', 'Pending' => 'pendingProjects'];

foreach ($statuses as $status => $label) {
    $stmt = $conn->prepare("SELECT COUNT(*) as count FROM projects WHERE status = ?");
    $stmt->bind_param("s", $status);
    $stmt->execute();
    $result = $stmt->get_result();
    $response[$label] = $result->fetch_assoc()['count'];
    $stmt->close();
}

// Get total projects
$totalResult = $conn->query("SELECT COUNT(*) as count FROM projects");
$response['totalProjects'] = $totalResult->fetch_assoc()['count'];

echo json_encode($response);
$conn->close();
?>
