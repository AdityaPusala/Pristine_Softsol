<?php
header('Content-Type: application/json');
include 'connection.php';

$sql = "SELECT employee_id, employee_name, email FROM employees";
$result = $conn->query($sql);

$employees = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $employees[] = $row;
    }
}

echo json_encode($employees);

$conn->close();
?>
