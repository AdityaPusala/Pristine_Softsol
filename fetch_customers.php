<?php
include 'connection.php';

$query = "
  SELECT YEAR(registration_date) AS year, COUNT(*) AS count 
  FROM customers 
  WHERE YEAR(registration_date) BETWEEN 2020 AND 2024 
  GROUP BY year 
  ORDER BY year
";

$result = mysqli_query($conn, $query);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);
?>
