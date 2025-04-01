<?php

// Disable error display and set error reporting
ini_set('display_errors', 0); // Hide errors in production
error_reporting(E_ALL);

header('Content-Type: application/json'); // Ensure JSON response

include 'connection.php'; // Database connection

// Check the database connection
if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed: " . $conn->connect_error]));
}

$status = isset($_GET['status']) ? $_GET['status'] : '';

// Prepare the SQL query
$query = "SELECT project_name, status, assigned_to, deadline FROM projects";
if ($status) {
    $query .= " WHERE status = ?";
}

$stmt = $conn->prepare($query);
if (!$stmt) {
    die(json_encode(["error" => "Prepared statement failed: " . $conn->error]));
}

// Bind parameters if status is provided
if ($status) {
    $stmt->bind_param("s", $status);
}

$stmt->execute();
$result = $stmt->get_result();
$projects = $result->fetch_all(MYSQLI_ASSOC);

// Queries for counting projects
$currentProjects = $conn->query("SELECT COUNT(*) as count FROM projects WHERE status = 'Ongoing'")->fetch_assoc()['count'];
$deliveredProjects = $conn->query("SELECT COUNT(*) as count FROM projects WHERE status = 'Completed'")->fetch_assoc()['count'];
$pendingProjects = $conn->query("SELECT COUNT(*) as count FROM projects WHERE status = 'Pending'")->fetch_assoc()['count'];
$totalProjects = $currentProjects + $deliveredProjects + $pendingProjects;

// Construct JSON response
$response = [
    "projects" => $projects ?: [],
    "totalProjects" => $totalProjects, // Assuming 'sales' means total projects
    "currentProjects" => $currentProjects,
    "deliveredProjects" => $deliveredProjects,
    "pendingProjects" => $pendingProjects
];

echo json_encode($response);

$stmt->close();
$conn->close();


// // Disable error display and start output buffering
// ini_set('display_errors', 0); // Turn off error display
// error_reporting(E_ALL);       // Log all errors, but don't display them
// ob_start(); // Start output buffering

// include 'connection.php'; // Ensure this includes the correct database connection

// // Check the database connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// $status = isset($_GET['status']) ? $_GET['status'] : '';

// // Prepare the SQL query
// $query = "SELECT project_name, status, assigned_to, deadline FROM projects";
// if ($status) {
//     $query .= " WHERE status = ?";
// }

// $stmt = $conn->prepare($query);
// if (!$stmt) {
//     die("Prepared statement failed: " . $conn->error);
// }

// // Bind parameters if status is provided
// if ($status) {
//     $stmt->bind_param("s", $status);
// }

// // Execute the query
// $stmt->execute();
// $result = $stmt->get_result();
// $projects = $result->fetch_all(MYSQLI_ASSOC);

// // Clean the output buffer before sending JSON response
// ob_end_clean(); 

// // Return data as JSON or an empty array if no projects foundy
// echo json_encode($projects ? $projects : []);

// // Query for counting projects in each status
// $sqlCurrent = "SELECT COUNT(*) as count FROM projects WHERE status = 'Ongoing'";
// $sqlDelivered = "SELECT COUNT(*) as count FROM projects WHERE status = 'Delivered'";
// $sqlPending = "SELECT COUNT(*) as count FROM projects WHERE status = 'Pending'";

// $currentProjects = $conn->query($sqlCurrent)->fetch_assoc()['count'];
// $deliveredProjects = $conn->query($sqlDelivered)->fetch_assoc()['count'];
// $pendingProjects = $conn->query($sqlPending)->fetch_assoc()['count'];

// $stmt->close();
// $conn->close();
?>
