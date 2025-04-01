<?php
header('Content-Type: application/json');
$conn = new mysqli("localhost", "root", "", "pristine_softsol"); // Update DB name

if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed"]));
}

$sql = "SELECT month, sales FROM sales_data ORDER BY id ASC";
$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
$conn->close();
?>
